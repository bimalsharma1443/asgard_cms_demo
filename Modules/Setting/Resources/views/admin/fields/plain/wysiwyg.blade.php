<div class='form-group form-float'>
	<div class="form-line">SSS
	    {!! Form::label($settingName, trans($moduleInfo['description']),['class' => 'form-label']) !!}
	    <?php if (isset($dbSettings[$settingName])): ?>
	        {!! Form::textarea($settingName, Input::old($settingName, $dbSettings[$settingName]->plainValue), ['class' => 'form-control ckeditor']) !!}
	    <?php else: ?>
	        {!! Form::textarea($settingName, Input::old($settingName), ['class' => 'form-control ckeditor']) !!}
	    <?php endif; ?>
	</div>
</div>
