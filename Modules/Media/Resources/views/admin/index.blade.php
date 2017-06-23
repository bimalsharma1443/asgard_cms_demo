@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><i class="fa fa-camera"></i> {{ trans('media::media.breadcrumb.media') }}</li>
</ol>
@stop

@section('styles')
<link href="{!! Module::asset('media:css/dropzone.css') !!}" rel="stylesheet" type="text/css" />
<style>
.dropzone {
    border: 1px dashed #CCC;
    min-height: 227px;
    margin-bottom: 20px;
}
</style>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" class="dropzone">
            {!! Form::token() !!}
        </form>
    </div>
</div>

<div class="card">
    <div class="header">
         {{ trans('media::media.title.media') }}
    </div>
    <div class="body">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <tr>
                    <th>{{ trans('core::core.table.thumbnail') }}</th>
                    <th>{{ trans('media::media.table.filename') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($files): ?>
                    <?php foreach ($files as $file): ?>
                        <tr>
                            <td>
                                <?php if ($file->isImage()): ?>
                                    <img src="{{ Imagy::getThumbnail($file->path, 'smallThumb') }}" alt=""/>
                                <?php else: ?>
                                    <i class="fa fa-file" style="font-size: 20px;"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="{{ route('admin.media.media.edit', [$file->id]) }}">
                                    {{ $file->filename }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.media.media.edit', [$file->id]) }}">
                                    {{ $file->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.media.media.edit', [$file->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.media.media.destroy', [$file->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>{{ trans('core::core.table.thumbnail') }}</th>
                    <th>{{ trans('media::media.table.filename') }}</th>
                    <th>{{ trans('core::core.table.created at') }}</th>
                    <th>{{ trans('core::core.table.actions') }}</th>
                </tr>
            </tfoot>
        </table>
    <!-- /.box-body -->
    </div>
</div>
 
@include('core::partials.delete-modal')
@stop

@section('scripts')
<script src="{!! Module::asset('media:js/dropzone.js') !!}"></script>
<?php $config = config('asgard.media.config'); ?>
<script>
    var maxFilesize = '<?php echo $config['max-file-size'] ?>',
            acceptedFiles = '<?php echo $config['allowed-types'] ?>';
</script>
<script src="{!! Module::asset('media:js/init-dropzone.js') !!}"></script>

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
