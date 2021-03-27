@if (count($errors) > 0)
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('error'))

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    {{ session()->get('error') }}
</div>
@endif
<div id="error-message" style="display:none" class="alert alert-danger">
</div>
<div id="success-message" style="display:none" class="alert alert-success">
</div>