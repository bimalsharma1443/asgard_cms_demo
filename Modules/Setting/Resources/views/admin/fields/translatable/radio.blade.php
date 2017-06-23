<div class="checkbox">
    <?php foreach ($moduleInfo['options'] as $value => $optionName): ?>
        <?php $oldValue = (isset($dbSettings[$settingName]) && $dbSettings[$settingName]->hasTranslation($lang)) ? $dbSettings[$settingName]->translate($lang)->value : ''; ?>
            <input id="radio_30"
                    name="{{ $settingName . "[$lang]" }}"
                    type="radio"
                    class="flat-blue"
                    {{ isset($dbSettings[$settingName]) && (bool)$oldValue == $value ? 'checked' : '' }}
                    value="{{ $value }}" />
        <label for="radio_30">
                {{ trans($optionName) }}
        </label>
    <?php endforeach; ?>
</div>
