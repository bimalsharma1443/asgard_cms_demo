<div class='form-group{{ $errors->has('name') ? ' has-error' : '' }} form-float'>
	<div class="form-line">
	    {!! Form::label('name', trans('menu::menu.form.name'),['class' => 'form-label']) !!}
	    {!! Form::text('name', Input::old('name', $menu->name), ['class' => 'form-control', 'placeholder' => trans('menu::menu.form.name')]) !!}
	    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
	</div>
</div>
