@extends('layouts.account')

@section('title')
    {{ trans('user::auth.login') }} | @parent
@stop

@section('content')
    <div class="logo">
        <a href="{{ url('/') }}">{{ setting('core::site-name') }}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="body">
            <p class="msg">{{ trans('user::auth.sign in welcome message') }}</p>
            @include('flash::message')

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                       <input type="email" class="form-control"
                           name="email" placeholder="{{ trans('user::auth.email') }}" value="{{ old('email')}}">
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control"
                           name="password" placeholder="Password" value="{{ old('password')}}">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">{{ trans('user::auth.remember me') }}</label>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-block bg-pink waves-effect">
                            {{ trans('user::auth.login') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="row m-t-15 m-b--20">
                <div class="col-xs-6">
                   <a href="{{ route('reset')}}">{{ trans('user::auth.forgot password') }}</a>
                </div>
                <div class="col-xs-6 align-right">
                    <a href="{{ route('register')}}" class="text-center">{{ trans('user::auth.register')}}</a>
                </div>
            </div>            
        </div>
    </div>
@stop
