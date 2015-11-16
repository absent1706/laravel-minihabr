@if(session()->has('flash_message'))
<script>
    $(function() {
        @if(session()->has('flash_class'))
            notify( "{{ session('flash_message') }}", "{{ session('flash_class') }}" );
        @else
            notify( "{{ session('flash_message') }}" );
        @endif
    });
</script>
@endif