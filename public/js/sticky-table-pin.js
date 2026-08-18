/* ---------------------------------------------------------------------------
   sticky-table-pin.js - keeps a frozen table header pinned below a page's
   sticky bar stack when the table lives in its own scroll box, and computes
   the left offsets for multiple frozen columns.

   Only needed when BOTH are true:
     - the table is inside its own overflow:auto box, and
     - sticky/fixed bars overlay the top of the page, and/or page scrolling
       happens in a nested overflow-y-auto container rather than the window.

   Pairs with sticky-table.css. No dependencies.
   --------------------------------------------------------------------------- */

export function initStickyTable(scrollBox, options) {
    if (!scrollBox) {
        return { refresh: function () {}, destroy: function () {} };
    }

    var opts = options || {};
    var bottomGutter = opts.bottomGutter != null ? opts.bottomGutter : 24;
    var minHeight = opts.minHeight != null ? opts.minHeight : 240;
    var fitViewport = opts.fitViewport !== false;

    var bars = (opts.stickyBars || []).map(function (bar) {
        return typeof bar === 'string' ? document.querySelector(bar) : bar;
    }).filter(Boolean);

    var table = scrollBox.querySelector('table');
    var thead = scrollBox.querySelector('thead');
    var ticking = false;
    var lastMaxHeight = null;
    var lastPinTop = null;

    // A scrollable region must be reachable by keyboard (WCAG 2.1.1).
    if (!scrollBox.hasAttribute('tabindex')) {
        scrollBox.setAttribute('tabindex', '0');
    }
    if (!scrollBox.hasAttribute('role')) {
        scrollBox.setAttribute('role', 'region');
    }
    if (!scrollBox.hasAttribute('aria-label') && scrollBox.dataset.stfLabel) {
        scrollBox.setAttribute('aria-label', scrollBox.dataset.stfLabel);
    }

    /* Bottom edge of the CONTIGUOUS stack of pinned bars at the top of the
       viewport. A bar counts only when it starts at or above the running
       total and extends past it, so bars that are unpinned at the current
       breakpoint, scrolled away, or floating in a gap are skipped - no
       per-breakpoint configuration needed. */
    function barStackBottom() {
        var covered = 0;

        bars.forEach(function (bar) {
            var rect = bar.getBoundingClientRect();
            if (rect.top <= covered + 1 && rect.bottom > covered) {
                covered = rect.bottom;
            }
        });

        return covered;
    }

    /* Writes --stf-left on each frozen cell = summed widths of the frozen
       columns before it, and tags the last one for the divider/shadow. */
    function layoutFrozenColumns() {
        var headRow = thead && thead.rows[0];
        if (!headRow) {
            return;
        }

        var offsets = [];
        var lastIndex = -1;
        var offset = 0;

        for (var i = 0; i < headRow.cells.length; i++) {
            var cell = headRow.cells[i];
            if (!cell.classList.contains('stf-freeze')) {
                offsets.push(null);
                continue;
            }
            offsets.push(offset);
            offset += cell.getBoundingClientRect().width;
            lastIndex = i;
        }

        if (lastIndex === -1) {
            return;
        }

        var rows = table ? table.rows : [];
        for (var r = 0; r < rows.length; r++) {
            var cells = rows[r].cells;
            // Skip colspan rows (empty states) - their cells do not line up.
            if (cells.length !== offsets.length) {
                continue;
            }
            for (var c = 0; c < cells.length; c++) {
                if (offsets[c] === null) {
                    continue;
                }
                cells[c].style.setProperty('--stf-left', offsets[c] + 'px');
                cells[c].classList.toggle('stf-freeze--last', c === lastIndex);
            }
        }
    }

    function update() {
        ticking = false;

        // --- read phase (no writes in between, to avoid layout thrashing)
        var covered = barStackBottom();
        var boxTop = scrollBox.getBoundingClientRect().top;
        var clientHeight = scrollBox.clientHeight;
        var headHeight = thead ? thead.offsetHeight : 0;

        // --- write phase, each write guarded so scrolling costs nothing
        if (fitViewport) {
            var maxHeight = Math.max(minHeight, window.innerHeight - covered - bottomGutter);
            if (maxHeight !== lastMaxHeight) {
                scrollBox.style.maxHeight = maxHeight + 'px';
                lastMaxHeight = maxHeight;
            }
        }

        // Push the header down by however far the box has slid under the bars,
        // clamped so it never escapes past the box's bottom edge (sticky
        // containment does not constrain table cells reliably across engines).
        var maxPin = Math.max(0, clientHeight - headHeight);
        // Ceil, not round: sub-pixel offsets make the pinned header shimmer,
        // and rounding DOWN opens a hairline gap for rows to bleed through.
        var pinTop = Math.ceil(Math.min(Math.max(0, covered - boxTop), maxPin));
        if (pinTop !== lastPinTop) {
            scrollBox.style.setProperty('--stf-pin-top', pinTop + 'px');
            lastPinTop = pinTop;
        }
    }

    function requestUpdate() {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    }

    // The box's own scroll never moves the box, so it only needs the cheap
    // horizontal-shadow toggle - not a full re-measure.
    function onBoxScroll() {
        scrollBox.classList.toggle('is-x-scrolled', scrollBox.scrollLeft > 0);
    }

    // Page scrolling may happen in a nested overflow-y-auto container rather
    // than the window, and scroll events do not bubble - so listen on document
    // in the capture phase. Ignore the box's own scroll (handled above).
    function onDocumentScroll(event) {
        if (event.target === scrollBox) {
            return;
        }
        requestUpdate();
    }

    function refresh() {
        layoutFrozenColumns();
        lastMaxHeight = null;
        lastPinTop = null;
        requestUpdate();
    }

    document.addEventListener('scroll', onDocumentScroll, true);
    scrollBox.addEventListener('scroll', onBoxScroll, { passive: true });
    window.addEventListener('resize', refresh);

    // Bars change height without firing scroll or resize (mobile menu opens,
    // banner dismissed), which would otherwise leave the pin stale until the
    // next scroll.
    var observer = null;
    if (typeof ResizeObserver !== 'undefined') {
        observer = new ResizeObserver(refresh);
        // Bars only. Observing the table would loop: layoutFrozenColumns
        // toggles a 1px border, which resizes the table, which re-fires.
        bars.forEach(function (bar) { observer.observe(bar); });
    }

    refresh();

    return {
        refresh: refresh,
        destroy: function () {
            document.removeEventListener('scroll', onDocumentScroll, true);
            scrollBox.removeEventListener('scroll', onBoxScroll);
            window.removeEventListener('resize', refresh);
            if (observer) {
                observer.disconnect();
            }
            scrollBox.style.removeProperty('--stf-pin-top');
            scrollBox.classList.remove('is-x-scrolled');
            if (fitViewport) {
                scrollBox.style.removeProperty('max-height');
            }
        },
    };
}

// Also expose globally, so `<script type="module" src="...">` works without a
// bundler. Plain (non-module) <script> cannot be used - `export` is a syntax
// error there; drop the export keyword if a classic script is required.
if (typeof window !== 'undefined') {
    window.initStickyTable = initStickyTable;
}
