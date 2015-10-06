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
                                        <th width="5%">
                                            Name
                                        </th>
                                        <th width="15%">
                                            Start date
                                        </th>
                                        <th width="15%">
                                            End date
                                        </th>
                                        <th width="10%">
                                            City
                                        </th>
                                        <th width="10%">
                                            Description
                                        </th>

                                        <th width="10%">
                                            Budget
                                        </th>
                                        <th width="10%">
                                            Created On
                                        </th>
                                    </tr>
                                    <!--<tr role="row" class="filter">
                                        <td>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" name="order_id">
                                        </td>
                                        <td>
                                            <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                <input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
                                                <input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" name="order_customer_name">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-filter input-sm" name="order_ship_to">
                                        </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <input type="text" class="form-control form-filter input-sm" name="order_price_from" placeholder="From"/>
                                            </div>
                                            <input type="text" class="form-control form-filter input-sm" name="order_price_to" placeholder="To"/>
                                        </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <input type="text" class="form-control form-filter input-sm margin-bottom-5 clearfix" name="order_quantity_from" placeholder="From"/>
                                            </div>
                                            <input type="text" class="form-control form-filter input-sm" name="order_quantity_to" placeholder="To"/>
                                        </td>
                                        <td>
                                            <select name="order_status" class="form-control form-filter input-sm">
                                                <option value="">Select...</option>
                                                <option value="pending">Pending</option>
                                                <option value="closed">Closed</option>
                                                <option value="hold">On Hold</option>
                                                <option value="fraud">Fraud</option>
                                            </select>
                                        </td>
                                        <td>
                                            <div class="margin-bottom-5">
                                                <button class="btn btn-sm yellow filter-submit margin-bottom"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                            <button class="btn btn-sm red filter-cancel"><i class="fa fa-times"></i> Reset</button>
                                        </td>
                                    </tr>-->
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