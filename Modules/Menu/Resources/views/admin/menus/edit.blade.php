@extends('layouts.master')

@section('content-header')
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    <li><a href="{{ URL::route('admin.menu.menu.index') }}">{{ trans('menu::menu.breadcrumb.menu') }}</a></li>
    <li>{{ trans('menu::menu.breadcrumb.edit menu') }}</li>
</ol>
@stop

@section('styles')
    {!! Theme::Style('plugins/bootstrap-select/css/bootstrap-select.css') !!}
    <link href="{!! Module::asset('menu:css/nestable.css') !!}" rel="stylesheet" type="text/css" />
@stop

@section('content')
{!! Form::open(['route' => ['admin.menu.menu.update', $menu->id], 'method' => 'put']) !!}
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                {{ trans('menu::menu.titles.edit menu') }}
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ URL::route('dashboard.menuitem.create', [$menu->id]) }}" class="btn btn-primary btn-flat">
                        <i class="fa fa-pencil"></i> {{ trans('menu::menu.button.create menu item') }}
                    </a>
                </div>
            </div>
            <div class="body" style="overflow: hidden;">
                    {!! $menuStructure !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card">
                <div class="header">
                    <h3 class="box-title">{{ trans('core::core.title.translatable fields') }}</h3>
                </div>
                <div class="body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <?php $i = 0; ?>
                            <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                <?php $i++; ?>
                                <li class="{{ App::getLocale() == $locale ? 'active' : '' }}">
                                    <a href="#tab_{{ $i }}" data-toggle="tab">{{ trans('core::core.tab.'. strtolower($language['name'])) }}</a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content">
                            <?php $i = 0; ?>
                            <?php foreach (LaravelLocalization::getSupportedLocales() as $locale => $language): ?>
                                <?php $i++; ?>
                                <div class="tab-pane {{ App::getLocale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                                    @include('menu::admin.menus.partials.edit-trans-fields', ['lang' => $locale])
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h3 class="box-title">{{ trans('core::core.title.non translatable fields') }}</h3>
                </div>
                <div class="body">
                    @include('menu::admin.menus.partials.edit-fields')
                </div>
            </div>
            <div class="body">
                <button type="submit" class="btn btn-primary btn-flat m-l-15 waves-effect">{{ trans('core::core.button.update') }}</button>
                <button class="btn btn-default btn-flat waves-effect" name="button" type="reset">{{ trans('core::core.button.reset') }}</button>
                <a class="btn btn-danger pull-right btn-flat m-r-15 waves-effect" href="{{ URL::route('admin.menu.menu.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
        <dt><code>c</code></dt>
        <dd>{{ trans('menu::menu.titles.create menu item') }}</dd>
        <dt><code>b</code></dt>
        <dd>{{ trans('menu::menu.navigation.back to index') }}</dd>
    </dl>
@stop

@section('scripts')
<script>
$( document ).ready(function() {
    
    $('input[type="checkbox"]').on('ifChecked', function(){
      $(this).parent().find('input[type=hidden]').remove();
    });

    $('input[type="checkbox"]').on('ifUnchecked', function(){
      var name = $(this).attr('name'),
          input = '<input type="hidden" name="' + name + '" value="0" />';
      $(this).parent().append(input);
    });
});
</script>
<script src="{!! Module::asset('menu:js/jquery.nestable.js') !!}"></script>
<script>
$( document ).ready(function() {
    $('.dd').nestable();
    $('.dd').on('change', function() {
        var data = $('.dd').nestable('serialize');
        $.ajax({
            type: 'POST',
            url: '{{ route('api.menuitem.update') }}',
            data: {'menu': JSON.stringify(data), '_token': '<?php echo csrf_token(); ?>'},
            dataType: 'json',
            success: function(data) {

            },
            error:function (xhr, ajaxOptions, thrownError){
            }
        });
    });
});
</script>
<script>
    $( document ).ready(function() {
        $('.jsDeleteMenuItem').on('click', function(e) {
            var self = $(this),
                menuItemId = self.data('item-id');
            $.ajax({
                type: 'POST',
                url: '{{ route('api.menuitem.delete') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    menuitem: menuItemId
                },
                success: function(data) {
                    if (! data.errors) {
                        var elem = self.closest('li');
                        elem.fadeOut()
                        setTimeout(function(){
                            elem.remove()
                        }, 300);
                    }
                }
            });
        });
    });
</script>
    {!! Theme::script('plugins/bootstrap-select/js/bootstrap-select.js') !!}
    {!! Theme::script('plugins/autosize/autosize.js') !!}
    {!! Theme::script('plugins/momentjs/moment.js') !!}
    {!! Theme::script('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
    {!! Theme::script('/plugins/ckeditor/ckeditor.js') !!}
    {!! Theme::script('js/pages/forms/basic-form-elements.js') !!}    
@stop
