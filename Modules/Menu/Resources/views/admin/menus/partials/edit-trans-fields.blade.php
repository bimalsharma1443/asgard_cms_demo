<div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }} form-float'>
    <div class="form-line">
        {!! Form::label("{$lang}[title]", trans('menu::menu.form.title'),['class' => 'form-label']) !!}
        <?php $old = $menu->hasTranslation($lang) ? $menu->translate($lang)->title : '' ?>
        {!! Form::text("{$lang}[title]", Input::old("{$lang}[title]", $old), ['class' => 'form-control']) !!}
        {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="checkbox">
    <?php $old = $menu->hasTranslation($lang) ? $menu->translate($lang)->status : false ?>
        <input id="basic_checkbox_2" name="{{$lang}}[status]" type="checkbox" class="flat-blue" {{ ((bool) $old) ? 'checked' : '' }} value="1" />
    <label for="basic_checkbox_2">
        {{ trans('menu::menu.form.status') }}
    </label>
</div>
