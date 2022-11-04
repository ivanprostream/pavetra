@if (session()->has('message'))

<div class="message">
    {{ session('message') }}
</div>

@endif
