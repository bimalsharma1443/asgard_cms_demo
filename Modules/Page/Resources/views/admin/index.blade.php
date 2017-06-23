@extends('layouts.master')

@section('content-header')
    <ol class="breadcrumb">
        <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('page::pages.title.pages') }}</li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="header">
            {{ trans('page::pages.title.pages') }}
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ URL::route('admin.page.page.create') }}" class="btn btn-primary" style="padding: 4px 10px;">
                    <i class="material-icons">create</i> 
                    <span class="btn-text">{{ trans('page::pages.button.create page') }}</span>
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>{{ trans('page::pages.table.name') }}</th>
                    <th>{{ trans('page::pages.table.slug') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($pages)): ?>
                <?php foreach ($pages as $page): ?>
                <tr>
                    <td>
                        <a href="{{ URL::route('admin.page.page.edit', [$page->id]) }}">
                            {{ $page->id }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.page.page.edit', [$page->id]) }}">
                            {{ $page->title }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.page.page.edit', [$page->id]) }}">
                            {{ $page->slug }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ URL::route('admin.page.page.edit', [$page->id]) }}">
                            {{ $page->created_at }}
                        </a>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ URL::route('admin.page.page.edit', [$page->id]) }}" class="btn btn-default btn-flat"><i class="material-icons">edit</i></a>
                            <button data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.page.page.destroy', [$page->id]) }}" class="btn btn-danger btn-flat"><i class="material-icons">delete</i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>{{ trans('page::pages.table.name') }}</th>
                    <th>{{ trans('page::pages.table.slug') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th>{{ trans('core::core.table.actions') }}</th>
                </tr>
                </tfoot>
            </table>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('page::pages.title.create page') }}</dd>
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
