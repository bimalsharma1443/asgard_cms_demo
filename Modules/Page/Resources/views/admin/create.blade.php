@extends('layouts.master')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ URL::route('admin.page.page.index') }}">{{ trans('page::pages.title.pages') }}</a></li>
        <li class="active">{{ trans('page::pages.title.create page') }}</li>
    </ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
    <style>
        .checkbox label {
            padding-left: 0;
        }
    </style>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.page.page.store'], 'method' => 'post']) !!}
    <div class="col-md-9">
        <div class="card">
            <div class="header">
                {{ trans('page::pages.title.create page') }}
            </div>
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers', ['fields' => ['title', 'body']])
                <div class="tab-content">
                    <?php $i = 0; ?>
                    <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                    <?php ++$i; ?>
                    <div class="card tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                        @include('page::admin.partials.create-fields', ['lang' => $locale])
                    </div>
                    <?php endforeach; ?>
                    <?php if (config('asgard.page.config.partials.normal.create') !== []): ?>
                        <?php foreach (config('asgard.page.config.partials.normal.create') as $partial): ?>
                            @include($partial)
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="footer">
                        <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('core::core.button.create') }}</button>
                        <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                        <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.page.page.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="body">
                <div class="demo-checkbox{{ $errors->has('is_home') ? ' has-error' : '' }}">
                    <input type="hidden" name="is_home" value="0">
                    <input id="basic_checkbox_2" name="is_home" type="checkbox" class="" value="1" />
                    <label for="basic_checkbox_2">
                        {{ trans('page::pages.form.is homepage') }}
                        {!! $errors->first('is_home', '<span class="help-block">:message</span>') !!}
                    </label>                
                </div>
                <hr/>
                <div class='form-group{{ $errors->has("template") ? ' has-error' : '' }} form-float'>
                    {!! Form::label("template", trans('page::pages.form.template'),['class' => 'form-label']) !!}
                    {!! Form::select("template", $all_templates, old("template", 'default'), ['class' => "form-control show-tick"]) !!}
                    {!! $errors->first("template", '<span class="help-block">:message</span>') !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('page::pages.navigation.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
    {!! Theme::script('plugins/bootstrap-select/js/bootstrap-select.js') !!}
    {!! Theme::script('plugins/autosize/autosize.js') !!}
    {!! Theme::script('plugins/momentjs/moment.js') !!}
    {!! Theme::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Theme::script('/plugins/ckeditor/ckeditor.js') !!}
    {!! Theme::script('js/pages/forms/basic-form-elements.js') !!}    
@stop
