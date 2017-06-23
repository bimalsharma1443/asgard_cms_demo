@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('user::users.breadcrumb.home') }}</a></li>
    <li class="active">{{ trans('workshop::themes.breadcrumb.themes') }}</li>
</ol>
@stop

@section('styles')
    <style>
        .jsUpdateModule {
            transition: all .5s ease-in-out;
        }
    </style>
@stop

@section('content')
    <div class="card">
        <div class="header">
            {{ trans('workshop::themes.title') }}
        </div>
        <!-- /.box-header -->
        <div class="body">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                <tr>
                    <th>{{ trans('workshop::modules.table.name') }}</th>
                    <th width="15%">{{ trans('workshop::themes.type') }}</th>
                    <th width="15%">{{ trans('workshop::modules.table.version') }}</th>
                    <th width="15%">{{ trans('workshop::modules.table.enabled') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php if (isset($themes)): ?>
                    <?php foreach ($themes as $theme): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.workshop.themes.show', [$theme->getName()]) }}">
                                    {{ $theme->getName() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.workshop.themes.show', [$theme->getName()]) }}">
                                    {{ $theme->type }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.workshop.themes.show', [$theme->getName()]) }}">
                                    {{ $theme->version }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.workshop.themes.show', [$theme->getName()]) }}">
                                    <span class="label label-{{$theme->active ? 'success' : 'danger'}}">
                                        {{ $theme->active ? trans('workshop::modules.enabled') : trans('workshop::modules.disabled') }}
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>{{ trans('workshop::modules.table.name') }}</th>
                    <th>{{ trans('workshop::themes.type') }}</th>
                    <th>{{ trans('workshop::modules.table.version') }}</th>
                    <th>{{ trans('workshop::modules.table.enabled') }}</th>
                </tr>
                </tfoot>
            </table>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@stop

@section('scripts')
    <?php $locale = locale(); ?>
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
    
<script>
$( document ).ready(function() {
    
    $('.jsUpdateModule').on('click', function(e) {
        $(this).data('loading-text', '<i class="fa fa-spinner fa-spin"></i> Loading ...');
        var $btn = $(this).button('loading');
        var token = '<?= csrf_token() ?>';
        $.ajax({
            type: 'POST',
            url: '<?= route('admin.workshop.modules.update') ?>',
            data: {module: $btn.data('module'), _token: token},
            success: function(data) {
                console.log(data);
                if (data.updated) {
                    $btn.button('reset');
                    $btn.removeClass('btn-primary');
                    $btn.addClass('btn-success');
                    $btn.html('<i class="fa fa-check"></i> Module updated!')
                    setTimeout(function() {
                        $btn.removeClass('btn-success');
                        $btn.addClass('btn-primary');
                        $btn.html('Update')
                    }, 2000);
                }
            }
        });
    });
});
</script>
@stop
