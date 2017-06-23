<div class="checkbox">
        <input id="basic_checkbox_2" name="{{ $settingName }}" type="checkbox" class="flat-blue" {{ isset($dbSettings[$settingName]) && (bool)$dbSettings[$settingName]->plainValue == true ? 'checked' : '' }} value="1" />
    <label for="basic_checkbox_2">
        {{ trans($moduleInfo['description']) }}
    </label>
</div>
