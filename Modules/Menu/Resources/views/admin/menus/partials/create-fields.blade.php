<div class='form-group{{ $errors->has('name') ? ' has-error' : '' }} form-float'>
	<div class="form-line">
	    {!! Form::label('name', trans('menu::menu.form.name'),['class' => 'form-label']) !!}
	    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
	    {!! $errors->first('Name', '<span class="help-block">:message</span>') !!}
    </div>
</div>
