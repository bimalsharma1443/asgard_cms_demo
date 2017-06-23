@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li class=""><a href="{{ URL::route('admin.user.user.index') }}">{{ trans('user::users.breadcrumb.users') }}</a></li>
    <li class="active">{{ trans('user::users.breadcrumb.edit-user') }}</li>
</ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
@stop

@section('content')
{!! Form::open(['route' => ['admin.user.user.update', $user->id], 'method' => 'put']) !!}
    <div class="card">
        <div class="header">
            {{ trans('user::users.title.edit-user') }} <small>{{ $user->present()->fullname() }}</small>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('user::users.tabs.data') }}</a></li>
                <li class=""><a href="#tab_2-2" data-toggle="tab">{{ trans('user::users.tabs.roles') }}</a></li>
                <li class=""><a href="#tab_3-3" data-toggle="tab">{{ trans('user::users.tabs.permissions') }}</a></li>
                <li class=""><a href="#password_tab" data-toggle="tab">{{ trans('user::users.tabs.new password') }}</a></li>
            </ul>
            <div class="card tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('first_name', trans('user::users.form.first-name'), ['class' => 'form-label']) !!}
                                        {!! Form::text('first_name', Input::old('first_name', $user->first_name), ['class' => 'form-control']) !!}
                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('last_name', trans('user::users.form.last-name'), ['class' => 'form-label']) !!}
                                        {!! Form::text('last_name', Input::old('last_name', $user->last_name), ['class' => 'form-control']) !!}
                                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('email', trans('user::users.form.email'), ['class' => 'form-label']) !!}
                                        {!! Form::email('email', Input::old('email', $user->email), ['class' => 'form-control']) !!}
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="checkbox{{ $errors->has('activated') ? ' has-error' : '' }}">
                                    <input type="hidden" value="{{ $user->id === $currentUser->id ? '1' : '0' }}" name="activated"/>
                                    <?php $oldValue = (bool) $user->isActivated() ? 'checked' : ''; ?>
                                     <input id="activated"
                                               name="activated"
                                               type="checkbox"
                                               class="flat-blue"
                                               {{ $user->id === $currentUser->id ? 'disabled' : '' }}
                                               {{ Input::old('activated', $oldValue) }}
                                               value="1" />
                                    <label for="activated">
                                        {{ trans('user::users.form.is_activated') }}
                                        {!! $errors->first('activated', '<span class="help-block">:message</span>') !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_2-2">
                    <div class="body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('user::users.tabs.roles') }}</label>
                                <select multiple="" class="form-control show-tick" name="roles[]">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="{{ $role->id }}" <?php echo $user->hasRoleId($role->id) ? 'selected' : '' ?>>{{ $role->name }}</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_3-3">
                    <div class="body">
                        @include('user::admin.partials.permissions', ['model' => $user])
                    </div>
                </div>
                <div class="tab-pane" id="password_tab">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>{{ trans('user::users.new password setup') }}</h4>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('password', trans('user::users.form.new password') , ['class' => 'form-label']) !!}
                                        {!! Form::input('password', 'password', '', ['class' => 'form-control']) !!}
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('password_confirmation', trans('user::users.form.new password confirmation'), ['class' => 'form-label']) !!}
                                        {!! Form::input('password', 'password_confirmation', '', ['class' => 'form-control']) !!}
                                        {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{ trans('user::users.tabs.or send reset password mail') }}</h4>
                                <a href="#" class="btn btn-flat bg-maroon" data-toggle="tooltip" data-placement="bottom" title="Coming soon">
                                    {{ trans('user::users.send reset password email') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('user::button.update') }}</button>
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
