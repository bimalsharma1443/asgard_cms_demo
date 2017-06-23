@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('admin.menu.menu.index') }}">{{ trans('menu::menu.breadcrumb.menu') }}</a></li>
    <li>{{ trans('menu::menu.breadcrumb.edit menu item') }}</li>
</ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
@stop

@section('content')
{!! Form::open(['route' => ['dashboard.menuitem.update', $menu->id, $menuItem->id], 'method' => 'put']) !!}
<div class="card">
    <div class="header">
            <h3 class="box-title"> {{ trans('menu::menu.titles.edit menu item') }}</h3>
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
                <div class="card tab-content">
                    <?php $i = 0; ?>
                    <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                        <?php $i++; ?>
                        <div class="body tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('menu::admin.menuitems.partials.edit-trans-fields', ['lang' => $locale])
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
            @include('menu::admin.menuitems.partials.edit-fields')
        </div>
    </div>
    <div class="body">
        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
        <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
        <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.menu.menu.edit', [$menu->id])}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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

@stop
