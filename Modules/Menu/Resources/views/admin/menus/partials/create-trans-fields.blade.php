<div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }} form-float'>
    <div class="form-line">
        {!! Form::label("{$lang}[title]", trans('menu::menu.form.title'),['class' => 'form-label']) !!}
        {!! Form::text("{$lang}[title]", old("$lang.title"), ['class' => 'form-control']) !!}
        {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
    </div>
</div>
<div class="checkbox">
    <input id="basic_checkbox_2" name="{{$lang}}[status]" type="checkbox" class="flat-blue" {{ (is_null(old("$lang.status"))) ?: 'checked' }} value="1" />
     <label for="basic_checkbox_2">
        {{ trans('menu::menu.form.status') }}
    </label>
</div>
