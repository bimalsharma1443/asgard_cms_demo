<div class="body">
    <div class='form-group{{ $errors->has("{$lang}[title]") ? ' has-error' : '' }} form-float'>
        <div class="form-line">
            {!! Form::label("{$lang}[title]", trans('menu::menu.form.title'),['class' => 'form-label']) !!}
            {!! Form::text("{$lang}[title]", Input::old("{$lang}[title]"), ['class' => 'form-control', 'autofocus']) !!}
            {!! $errors->first("{$lang}[title]", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="form-group form-float">
        {!! Form::label("{$lang}[uri]", trans('menu::menu.form.uri'),['class' => 'form-label']) !!}
        <div class="form-line">
            <div class='input-group{{ $errors->has("{$lang}[uri]") ? ' has-error' : '' }}'>
                <span class="input-group-addon">/{{ $lang }}/</span>
                {!! Form::text("{$lang}[uri]", Input::old("{$lang}[uri]"), ['class' => 'form-control']) !!}
                {!! $errors->first("{$lang}[uri]", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
    </div>
    <div class="form-group{{ $errors->has("{$lang}[url]") ? ' has-error' : '' }} form-float">
        <div class="form-line">
            {!! Form::label("{$lang}[url]", trans('menu::menu.form.url'),['class' => 'form-label']) !!}
            {!! Form::text("{$lang}[url]", Input::old("{$lang}[url]"), ['class' => 'form-control']) !!}
            {!! $errors->first("{$lang}[url]", '<span class="help-block">:message</span>') !!}
        </div>
    </div>

    <div class="checkbox">    
        <input id="basic_checkbox_2" name="{{$lang}}[status]" type="checkbox" class="flat-blue" value="1" />
        <label for="basic_checkbox_2">
            {{ trans('menu::menu.form.status') }}
        </label>
    </div>
</div>
