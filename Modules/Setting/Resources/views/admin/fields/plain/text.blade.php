<div class='form-group form-float'>
	<div class="form-line">
	    {!! Form::label($settingName, trans($moduleInfo['description']),['class' => 'form-label']) !!}
	    <?php if (isset($dbSettings[$settingName])): ?>
	        {!! Form::text($settingName, Input::old($settingName, $dbSettings[$settingName]->plainValue), ['class' => 'form-control']) !!}
	    <?php else: ?>
	        {!! Form::text($settingName, Input::old($settingName), ['class' => 'form-control']) !!}
	    <?php endif; ?>
    </div>
</div>
