@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('admin.menu.menu.index') }}">{{ trans('menu::menu.breadcrumb.menu') }}</a></li>
    <li>{{ trans('menu::menu.breadcrumb.create menu') }}</li>
</ol>
@stop

@section('styles')
@stop

@section('content')
{!! Form::open(['route' => ['admin.menu.menu.store'], 'method' => 'post']) !!}
    <div class="card">
        <div class="header">
            <h3 class="box-title">{{ trans('menu::menu.titles.create menu') }}</h3>
        </div>
        <div class="card">
            <div class="header">
                <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
            </div>
            <div class="body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php $i = 0; ?>
                        <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                            <?php $i++; ?>
                            <li class="{{ App::getLocale() == $locale ? 'active' : '' }}">
                                <a href="#tab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
                        <?php $i = 0; ?>
                        <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                            <?php $i++; ?>
                            <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                @include('menu::admin.menus.partials.create-trans-fields', ['lang' => $locale])
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
            </div>
            <div class="body">
                @include('menu::admin.menus.partials.create-fields')
            </div>
        </div>
        <div class="body">
            <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('core::core.button.create') }}</button>
            <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
            <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.menu.menu.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
        <dd>{{ trans('core::core.back to index', ['name' => 'menu']) }}</dd>
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
