<div class='form-group form-float'>
	<div class="form-line">
	    {!! Form::label($settingName . "[$lang]", trans($moduleInfo['description']),['class' => 'form-label']) !!}
	    <?php if (isset($dbSettings[$settingName])): ?>
	        <?php $value = $dbSettings[$settingName]->hasTranslation($lang) ? $dbSettings[$settingName]->translate($lang)->value : ''; ?>
	        {!! Form::textarea($settingName . "[$lang]", Input::old($settingName . "[$lang]", $value), ['class' => 'form-control']) !!}
	    <?php else: ?>
	        {!! Form::textarea($settingName . "[$lang]", Input::old($settingName . "[$lang]"), ['class' => 'form-control']) !!}
	    <?php endif; ?>
	</div>
</div>
