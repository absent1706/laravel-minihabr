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

{{-- display errors not attached to any form field  --}}
@if($errors->any())
<script>
    $(function() {
        @foreach($errors->getMessages() as $field => $errors)
            @if(is_int($field))
                @foreach($errors as $error)
                    notify( "{{ $error }}", "error" );
                @endforeach
            @endif
        @endforeach
    });
</script>
@endif