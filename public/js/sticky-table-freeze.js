// Measures frozen ("stf-freeze") column widths inside .stf-scroll boxes and
// writes --stf-left on each cell so multiple frozen columns line up correctly
// regardless of content width. Also toggles a shadow once the box is
// scrolled horizontally. No-op on pages without any .stf-scroll table.
(function () {
    function layoutFrozenColumns(scrollBox) {
        var thead = scrollBox.querySelector('thead');
        var table = scrollBox.querySelector('table');
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

    function init(scrollBox) {
        var refresh = function () {
            layoutFrozenColumns(scrollBox);
        };

        scrollBox.addEventListener('scroll', function () {
            scrollBox.classList.toggle('is-x-scrolled', scrollBox.scrollLeft > 0);
        }, { passive: true });

        window.addEventListener('resize', refresh);

        if (typeof ResizeObserver !== 'undefined') {
            new ResizeObserver(refresh).observe(scrollBox);
        }

        refresh();
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.stf-scroll').forEach(init);
    });
})();
