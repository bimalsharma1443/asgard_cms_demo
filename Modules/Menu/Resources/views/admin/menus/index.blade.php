@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li class="active">{{ trans('menu::menu.breadcrumb.menu') }}</li>
</ol>
@stop

@section('content')
    <div class="card">
        <div class="header">
            {{ trans('menu::menu.titles.menu') }}
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ URL::route('admin.menu.menu.create') }}" class="btn btn-primary btn-flat">
                    <i class="fa fa-pencil"></i> {{ trans('menu::menu.button.create menu') }}
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                    <tr>
                        <th>{{ trans('menu::menu.table.name') }}</th>
                        <th>{{ trans('menu::menu.table.title') }}</th>
                        <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($menus)): ?>
                    <?php foreach ($menus as $menu): ?>
                        <tr>
                            <td>
                                <a href="{{ URL::route('admin.menu.menu.edit', [$menu->id]) }}">
                                    {{ $menu->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ URL::route('admin.menu.menu.edit', [$menu->id]) }}">
                                    {{ $menu->title }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ URL::route('admin.menu.menu.edit', [$menu->id]) }}" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#confirmation-{{ $menu->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ trans('menu::menu.table.name') }}</th>
                        <th>{{ trans('menu::menu.table.title') }}</th>
                        <th>{{ trans('core::core.table.actions') }}</th>
                    </tr>
                </tfoot>
            </table>
        <!-- /.box-body -->
        </div>
    <!-- /.box -->
    </div>
 
<?php if (isset($menus)): ?>
    <?php foreach ($menus as $menu): ?>
    <!-- Modal -->
    <div class="modal fade modal-danger" id="confirmation-{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('core::core.modal.title') }}</h4>
                </div>
                <div class="modal-body">
                    {{ trans('core::core.modal.confirmation-message') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline btn-flat" data-dismiss="modal">{{ trans('core::core.button.cancel') }}</button>
                    {!! Form::open(['route' => ['admin.menu.menu.destroy', $menu->id], 'method' => 'delete', 'class' => 'pull-left']) !!}
                        <button type="submit" class="btn btn-outline btn-flat"><i class="glyphicon glyphicon-trash"></i> {{ trans('core::core.button.delete') }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('menu::menu.titles.create menu') }}</dd>
    </dl>
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
