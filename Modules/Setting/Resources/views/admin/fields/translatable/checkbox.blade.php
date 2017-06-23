<div class="checkbox">
    <?php $oldValue = (isset($dbSettings[$settingName]) && $dbSettings[$settingName]->hasTranslation($lang)) ? $dbSettings[$settingName]->translate($lang)->value : ''; ?>
        <input id="basic_checkbox_2" name="{{ $settingName . "[$lang]" }}" type="checkbox" class="flat-blue" {{ isset($dbSettings[$settingName]) && (bool)$oldValue == true ? 'checked' : '' }} value="1" />
    <label for="basic_checkbox_2">
        {{ trans($moduleInfo['description']) }}
    </label>
</div>
