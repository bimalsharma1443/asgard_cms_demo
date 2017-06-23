@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('admin.setting.settings.index') }}"><i class="fa fa-cog"></i> {{ trans('setting::settings.breadcrumb.settings') }}</a></li>
    <li class="active"><i class="fa fa-cog"></i> {{ trans('setting::settings.breadcrumb.module settings', ['module' => ucfirst($currentModule)]) }}</li>
</ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
@stop

@section('content')
{!! Form::open(['route' => ['admin.setting.settings.store'], 'method' => 'post']) !!}
<div class="row">
    <div class="sidebar-nav col-sm-2">
        <div class="card">
            <div class="header">
                <h3 class="box-title">{{ trans('setting::settings.title.module settings') }}</h3>
            </div>
            <style>
                a.active {
                    text-decoration: none;
                    background-color: #eee;
                }
            </style>
    		<ul class="nav nav-list">
    		  <?php foreach ($modulesWithSettings as $module => $settings): ?>
                  <li>
                    <a href="{{ URL::route('dashboard.module.settings', [$module]) }}"
                       class="{{ $module == $currentModule->getLowerName() ? 'active' : '' }}" style="color: #000">
                        {{ ucfirst($module) }}
                        <small class="badge pull-right bg-blue">{{ count($settings) }}</small>
                    </a>
                    </li>
              <?php endforeach; ?>
    		</ul>
    	</div>
    </div>
    <div class="col-md-10">
        <div class="card">
            <div class="header">
                <h3 class="box-title">
                     {{ trans('setting::settings.title.module name settings', ['module' => ucfirst($currentModule)]) }}
                </h3>
            </div>
            <?php if ($translatableSettings): ?>
                <div class="card">
                    <div class="header">
                        <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                    </div>
                    <div class="body">
                        <div class="nav-tabs-custom">
                            @include('partials.form-tab-headers')
                            <div class="card tab-content">
                                <?php $i = 0; ?>
                                <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                    <?php $i++; ?>
                                    <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                        @include('setting::admin.partials.fields', ['settings' => $translatableSettings])
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($plainSettings): ?>
            <div class="card">
                <div class="header">
                    <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="body">
                    @include('setting::admin.partials.fields', ['settings' => $plainSettings])
                </div>
            </div>
            <?php endif; ?>
            <div class="body">
                <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('core::core.button.update') }}</button>
                <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.setting.settings.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('scripts')
<?php $locale = App::getLocale(); ?>
    {!! Theme::script('plugins/bootstrap-select/js/bootstrap-select.js') !!}
    {!! Theme::script('plugins/autosize/autosize.js') !!}
    {!! Theme::script('plugins/momentjs/moment.js') !!}
    {!! Theme::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Theme::script('/plugins/ckeditor/ckeditor.js') !!}
    {!! Theme::script('js/pages/forms/basic-form-elements.js') !!}    
<script>
$( document ).ready(function() {
    

    $('input[type="checkbox"]').on('ifChecked', function(){
      $(this).parent().find('input[type=hidden]').remove();
    });

    $('input[type="checkbox"]').on('ifUnchecked', function(){
      var name = $(this).attr('name'),
          input = '<input type="hidden" name="' + name + '" value="0" />';
      $(this).parent().append(input);
    });
});
</script>
@stop
