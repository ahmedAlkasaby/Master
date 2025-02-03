@if (session('success'))
    <div class="alert alert-success" id="flash-message">
        {{ session('success') }}
    </div>
@endif

{{-- @if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif --}}


