@if (session('success'))

<div class="alret alert-success">
    {{ session('success') }}
</div>
@endif
@if ($errors->any())

<div class="alret alert-danger">
    @foreach ($errors->all() as $error)
         <p>{{ $error }}</p>
    @endforeach

</div>
@endif
@if (session('status'))
<div class="alret alert-success">
        {{ session('status') }}
    </div>
@endif
