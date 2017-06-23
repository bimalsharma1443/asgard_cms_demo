<div class="checkbox">
    <?php foreach ($moduleInfo['options'] as $value => $optionName): ?>        
        <input id="radio_30"
                name="{{ $settingName }}"
                type="radio"
                class="flat-blue"
                {{ isset($dbSettings[$settingName]) && (bool)$dbSettings[$settingName]->plainValue == $value ? 'checked' : '' }}
                value="{{ $value }}" />
        <label for="radio_30">
            {{ trans($optionName) }}
        </label>
    <?php endforeach; ?>
</div>
