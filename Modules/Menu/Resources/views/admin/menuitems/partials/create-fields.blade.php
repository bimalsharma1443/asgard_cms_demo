<div class="body">
    <div class="form-group{{ $errors->has("icon") ? ' has-error' : '' }} form-float">
        <div class="form-line">
            {!! Form::label("icon", trans('menu::menu-items.form.icon'),['class' => 'form-label']) !!}
            {!! Form::text("icon", Input::old("icon"), ['class' => 'form-control']) !!}
            {!! $errors->first("icon", '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label for="page">{{ trans('menu::menu-items.form.page') }}</label>
        <select class="form-control show-tick" name="page_id" id="page">
            <option value=""></option>
            <?php foreach ($pages as $page): ?>
                <option value="{{ $page->id }}">{{ $page->title }}</option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="target">{{ trans('menu::menu-items.form.target') }}</label>
        <select class="form-control show-tick" name="target" id="target">
            <option value="_self">{{ trans('menu::menu-items.form.same tab') }}</option>
            <option value="_blank">{{ trans('menu::menu-items.form.new tab') }}</option>
        </select>
    </div>
</div>
