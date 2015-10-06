
@extends('layout.master')

@section('content')

<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Dashboard
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light" id="form_wizard_1">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green-sharp bold uppercase">
                                <i class="fa fa-edit"></i> Edit festival data
                            </span>
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config">
                            </a>
                            <a href="javascript:;" class="reload">
                            </a>
                            <a href="javascript:;" class="remove">
                            </a>
                        </div>
                    </div>
                    <div class="note note-success">
                        <h4 class="block">Having difficulties?</h4>
                        <p>
                            If you've difficulties in filling up this form feel free to contact with us. <a href="{{ URL('/admin/sendmail') }}" class="btn default green-stripe btn-xs">CLICK HERE</a> to send us message.
                        </p>
                    </div>
                    <div class="tabbable-custom nav-justified">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#tab_5_1" data-toggle="tab">
                                    Festival </a>
                            </li>
                            <li>
                                <a href="#tab_5_2" data-toggle="tab">
                                    Organizers </a>
                            </li>
                            <li>
                                <a href="#tab_5_3" data-toggle="tab">
                                    Persons </a>
                            </li>
                            <li>
                                <a href="#tab_5_4" data-toggle="tab">
                                    Guest </a>
                            </li>
                            <li>
                                <a href="#tab_5_5" data-toggle="tab">
                                    Performers </a>
                            </li>
                            <li>
                                <a href="#tab_5_6" data-toggle="tab">
                                    Timetable </a>
                            </li>
                            <li>
                                <a href="#tab_5_7" data-toggle="tab">
                                    Gallery </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_5_1">
                                {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_form')) !!}      

                                <div class="form-wizard">
                                    <div class="form-body">

                                        <h3 class="block">Provide your account details</h3>
                                        <div class="form-group">
                                            {!! HTML::decode(Form::label('name', 'Name<span class="required"> * </span>', array('class' => 'control-label col-md-3'))) !!}
                                            <div class="col-md-4">
                                                {!! Form::text('name', $data['name'], array('class'=>'form-control')) !!}                                                    
                                                <span class="help-block">
                                                    Provide your username </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! HTML::decode(Form::label('start_datetime', 'Datetime<span class="required"> * </span>', array('class' => 'col-md-3 control-label'))) !!}


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    {!! HTML::decode(Form::label('from', 'From', array('class' => 'col-md-3 control-label'))) !!}
                                                    <div class="col-md-9">
                                                        <div class="input-group date form_datetime">

                                                            <input type="text" size="16" readonly class="form-control" name="start_datetime" value ="{{$data['start_datetime']}}" required>
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button" style="height: 34px!important;"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    {!! HTML::decode(Form::label('to', 'To', array('class' => 'col-md-3 control-label'))) !!}
                                                    <div class="col-md-9">
                                                        <div class="input-group date form_datetime">                                                    
                                                            <input type="text" size="16" readonly class="form-control" name="end_datetime" required value ="{{$data['end_datetime']}}">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button" style="height: 34px!important;"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <span class="help-block">
                                                    Provide date and time of the program. </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('city', 'City', array('class' => 'col-md-3 control-label')) !!}

                                            <div class="col-md-4">
                                                {!! Form::text('city', $data['city'], array('id'=>'city_list', 'class'=>'form-control')) !!}                                                                                             
                                                <span class="help-block">
                                                    Provide your username </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('description', 'Description', array('class' => 'col-md-3 control-label')) !!}                                            
                                            <div class="col-md-8">
                                                {!! Form::textarea('description', $data['description'], array('class'=>'form-control ckeditor', 'rows'=>'5')) !!}
                                                <span class="help-block">
                                                    Provide your email address </span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('budget', 'Budget:', array('class' => 'col-md-3 control-label')) !!}
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    {!! Form::text('budget', $data['budget'], array('class'=>'form-control')) !!}
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-money"></i>
                                                    </span>
                                                </div>
                                                <span class="help-block">
                                                    Provide your email address </span>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            {!! Form::label('link', 'Link:', array('class' => 'col-md-3 control-label')) !!}
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-link"></i>
                                                    </span>
                                                    {!! Form::text('link', $data['link'], array('class'=>'form-control col-md-3')) !!}
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-facebook"></i>
                                                    </span>
                                                    {!! Form::text('facebook', $data['facebook'], array('class'=>'form-control col-md-3')) !!}
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-twitter"></i>
                                                    </span>
                                                    {!! Form::text('twitter', $data['twitter'], array('class'=>'form-control col-md-3')) !!}

                                                </div>
                                                <span class="help-block">
                                                    Provide your email address </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">                            
                                            <a href="javascript:;" class="btn green button-submit">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="tab_5_2">
                                {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_form')) !!}      
                                <div class="col-md-6 ">
                                    <div class="portlet light" style="background-color: #f6f6f6!important;">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <span class="caption-subject bold uppercase">Organizers</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    {!! Form::label('organizer', 'Organizers', array('class' => 'control-label')) !!}
                                                    <div class="raw">
                                                        <div class="col-md-11">                                                                        
                                                            <select  name="organizers" id="association_list" class="form-control col-md-6">
                                                            </select>
                                                        </div>  
                                                        <div class="col-md-1">
                                                            <a href="javascript:;" class="btn btn-icon-only green" style="float:right;" data-target="#organizers" data-toggle="modal">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 


                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Back </a>
                                            <a href="javascript:;" class="btn blue button-next">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="tab_5_3">
                                {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_form')) !!}      
                                <div class="col-md-6 ">                                                
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light" style="background-color: #f6f6f6!important;">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <span class="caption-subject bold uppercase">Contact Person</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    {!! Form::label('contact_person', 'Contact Person', array('class' => 'control-label')) !!}
                                                    <div class="raw">
                                                        <div class="col-md-11">
                                                            <select name="person" id="person_list" class="form-control col-md-6">
                                                            </select>
                                                        </div>  
                                                        <div class="col-md-1">
                                                            <a href="javascript:;" class="btn btn-icon-only green" style="float:right;" data-target="#contact_person" data-toggle="modal">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Back </a>
                                            <a href="javascript:;" class="btn blue button-next">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="tab-pane" id="tab_5_4">
                                {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_form')) !!}      
                                <div class="col-md-6 ">
                                    <div class="portlet light" style="background-color: #f6f6f6!important;">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <span class="caption-subject bold uppercase">Guests</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    {!! Form::label('special_guest', 'Special Guests', array('class' => 'control-label')) !!}
                                                    <div class="raw">
                                                        <div class="col-md-11">
                                                            <select name="country" id="country_list" class="form-control col-md-6">
                                                            </select>
                                                        </div>  
                                                        <div class="col-md-1">
                                                            <a href="javascript:;" class="btn btn-icon-only green" style="float:right;" data-target="#guests" data-toggle="modal">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Back </a>
                                            <a href="javascript:;" class="btn blue button-next">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="tab_5_5">
                                {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_form')) !!}      
                                <div class="col-md-12 ">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <div class="portlet light" style="background-color: #f6f6f6!important;">
                                        <div class="portlet-title">
                                            <div class="caption font-red-sunglo">
                                                <span class="caption-subject bold uppercase">Performers</span>
                                            </div>
                                            <div class="actions">
                                                <a class="btn btn-circle btn-icon-only blue" href="javascript:;">
                                                    <i class="icon-cloud-upload"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only green" href="javascript:;">
                                                    <i class="icon-wrench"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only red" href="javascript:;">
                                                    <i class="icon-trash"></i>
                                                </a>
                                                <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body form">
                                            <div class="form-body">
                                                <div class="form-group ">
                                                    {!! Form::label('special_performers', 'Special Performers', array('class' => 'control-label')) !!}
                                                    <div class="raw">
                                                        <div class="col-md-11">
                                                            <select name="country" id="country_list" class="form-control col-md-6">
                                                            </select>
                                                        </div>  
                                                        <div class="col-md-1">

                                                            <a class="btn btn-icon-only green" style="float:right;" data-target="#performers" data-toggle="modal">
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous">
                                                <i class="m-icon-swapleft"></i> Back </a>
                                            <a href="javascript:;" class="btn blue button-next">
                                                Continue <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                            <a href="javascript:;" class="btn green button-submit">
                                                Submit <i class="m-icon-swapright m-icon-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="tab_5_6">

                            </div>

                            <div class="tab-pane" id="tab_5_7">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<script>

</script>
<!-- Organizers Modal-->
<div id="organizers" class="modal fade" tabindex="-1" data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add organizer</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(array('name'=>'association_form', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_association_form')) !!}                        
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Association', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('name', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Name of the association. </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('address', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Provide your email address </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">       
                                {!! Form::submit('Submit', array('class'=>'btn green button-submit')) !!}

                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn">Close</button>
                <button type="button" class="btn red">Ok</button>
            </div>
        </div>
    </div>
</div>


<!-- contact_person Modal-->
<div id="contact_person" class="modal fade" tabindex="-1" data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Stack One</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(array('route' => 'p_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_person_form')) !!}                        
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Association', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('name', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Name of the association. </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('address', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Provide your email address </span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn">Close</button>
                <button type="button" class="btn red">Ok</button>
            </div>
        </div>
    </div>
</div>


<!-- Guests Modal-->
<div id="guests" class="modal fade" tabindex="-1" data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Stack One</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(array('route' => 'g_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_guest_form')) !!}                        
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Guest', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('name', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Name of the guest. </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Info', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::textarea('description', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Write information about the guest </span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn">Close</button>
                <button type="button" class="btn red">Ok</button>
            </div>
        </div>
    </div>
</div>




<!-- Performers Modal-->
<div id="performers" class="modal fade" tabindex="-1" data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Stack One</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(array('route' => 'perf_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_performers_form')) !!}                        
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('name', 'Performer', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::text('name', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Name of the performer. </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Info', array('class' => 'col-md-3 control-label')) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    {!! Form::textarea('description', '', array('class'=>'form-control')) !!}                                    
                                </div>
                                <span class="help-block">
                                    Write other relative information of the performer. </span>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn">Close</button>
                <button type="button" class="btn red">Ok</button>
            </div>
        </div>
    </div>
</div>

<!--<h3 class="block">Organizers </h3>


<div class="form-group">
    {!! Form::label('organizers', 'Organizers', array('class' => 'col-md-3 control-label')) !!}
    <div class="col-md-4">
        <div class="input-group">
            {!! Form::text('organizers', '', array('class'=>'form-control')) !!}
            <span class="input-group-addon">
                <i class="fa fa-users"></i>
            </span>
        </div>
        <span class="help-block">
            Provide your email address </span>
    </div>
</div>






<h3 class="block">Contact person </h3>
<div class="form-group">
    {!! Form::label('contact_person', 'Contact_person:', array('class' => 'col-md-3 control-label')) !!}
    <label class="control-label col-md-3">Fullname <span class="required">
            * </span>
    </label>
    <div class="col-md-4">
        {!! Form::text('contact_person', '', array('class'=>'form-control')) !!}
        <span class="help-block">
            Provide your fullname </span>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Contact_person_phn', 'Contact_person_phn:', array('class' => 'col-md-3 control-label')) !!}
    <label class="control-label col-md-3">Fullname <span class="required">
            * </span>
    </label>
    <div class="col-md-4">
        {!! Form::text('Contact_person_phn', '', array('class'=>'form-control')) !!}
        <span class="help-block">
            Provide your fullname </span>
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_person_email', 'Contact_person_email:', array('class' => 'col-md-3 control-label')) !!}
    <label class="control-label col-md-3">Fullname <span class="required">
            * </span>
    </label>
    <div class="col-md-4">
        {!! Form::text('contact_person_email', '', array('class'=>'form-control')) !!}
        <span class="help-block">
            Provide your fullname </span>
    </div>
</div>





    <div class="tab-pane" id="tab3">
                                        <h3 class="block">Performers</h3>
                                        <div class="form-group">
                                            {!! Form::label('special_performers', 'Special_performers:', array('class' => 'col-md-3 control-label')) !!}
                                            <div class="col-md-4">
                                                {!! Form::text('special_performers', '', array('class'=>'form-control')) !!}
                                                <span class="help-block">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <label class="control-label col-md-3">PERFORMERS LIST <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="card_number"/>
                                                <span class="help-block">
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Guests</h3>
                                        <div class="form-group">
                                            {!! Form::label('special_guest', 'Special_guest:', array('class' => 'col-md-3 control-label')) !!}
                                            <div class="col-md-4">
                                                {!! Form::text('special_guest', '', array('class'=>'form-control')) !!}                                                
                                                <span class="help-block">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">GUEST LIST <span class="required">
                                                    * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="card_number"/>
                                                <span class="help-block">
                                                </span>
                                            </div>
                                        </div>

                                    </div>


-->

@section('js')

{!! HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); !!}

{!! HTML::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/components-pickers.js'); !!}



{!! HTML::script('assets/global/plugins/select2/select2.min.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/form-wizard.js'); !!}
{!! HTML::script('js/jeoQuery.js'); !!}

{!! HTML::script('assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js'); !!}
<script>
    jQuery(document).ready(function() {
        ComponentsPickers.init();
        CKEDITOR.replace('description',
                {
                    customConfig: 'config.js',
                    toolbar: 'simple'
                });
        $("#city_list").jeoCityAutoComplete();
    });
</script>
@stop