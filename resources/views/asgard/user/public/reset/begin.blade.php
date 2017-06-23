@extends('layouts.account')

@section('title')
    {{ trans('user::auth.reset password') }} | @parent
@stop

@section('content')
    <div class="logo">
        <a href="{{ url('/') }}">{{ setting('core::site-name') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="body">
            <div class="msg">{{ trans('user::auth.to reset password complete this form') }}</div>
            @include('flash::message')
            {!! Form::open(['route' => 'reset.post']) !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="email" class="form-control"
                           name="email" placeholder="{{ trans('user::auth.email') }}" value="{{ old('email')}}">
                    </div>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <button type="submit" class="btn btn-block btn-lg bg-pink waves-effect">
                    {{ trans('user::auth.reset password') }}
                </button>
                <div class="row m-t-20 m-b--5 align-center">
                    <a href="{{ route('login') }}" class="text-center">{{ trans('user::auth.I remembered my password') }}</a>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
