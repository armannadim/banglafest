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
                <a href="#">Festival</a>
                <i class="fa fa-circle"></i>
            </li>            
            <li class="active">
                Festival list
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
                            <span class="caption-subject font-green-sharp bold uppercase">Festival List</span>
                            <span class="caption-helper">all festivals...</span>
                        </div>
                        <div class="actions">
                            <a href="javascript:;" class="btn btn-default btn-circle">
                                <i class="fa fa-plus"></i>
                                <span class="hidden-480">
                                    New Order </span>
                            </a>
                            <div class="btn-group">
                                <a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
                                    <i class="fa fa-share"></i>
                                    <span class="hidden-480">
                                        Tools </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            Export to Excel </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to CSV </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to XML </a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Print Invoices </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container table-scrollable">
                            <div class="table-actions-wrapper">
                                <span>
                                </span>
                                <select class="table-group-action-input form-control input-inline input-small input-sm">
                                    <option value="">Select...</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="Cancel">Hold</option>
                                    <option value="Cancel">On Hold</option>
                                    <option value="Close">Close</option>
                                </select>
                                <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="datatable_ajax">
                                <thead>
                                    <tr role="row" class="heading">
                                        <th width="2%">
                                            <input type="checkbox" class="group-checkable">
                                        </th>
                                        <th width="10%">
                                            Name
                                        </th>
                                        <th width="10%">
                                            Start date
                                        </th>
                                        <th width="10%">
                                            End date
                                        </th>
                                        <th width="10%">
                                            City
                                        </th>
                                        <th width="30%">
                                            Description
                                        </th>
                                        
                                        <th width="5%">
                                            Budget
                                        </th>
                                        <th width="10%">
                                            Created On
                                        </th>
                                        <th>Action</th>
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