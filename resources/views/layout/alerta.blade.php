<div class="col-md-12">

@if (session('info'))
<div class="alert alert-info">
    {{ session('info') }}
</div>
@endif

@if (session('danger'))
<div class="alert alert-danger">
    {{ session('danger') }}
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (count($errors))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
        &times;
    </button>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

</div>