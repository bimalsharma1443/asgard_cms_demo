<div class="body">
    <div class="box-body">
        <div class='form-group{{ $errors->has("{$lang}.title") ? ' has-error' : '' }} form-float'>
            <div class="form-line">
                {!! Form::label("{$lang}[title]", trans('page::pages.form.title'), ['class' => 'form-label']) !!}
                {!! Form::text("{$lang}[title]", old("{$lang}.title"), ['class' => 'form-control', 'data-slug' => 'source']) !!}
                {!! $errors->first("{$lang}.title", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='form-group{{ $errors->has("{$lang}.slug") ? ' has-error' : '' }} form-float'>
            <div class="form-line">
                {!! Form::label("{$lang}[slug]", trans('page::pages.form.slug'), ['class' => 'form-label']) !!}
                {!! Form::text("{$lang}[slug]", old("{$lang}.slug"), ['class' => 'form-control slug', 'data-slug' => 'target']) !!}
                {!! $errors->first("{$lang}.slug", '<span class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class='{{ $errors->has("{$lang}.body") ? ' has-error' : '' }}'>
            {!! Form::label("{$lang}[body]", trans('page::pages.form.body')) !!}
            <textarea class="ckeditor" name="{{$lang}}[body]" rows="10" cols="80">{{ old("{$lang}.body") }}</textarea>
            {!! $errors->first("{$lang}.body", '<span class="help-block">:message</span>') !!}
        </div>
        <?php if (config('asgard.page.config.partials.translatable.create') !== []): ?>
            <?php foreach (config('asgard.page.config.partials.translatable.create') as $partial): ?>
                @include($partial)
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="card">
            <div class="header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-{{$lang}}">
                        {{ trans('page::pages.form.meta_data') }}
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseTwo-{{$lang}}" class="panel-collapse collapse">
                <div class="body">
                    <div class='form-group{{ $errors->has("{$lang}[meta_title]") ? ' has-error' : '' }} form-float'>
                        <div class="form-line">
                            {!! Form::label("{$lang}[meta_title]", trans('page::pages.form.meta_title'),['class' => 'form-label']) !!}
                            {!! Form::text("{$lang}[meta_title]", old("$lang.meta_title"), ['class' => "form-control"]) !!}
                            {!! $errors->first("{$lang}[meta_title]", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}[meta_description]") ? ' has-error' : '' }} form-float'>
                        <div class="form-line">
                            {!! Form::label("{$lang}[meta_description]", trans('page::pages.form.meta_description'),['class' => 'form-label']) !!}
                            <textarea class="form-control" name="{{$lang}}[meta_description]" rows="10" cols="80">{{ old("$lang.meta_description") }}</textarea>
                            {!! $errors->first("{$lang}[meta_description]", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h4 class="box-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFacebook-{{$lang}}">
                        {{ trans('page::pages.form.facebook_data') }}
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapseFacebook-{{$lang}}" class="panel-collapse collapse">
                <div class="body">
                    <div class='form-group{{ $errors->has("{$lang}[og_title]") ? ' has-error' : '' }} form-float'>
                        <div class="form-line">
                            {!! Form::label("{$lang}[og_title]", trans('page::pages.form.og_title'),['class' => "form-label"]) !!}
                            {!! Form::text("{$lang}[og_title]", old("{$lang}.og_title"), ['class' => "form-control"]) !!}
                            {!! $errors->first("{$lang}[og_title]", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class='form-group{{ $errors->has("{$lang}[og_description]") ? ' has-error' : '' }} form-float'>
                        <div class="form-line">
                            {!! Form::label("{$lang}[og_description]", trans('page::pages.form.og_description'),['class' => "form-label"]) !!}
                            <textarea class="form-control" name="{{$lang}}[og_description]" rows="10" cols="80">{{ old("$lang.og_description") }}</textarea>
                            {!! $errors->first("{$lang}[og_description]", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="clearfix{{ $errors->has("{$lang}[og_type]") ? ' has-error' : '' }}">
                        
                        <select class="form-control show-tick" name="{{ $lang }}[og_type]">
                            <option value="website" {{ old("$lang.og_type") == 'website' ? 'selected' : '' }}>{{ trans('page::pages.facebook-types.website') }}</option>
                            <option value="product" {{ old("$lang.og_type") == 'product' ? 'selected' : '' }}>{{ trans('page::pages.facebook-types.product') }}</option>
                            <option value="article" {{ old("$lang.og_type") == 'article' ? 'selected' : '' }}>{{ trans('page::pages.facebook-types.article') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
