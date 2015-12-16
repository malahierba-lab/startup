<!-- alert: form error -->
@if ($errors->has())
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Lang::get('validation.generic') }}
</div>
@endif
<!-- /alert: form error -->