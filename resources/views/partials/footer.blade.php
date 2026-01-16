<script defer src="{{ asset('tailadmin/build/bundle.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
{{-- <script src="{{ asset('js/compliance-dashboard.js') }}"></script> --}}

{{-- push custom scripts here --}}
@stack('scripts')

<script>
    $(document).ready(function() {
        $('.multiselect').select2({
            placeholder: "Select an option",
            allowClear: true // optional, adds "x" to clear selection
        });
    }).on('select2:open', function() {
        // Apply Tailwind classes to the ul
        $('.select2-results__options').addClass(
            'shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden'
        );
    });
</script>
@if (request()->route()->getName() != 'login')
    <!-- Elfsight AI Chatbot | Saudi Ciso -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-50a59065-4154-49f7-a375-961a269cf1c2" data-elfsight-app-lazy></div>
@endif
</body>

</html>
