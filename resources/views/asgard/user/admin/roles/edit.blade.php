@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li class=""><a href="{{ URL::route('admin.user.role.index') }}">{{ trans('user::roles.breadcrumb.roles') }}</a></li>
    <li class="active">{{ trans('user::roles.breadcrumb.edit') }}</li>
</ol>
@stop

@section('content')
{!! Form::open(['route' => ['admin.user.role.update', $role->id], 'method' => 'put']) !!}
    <div class="card">
        <div class="header">
            {{ trans('user::roles.title.edit') }} <small>{{ $role->name }}</small>
        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">{{ trans('user::roles.tabs.data') }}</a></li>
                <li class=""><a href="#tab_2-2" data-toggle="tab">{{ trans('user::roles.tabs.permissions') }}</a></li>
                <li class=""><a href="#tab_3-3" data-toggle="tab">{{ trans('user::users.title.users') }}</a></li>
            </ul>
            <div class="card tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('name', trans('user::roles.form.name'),['class' => 'form-label']) !!}
                                        {!! Form::text('name', Input::old('name', $role->name), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => trans('user::roles.form.name')]) !!}
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }} form-float">
                                    <div class="form-line">
                                        {!! Form::label('slug', trans('user::roles.form.slug'),['class' => 'form-label']) !!}
                                        {!! Form::text('slug', Input::old('slug', $role->slug), ['class' => 'form-control slug', 'data-slug' => 'target', 'placeholder' => trans('user::roles.form.slug')]) !!}
                                        {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2-2">
                    @include('user::admin.partials.permissions', ['model' => $role])
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3-3">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>{{ trans('user::roles.title.users-with-roles') }}</h3>
                                <ul class="nav nav-list">
                                    <?php foreach ($role->users as $user): ?>
                                        <li>
                                            <a href="{{ URL::route('admin.user.user.edit', [$user->id]) }}" style="color: black">{{ $user->present()->fullname() }}</a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <button type="submit" class="btn btn-primary btn-flat">{{ trans('user::button.update') }}</button>
                    <button class="btn btn-default btn-flat" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                    <a class="btn btn-danger pull-right btn-flat" href="{{ URL::route('admin.user.role.index')}}"><i class="fa fa-times"></i> {{ trans('user::button.cancel') }}</a>
                </div>
            </div><!-- /.tab-content -->
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
<script>
$( document ).ready(function() {
    $(document).keypressAction({
        actions: [
            { key: 'b', route: "<?= route('admin.user.role.index') ?>" }
        ]
    });
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
});
</script>
@stop
