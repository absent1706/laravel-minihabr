@if(session()->has('flash_message'))
<div class="alert {{ session()->has('flash_class') ? 'alert-'.session('flash_class') : 'alert-info' }}">{{ session('flash_message') }}</div>
@endif