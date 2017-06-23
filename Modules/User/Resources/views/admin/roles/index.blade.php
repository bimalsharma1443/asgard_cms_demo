@extends('layouts.master')

@section('content-header')
<h1>
    {{ trans('user::roles.title.roles') }}
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li class="active">{{ trans('user::roles.breadcrumb.roles') }}</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ URL::route('admin.user.role.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                    <i class="fa fa-pencil"></i> {{ trans('user::roles.button.new-role') }}
                </a>
            </div>
        </div>
        <div class="card">
            <div class="header">
            </div>
            <!-- /.box-header -->
            <div class="body">
                <table class="data-table table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <th>{{ trans('user::roles.table.name') }}</th>
                            <th>{{ trans('user::users.table.created-at') }}</th>
                            <th data-sortable="false">{{ trans('user::users.table.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($roles)): ?>
                        <?php foreach ($roles as $role): ?>
                            <tr>
                                <td>
                                    <a href="{{ URL::route('admin.user.role.edit', [$role->id]) }}">
                                        {{ $role->id }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('admin.user.role.edit', [$role->id]) }}">
                                        {{ $role->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('admin.user.role.edit', [$role->id]) }}">
                                        {{ $role->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.user.role.edit', [$role->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.user.role.destroy', [$role->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td>Id</td>
                            <th>{{ trans('user::roles.table.name') }}</th>
                            <th>{{ trans('user::users.table.created-at') }}</th>
                            <th>{{ trans('user::users.table.actions') }}</th>
                        </tr>
                    </tfoot>
                </table>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
    </div>
<!-- /.col (MAIN) -->
</div>
</div>
@include('core::partials.delete-modal')
@stop

@section('scripts')
<?php $locale = App::getLocale(); ?>
    {!! Theme::script('plugins/jquery-datatable/jquery.dataTables.js') !!}
    {!! Theme::script('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/jszip.min.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/pdfmake.min.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/vfs_fonts.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') !!}
    {!! Theme::script('plugins/jquery-datatable/extensions/export/buttons.print.min.js') !!}
    {!! Theme::script('js/pages/tables/jquery-datatable.js') !!}
@stop
