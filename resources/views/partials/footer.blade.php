<script defer src="{{ asset('tailadmin/build/bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="{{ asset('js/compliance-dashboard.js') }}"></script>

{{-- push custom scripts here --}}
@stack('scripts')

<script>
    $(document).ready(function() {
        $('.multiselect').select2({
            placeholder: "Select an option",
            allowClear: true,
            closeOnSelect: false,
            templateResult: function(state) {
                if (!state.id) return state.text;
                var isSelected = $(state.element).is(':selected');
                var $option = $(
                    '<span class="select2-checkbox-option">' +
                    '<input type="checkbox" class="select2-checkbox" ' + (isSelected ? 'checked' : '') + ' />' +
                    '<span>' + state.text + '</span>' +
                    '</span>'
                );
                return $option;
            },
            templateSelection: function(data, container) {
                var $select = $(data.element).closest('select');
                var selectedVals = $select.val() || [];
                var count = selectedVals.length;

                if (count > 1) {
                    if (selectedVals[0].toString() !== data.id.toString()) {
                        $(container).css('display', 'none');
                        return $('<span>');
                    }
                    return $('<span>').text(count + ' items selected');
                }
                return data.text;
            }
        });

        $('.multiselect').on('select2:open', function() {
            $('.select2-results__options').addClass(
                'text-sm text-gray-800'
            );
        });
    });
</script>
</body>

</html>
