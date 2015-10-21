<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
{!! HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! HTML::style('assets/global/plugins/uniform/css/uniform.default.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
{!! HTML::style('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') !!}
{!! HTML::style('assets/global/plugins/morris/morris.css') !!}
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
{!! HTML::style('assets/admin/pages/css/tasks.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}

<!-- BEGIN REGISTER FESTIVAL PAGE -->
@if(Route::getCurrentRoute()->getPath()=='admin/f_create')
{!! HTML::style('assets/global/plugins/select2/select2.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') !!}
@endif
<!-- END REGISTER FESTIVAL PAGE -->
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
{!! HTML::style('assets/global/css/components-rounded.css') !!}
{!! HTML::style('assets/global/css/plugins.css') !!}
{!! HTML::style('assets/admin/layout3/css/layout.css') !!}
{!! HTML::style('assets/admin/layout3/css/themes/default.css') !!}
{!! HTML::style('assets/admin/layout3/css/custom.css') !!}
<!-- END THEME STYLES -->



{!! HTML::style('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') !!}
{!! HTML::style('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') !!}
{!! HTML::style('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') !!}
<link rel="shortcut icon" href="favicon.ico">


