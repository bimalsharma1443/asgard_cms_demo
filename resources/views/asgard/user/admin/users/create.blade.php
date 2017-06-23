@extends('layouts.master')

@section('content-header')
<h1>
    {{ trans('user::users.title.new-user') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li class=""><a href="{{ URL::route('admin.user.user.index') }}">{{ trans('user::users.breadcrumb.users') }}</a></li>
    <li class="active">{{ trans('user::users.breadcrumb.new') }}</li>
</ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('user::users.navigation.back to index') }}</dd>
    </dl>
@stop
@section('content')
{!! Form::open(['route' => 'admin.user.user.store', 'method' => 'post']) !!}
<div class="card">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('user::users.tabs.data') }}</a></li>
            <li class=""><a href="#tab_2-2" data-toggle="tab">{{ trans('user::users.tabs.roles') }}</a></li>
            <li class=""><a href="#tab_3-3" data-toggle="tab">{{ trans('user::users.tabs.permissions') }}</a></li>
        </ul>
        <div class="card tab-content">
            <div class="tab-pane active" id="tab_1-1">
                <div class="body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} form-float">
                                <div class="form-line">
                                    {!! Form::label('first_name', trans('user::users.form.first-name'), ['class' => 'form-label']) !!}
                                    {!! Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) !!}
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} form-float">
                                <div class="form-line">
                                    {!! Form::label('last_name', trans('user::users.form.last-name'), ['class' => 'form-label']) !!}
                                    {!! Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) !!}
                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-float">
                                <div class="form-line">
                                    {!! Form::label('email', trans('user::users.form.email'), ['class' => 'form-label']) !!}
                                    {!! Form::email('email', Input::old('email'), ['class' => 'form-control']) !!}
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-float">
                                <div class="form-line">
                                    {!! Form::label('password', trans('user::users.form.password'), ['class' => 'form-label']) !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-float">
                                <div class="form-line">
                                    {!! Form::label('password_confirmation', trans('user::users.form.password-confirmation'), ['class' => 'form-label']) !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                    {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2-2">
                <div class="body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('user::users.tabs.roles') }}</label>
                                <select multiple="" class="form-control show-tick" name="roles[]">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3-3">
                <div class="body">
                    @include('user::admin.partials.permissions-create')
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('user::button.create') }}</button>
                <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.user.user.index')}}"><i class="fa fa-times"></i> {{ trans('user::button.cancel') }}</a>
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
        <dd>{{ trans('user::users.navigation.back to index') }}</dd>
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
