@extends('layout.master')

@section('content')

<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{!! route('person') !!}">User Management</a>
                <i class="fa fa-circle"></i>
            </li>            
            <li class="active">
                User list
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="row">
            <div class="col-md-12">                
                <!-- Begin: life time stats -->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">User List</span>
                            <span class="caption-helper">all users...</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container table-scrollable">                            
                            <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                                <thead>
                                    <tr role="row" class="heading">
                                        <th width="5%">
                                            Username
                                        </th>
                                        <th width="10%">
                                            Full Name
                                        </th>
                                        <th width="10%">
                                            User since
                                        </th>
                                        <th width="15%">
                                            Short text
                                        </th>
                                        <th width="10%">
                                            Position
                                        </th>
                                        <th width="15%">
                                            Address
                                        </th>
                                        <th width="10%">
                                            City, Country
                                        </th>
                                        <th width="10%">
                                            Phone
                                        </th>

                                        <th width="10%">
                                            Email
                                        </th>
                                        <th width="10%">
                                            Public Profile
                                        </th>
                                        <th></th>
                                    </tr>                                    
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>

@stop

@section('js')
{!! HTML::script('assets/global/plugins/select2/select2.min.js'); !!}
{!! HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); !!}
{!! HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); !!}
{!! HTML::script('assets/global/scripts/datatable.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/table-ajax.js'); !!}
<script type="text/javascript">
    jQuery(document).ready(function() {
        $.getJSON("http://localhost:9090/banglafest/api/v1/person", function(json) {
            $('#datatable_ajax').dataTable({
                sDom: '<"top"if>rt<"bottom"lp><"clear">',
                //ajax: "http://localhost:9090/banglafest/logs",
                aaData: json,
                sPaginationType: "full_numbers",
                "order": [[ 2, "asc" ]],
                aoColumns: [
                    {mDataProp: "username"},
                    {mDataProp: "name"},
                    {mDataProp: "created_at.date"},
                    {mDataProp: "short_text"},
                    {mDataProp: "position"},
                    {mDataProp: "address"},
                    {mDataProp: "city"},
                    {mDataProp: "contact_number"},
                    {mDataProp: "email"},
                    {mDataProp: null, sortable: false,
                        "mRender": function(o) {
                            var final = '<div class="portlet-body util-btn-margin-bottom-5">';
                            if (o.facebook !== "") {
                                final = final + '<a href="http://www.facebook.com/' + o.facebook + '" data-original-title="facebook" class="social-icon facebook"></a>';
                            }
                            if (o.twitter !== "") {
                                final = final + '<a href="http://www.twitter.com/' + o.twitter + '" data-original-title="twitter" class="social-icon twitter"></a>';
                            }
                            if (o.gplus !== "") {
                                final = final + '<a href="https://plus.google.com/+' + o.gplus + '" data-original-title="Goole Plus" class="social-icon googleplus"></a>';
                            }
                            final = final + '</div>';                            
                            return final;
                        }
                    },
                    {mDataProp: null, sortable: false,
                        "mRender": function(o) {
                            return '<a href="p_edit/' + o.id + '" class="btn default btn-xs purple"><i class="fa fa-edit"></i> Edit </a><a href="p_delete/' + o.id + '" class="btn default btn-xs red"><i class="fa fa-trash"></i> Delete </a>'
                        }
                    }
                ]
            });
        });
    });</script>
@stop