<div class="body">
	<?php $altAttribute = isset($file->translate($lang)->alt_attribute) ? $file->translate($lang)->alt_attribute : '' ?>
	<div class='form-group{{ $errors->has("{$lang}[alt_attribute]") ? ' has-error' : '' }} form-float'>
		<div class="form-line">
		    {!! Form::label("{$lang}[alt_attribute]", trans('media::media.form.alt_attribute'), ['class' => 'form-label']) !!}
		    {!! Form::text("{$lang}[alt_attribute]", Input::old("{$lang}[alt_attribute]", $altAttribute), ['class' => 'form-control']) !!}
		    {!! $errors->first("{$lang}[alt_attribute]", '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<?php $description = isset($file->translate($lang)->description) ? $file->translate($lang)->description : '' ?>
	<div class='form-group{{ $errors->has("{$lang}[description]") ? ' has-error' : '' }} form-float'>
		<div class="form-line">
		    {!! Form::label("{$lang}[description]", trans('media::media.form.description'), ['class' => 'form-label']) !!}
		    {!! Form::textarea("{$lang}[description]", Input::old("{$lang}[description]", $description), ['class' => 'form-control']) !!}
		    {!! $errors->first("{$lang}[description]", '<span class="help-block">:message</span>') !!}
		</div>
	</div>
	<?php $keywords = isset($file->translate($lang)->keywords) ? $file->translate($lang)->keywords : '' ?>
	<div class='form-group{{ $errors->has("{$lang}[keywords]") ? ' has-error' : '' }} form-float'>
		<div class="form-line">
		    {!! Form::label("{$lang}[keywords]", trans('media::media.form.keywords'), ['class' => 'form-label']) !!}
		    {!! Form::text("{$lang}[keywords]", Input::old("{$lang}[keywords]", $keywords), ['class' => 'form-control']) !!}
		    {!! $errors->first("{$lang}[keywords]", '<span class="help-block">:message</span>') !!}
	    </div>
	</div>
</div>