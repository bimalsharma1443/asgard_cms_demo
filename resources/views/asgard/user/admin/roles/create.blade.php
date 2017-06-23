@extends('layouts.master')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class=""><a href="{{ URL::route('admin.user.role.index') }}">{{ trans('user::roles.breadcrumb.roles') }}</a></li>
        <li class="active">{{ trans('user::roles.breadcrumb.new') }}</li>
    </ol>
@stop

@section('content')
{!! Form::open(['route' => 'admin.user.role.store', 'method' => 'post']) !!}
    <div class="card">
        <div class="header">
            New Role
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('user::roles.tabs.data') }}</a></li>
                <li class=""><a href="#tab_2-2" data-toggle="tab">{{ trans('user::roles.tabs.permissions') }}</a></li>
            </ul>
            <div class="card tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('name', trans('user::roles.form.name'),['class' => 'form-label']) !!}
                                        {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'data-slug' => 'source']) !!}
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('slug', trans('user::roles.form.slug') ,['class' => 'form-label']) !!}
                                        {!! Form::text('slug', Input::old('slug'), ['class' => 'form-control slug', 'data-slug' => 'target']) !!}
                                        {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2-2">
                    @include('user::admin.partials.permissions-create')
                </div>
                <div class="body">
                    <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('user::button.create') }}</button>
                    <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.user.role.index')}}"><i class="fa fa-times"></i> {{ trans('user::button.cancel') }}</a>
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
        <dd>{{ trans('user::roles.navigation.back to index') }}</dd>
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
