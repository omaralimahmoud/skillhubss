@if (session('msg'))
    <div class='alret alert-default-success p-3 text-center'>
        {{ session('msg') }}
    </div>
@endif
