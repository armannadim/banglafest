
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
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'update_festival')) !!}   
                                <input type="hidden" name="tab" value="festival" />

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
                                                {!! Form::text('city', $data['city'].", ". $data['country'], array('id'=>'city_list', 'class'=>'form-control')) !!}                                                                                             
                                                <span class="help-block">
                                                    Provide your username </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('venue', 'Venue', array('class' => 'col-md-3 control-label')) !!}

                                            <div class="col-md-4">
                                                {!! Form::text('venue', $data['venue'], array('class'=>'form-control')) !!}                                                                                             
                                                <span class="help-block">
                                                    Type the venue name. </span>
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
                                            {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}                                            
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                            <div class="tab-pane" id="tab_5_2">
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_organizers')) !!}      
                                <input type="hidden" name="tab" value="organizer" />

                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Organizers</span>
                                        </div>                                            
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">
                                                <div class="raw">
                                                    <div class="col-md-8">                                                                        
                                                        <select multiple  name="organizers[]" id="association_list" class="form-control col-md-6">
                                                        </select>
                                                        <span class="help-block">
                                                            Select as much as options you want. Press ctrl button on the keyboard and click on the option. </span>
                                                    </div>  
                                                    <div class="col-md-2">
                                                        <a id="orgForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#organizers" data-trigger="hover" data-container="body" data-content="If your association is not in the list then open add new association form by clicking this button." data-original-title="Add new association"><!-- data-toggle="modal">-->
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">  
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                                <div class="portlet light panel panel-default" id="AddOrgForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add organization</h3>
                                    </div>
                                    <div class="table-scrollable table-scrollable-borderless" > 
                                        {!! Form::open(array('route' => 'ass_store', 'name'=>'association_form', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_association_form')) !!} 
                                        <table class="table table-hover table-light">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {!! Form::label('name', 'Association', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::label('address', 'Address', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::label('city', 'City', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <td>

                                                        <div class="input-group">
                                                            {!! Form::text('name', '', array('class'=>'form-control')) !!}                                    
                                                        </div>
                                                        <span class="help-block">
                                                            Name of the association. </span>                                                                        

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('address', '', array('class'=>'form-control')) !!}                                    
                                                        </div>
                                                        <span class="help-block">
                                                            Provide your email address </span>

                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('city', '', array('id'=>'city_list2', 'class'=>'form-control')) !!}                                                                                             
                                                        </div>
                                                        <span class="help-block">
                                                            Write name of the city </span>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {!! Form::close() !!}
                                    </div>

                                </div>


                            </div>
                            <div class="tab-pane" id="tab_5_3">           
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_person')) !!}      
                                <input type="hidden" name="tab" value="person" />
                                <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Contact Person</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">                                                
                                                <div class="raw">
                                                    <div class="col-md-8">
                                                        <select multiple name="person[]" id="contact_person_list" class="form-control col-md-6">
                                                        </select>
                                                        <span class="help-block">
                                                            Select as much as options you want. Press ctrl button on the keyboard and click on the option. </span>
                                                    </div>  
                                                    <div class="col-md-2">                                                        
                                                        <a id="perForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#contact_person" data-trigger="hover" data-container="body" data-content="If the person is not in the list then open add new contact person form by clicking this button." data-original-title="Add new contact person">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                                <div class="portlet light panel panel-default" id="AddPersonForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add new contact person</h3>
                                    </div>
                                    <div class="panel-body">
                                        {!! Form::open(array('route' => 'p_store', 'name'=>'person_form', 'method' => 'POST', 'class'=>'form-inline ', 'id'=>'submit_person_form')) !!} 

                                        <div class="form-group">
                                            {!! Form::text('first_name', '', array('class'=>'form-control', 'placeholder'=>'First Name')) !!}                                        
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('last_name', '', array('class'=>'form-control', 'placeholder'=>'Last Name')) !!}                                        
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Surname')) !!}                                        
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            {!! Form::text('address', '', array('class'=>'form-control', 'placeholder'=>'Address')) !!}            
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('city', '', array('class'=>'form-control', 'placeholder'=>'City', 'id'=>'cityContactPerson')) !!}            
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            {!! Form::text('contact_number', '', array('class'=>'form-control', 'placeholder'=>'Contact Number')) !!}
                                        </div>
                                        <br>
                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_5_4">
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_guest')) !!}      
                                <input type="hidden" name="tab" value="guest" />
                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Special Guests</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">                                                
                                                <div class="raw">
                                                    <div class="col-md-8">
                                                        <select multiple name="guests[]" id="guests_list" class="form-control col-md-6">
                                                        </select>
                                                        <span class="help-block">
                                                            Select as much as options you want. Press ctrl button on the keyboard and click on the option. </span>
                                                    </div>  
                                                    <div class="col-md-2">                                                        
                                                        <a id="guestForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#guest" data-trigger="hover" data-container="body" data-content="If the gues is not in the list then open add new guest form by clicking this button." data-original-title="Add new guest">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                                <div class="portlet light panel panel-default" id="AddGuestForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add new guest</h3>
                                    </div>
                                    <div class="panel-body">


                                        {!! Form::open(array('route' => 'api.v1.guest.store', 'name'=>'guest_form', 'method' => 'POST', 'class'=>'form-inline ', 'id'=>'submit_guest_form')) !!} 
                                        <input type="hidden" name="token" value=""/>
                                        <table class="table table-hover table-light">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {!! Form::label('name', 'Guest', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::label('description', 'Info', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('name', '', array('class'=>'form-control')) !!}
                                                        </div>
                                                        <span class="help-block">
                                                            Full name of the guest. </span>

                                                    </td>
                                                    <td>
                                                        <div class="input-group col-md-10">
                                                            {!! Form::text('description', '', array('class'=>'form-control')) !!}                                                                                             
                                                        </div>
                                                        <span class="help-block">
                                                            Description of the guest. Ex. President of some association. </span>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_5_5">
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_performer')) !!}      
                                <input type="hidden" name="tab" value="performer" />
                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Performers</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">                                                
                                                <div class="raw">
                                                    <div class="col-md-8">
                                                        <select multiple name="performer[]" id="performers_list" class="form-control col-md-6">
                                                        </select>
                                                        <span class="help-block">
                                                            Select as much as options you want. Press ctrl button on the keyboard and click on the option. </span>
                                                    </div>  
                                                    <div class="col-md-2">                                                        
                                                        <a id="performerForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#performer" data-trigger="hover" data-container="body" data-content="If the gues is not in the list then open add new performer form by clicking this button." data-original-title="Add new performer">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                                <div class="portlet light panel panel-default" id="AddPerformerForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add new performer</h3>
                                    </div>
                                    <div class="panel-body">


                                        {!! Form::open(array('route' => 'api.v1.performer.store', 'name'=>'performer_form', 'method' => 'POST', 'class'=>'form-inline ', 'id'=>'submit_performer_form')) !!} 
                                        <input type="hidden" name="token" value=""/>
                                        <table class="table table-hover table-light">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {!! Form::label('name', 'Performer', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>
                                                        {!! Form::label('description', 'Info', array('class' => 'col-md-3 control-label')) !!}
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('name', '', array('class'=>'form-control')) !!}
                                                        </div>
                                                        <span class="help-block">
                                                            Full name of the performer. </span>

                                                    </td>
                                                    <td>
                                                        <div class="input-group col-md-10">
                                                            {!! Form::text('description', '', array('class'=>'form-control')) !!}                                                                                             
                                                        </div>
                                                        <span class="help-block">
                                                            Description of the guest. Dancer, singer, group or association etc. </span>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_5_6">
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_timetable')) !!}      

                                <input type="hidden" name="tab" value="timetable" />
                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Timetable</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">                                                
                                                <div class="raw">
                                                    <div class="col-md-8">
                                                        <table id="scheduleTable" class="table table-hover table-light">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Date
                                                                    </td>
                                                                    <td>
                                                                        Time
                                                                    </td>
                                                                    <td>
                                                                        Location
                                                                    </td>
                                                                    <td>
                                                                        Events
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                @foreach($data['events'] as $event)
                                                                <tr>
                                                                    <td>
                                                                        {!! date("d/m/Y", strtotime($event->start_time)) !!}
                                                                    </td>
                                                                    <td>
                                                                        {!! date("H:i", strtotime($event->start_time)) ." - ". date("H:i", strtotime($event->end_time)) !!}
                                                                    </td>
                                                                    <td>                            
                                                                        {!! $event->location !!}
                                                                    </td>
                                                                    <td>                            
                                                                        {!! $event->events !!}
                                                                    </td>
                                                                    <td>
                                                                        <a class="removeEvent" id="{!! $event->id_activity !!}" href="javascript:;" class="btn btn-icon-only default">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>   
                                                    </div>  
                                                    <div class="col-md-2">                                                        
                                                        <a id="scheduleForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#schedule" data-trigger="hover" data-container="body" data-content="If you want to add more activities in the schedule click on this button." data-original-title="Add new activity">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}


                                <div class="portlet light panel panel-default" id="AddScheduleForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add new activity</h3>
                                    </div>
                                    <div class="panel-body">


                                        {!! Form::open(array('route' => 'api.v1.schedule.store', 'name'=>'performer_form', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_performer_form')) !!} 
                                        <input type="hidden" name="token" value=""/>
                                        <input type="hidden" name="festival_id" value="{!! $data['id'] !!}"/>
                                        <table class="table table-hover table-light">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Start Time
                                                    </td>
                                                    <td>
                                                        End Time
                                                    </td>
                                                    <td>
                                                        Location
                                                    </td>
                                                    <td>
                                                        Activity
                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <td>
                                                        <div class="input-group date form_datetime">

                                                            <input type="text"  readonly class="form-control" name="start_datetime" value ="" required>
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button" style="height: 34px!important;"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <span class="help-block">
                                                            Start time of the activity. </span>

                                                    </td>
                                                    <td>

                                                        <div class="input-group date form_datetime">

                                                            <input type="text"  readonly class="form-control" name="end_datetime" value ="" required>
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button" style="height: 34px!important;"><i class="fa fa-calendar"></i></button>
                                                            </span>
                                                        </div>
                                                        <span class="help-block">
                                                            End time of the activity. </span>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('location', '', array('class'=>'form-control')) !!}                                                                                             
                                                        </div>
                                                        <span class="help-block">
                                                            Location of the activity. </span>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            {!! Form::text('events', '', array('class'=>'form-control')) !!}                                                                                             
                                                        </div>
                                                        <span class="help-block">
                                                            Write the activity. </span>
                                                    </td>
                                                    <td style="vertical-align: top;">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_5_7">
                                {!! Form::open(array('route' => array('api.v1.festival.update', $data['id']), 'method' => 'PUT', 'class'=>'form-horizontal ', 'id'=>'submit_form_multimedia')) !!}      
                                <input type="hidden" name="tab" value="multimedia" />
                                <div class="portlet light" style="background-color: #f6f6f6!important;">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Image files</span>
                                        </div>                                        
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group ">                                                
                                                <div class="raw">
                                                    <div class="col-md-8">
                                                        <table id="multimediaTable" class="table table-hover table-light">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        Image
                                                                    </td>
                                                                    <td>
                                                                        File name
                                                                    </td>
                                                                    <td>
                                                                        Poster
                                                                    </td>
                                                                    <td>
                                                                        Cover
                                                                    </td>
                                                                    <td>
                                                                        Action
                                                                    </td>
                                                                </tr>
                                                                @foreach($data['photos'] as $imgs)


                                                                <tr id="{!! $imgs->id !!}" class="uppercase">
                                                                    <td style="vertical-align: center">
                                                                        <img src="{!! $imgs->thumb !!}" style="widht: 100px;"/>
                                                                    </td>
                                                                    <td style="vertical-align: center">
                                                                        {!! preg_replace( '%^(.+)/%', '', $imgs->filename ) !!}
                                                                    </td>
                                                                    <td style="vertical-align: middle"> 
                                                                        <input type="radio" name="poster" id="optionsRadios4" value="{{$imgs->id}}" {!! $imgs->poster == 1?'checked':'' !!}>                                                                        
                                                                        {!! $imgs->poster == 1?'<input type="hidden" name="old_poster" value="'.$imgs->id.'"/>':'' !!}        
                                                                    </td>
                                                                    <td style="vertical-align: middle">                                         
                                                                        <input type="radio" name="cover" id="optionsRadios4" value="{{$imgs->id}}" {!! $imgs->poster == 2?'checked':'' !!}>
                                                                        {!! $imgs->poster == 2?'<input type="hidden" name="old_cover" value="'.$imgs->id.'"/>':'' !!}
                                                                    </td>
                                                                    <td style="vertical-align: middle">
                                                                        <a class="removeImg" id="{!! $imgs->id !!}" href="javascript:;" class="btn btn-icon-only default">
                                                                            <i class="fa fa-trash"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>   
                                                    </div>  
                                                    <div class="col-md-2">                                                        
                                                        <a id="multimediaForm" href="javascript:;" class="btn btn-icon-only green popovers" style="float:right;" data-target="#multimedia" data-trigger="hover" data-container="body" data-content="If you want to add more activities in the schedule click on this button." data-original-title="Add new activity">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {!! Form::button('Submit <i class="m-icon-swapright m-icon-white"></i>', array('class'=>'btn green button-submit', 'type'=>'submit')) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {!! Form::close() !!}
                                <div class="portlet light panel panel-default" id="AddMultimediaForm" style="display: none;" >
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add more files</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form id="fileupload" action="{{ route('api.v1.multimedia.store')}}" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                                            <input type="hidden" name="festival_id" value="{!! $data['id'] !!}" />
                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <div class="col-lg-7">
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                    <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus"></i>
                                                        <span>
                                                            Add files... </span>
                                                        <input type="file" name="files[]" multiple="">
                                                    </span>
                                                    <button type="submit" class="btn blue start">
                                                        <i class="fa fa-upload"></i>
                                                        <span>
                                                            Start upload </span>
                                                    </button>
                                                    <button type="reset" class="btn warning cancel">
                                                        <i class="fa fa-ban-circle"></i>
                                                        <span>
                                                            Cancel upload </span>
                                                    </button>
                                                    <button type="button" class="btn red delete">
                                                        <i class="fa fa-trash"></i>
                                                        <span>
                                                            Delete </span>
                                                    </button>
                                                    <input type="checkbox" class="toggle">
                                                    <!-- The global file processing state -->
                                                    <span class="fileupload-process">
                                                    </span>
                                                </div>
                                                <!-- The global progress information -->
                                                <div class="col-lg-5 fileupload-progress fade">
                                                    <!-- The global progress bar -->
                                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="progress-bar progress-bar-success" style="width:0%;">
                                                        </div>
                                                    </div>
                                                    <!-- The extended global progress information -->
                                                    <div class="progress-extended">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                            <table role="presentation" class="table table-striped clearfix">
                                                <tbody class="files">
                                                </tbody>
                                            </table>
                                        </form>

                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Demo Notes</h3>
                                            </div>
                                            <div class="panel-body">
                                                <ul>
                                                    <li>
                                                        The maximum file size for uploads is <strong>5 MB</strong> (Please check before upload the filesize. If you don't know how to reduce the size send us a message.).
                                                    </li>
                                                    <li>
                                                        Only image files (<strong>JPG, GIF, PNG</strong>) are allowed.
                                                    </li>
                                                    <li>
                                                        This images will show in event gallery part. Select poster and cover image when your images appears in the top part of this page.).
                                                    </li>                                            
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger label label-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
    </div>
    </td>
    <td>
    {% if (!i && !o.options.autoUpload) { %}
    <button class="btn blue start" disabled>
    <i class="fa fa-upload"></i>
    <span>Start</span>
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn red cancel">
    <i class="fa fa-ban"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="fa fa-trash-o"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn yellow cancel btn-sm">
    <i class="fa fa-ban"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
@section('js')

{!! HTML::script('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js'); !!}

<!-- BEGIN:File Upload Plugin JS files-->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js'); !!}
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js'); !!}
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js'); !!}
<!-- blueimp Gallery script -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js'); !!}
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js'); !!}
<!-- The basic File Upload plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js'); !!}
<!-- The File Upload processing plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js'); !!}
<!-- The File Upload image preview & resize plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js'); !!}
<!-- The File Upload video preview plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js'); !!}
<!-- The File Upload validation plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js'); !!}
<!-- The File Upload user interface plugin -->
{!! HTML::script('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js'); !!}
<!-- The main application script -->
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>    
    {!! HTML::script('assets/global/plugins/jquery-file-upload/js/cors/jquery.xdr-transport.js'); !!}
    <![endif]-->
<!-- END:File Upload Plugin JS files-->


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
{!! HTML::script('assets/admin/pages/scripts/form-fileupload.js'); !!}


<script type="text/javascript">
    jQuery(document).ready(function($) {
        ComponentsPickers.init();
        FormFileUpload.init();
        CKEDITOR.replace('description',
                {
                    customConfig: 'config.js',
                    toolbar: 'simple'
                });
        $("#city_list").jeoCityAutoComplete();
        $("#city_list2").jeoCityAutoComplete();
        $("#cityContactPerson").jeoCityAutoComplete();
        $.getJSON("{{url('getAssociation/'.$data['id'])}}", null, function(data) {
            $("#association_list option").remove();
            $.each(data, function(i, item) {
                var sel = "";
                // Create and append the new options into the select list
                var dataAss = {!! $data['associations'] !!}

                $.each(dataAss, function(key, value) {

                    if (item.id === value['id']) {
                        sel = "selected";
                    }
                });
                $("#association_list").append("<option " + sel + " value=" + item.id + ">" + item.name + "</option>");
            });
        });
        $.getJSON("{{url('getPerson/'.$data['id'])}}", null, function(data) {
            $("#contact_person_list option").remove();
            $.each(data, function(i, item) {
                var sel = "";
                // Create and append the new options into the select list
                var dataPerson = {!! $data['persons'] !!}

                $.each(dataPerson, function(key, value) {

                    if (item.id === value['id']) {
                        sel = "selected";
                    }
                });
                $("#contact_person_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
            });
        });
        $.getJSON("{{url('getGuest/'.$data['id'])}}", null, function(data) {
            $("#guests_list option").remove();
            $.each(data, function(i, item) {
                var sel = "";
                // Create and append the new options into the select list
                var dataGuest = {!! $data['guests'] !!}

                $.each(dataGuest, function(key, value) {

                    if (item.id === value['id']) {
                        sel = "selected";
                    }
                });
                $("#guests_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
            });
        });
        $.getJSON("{{url('getPerformer/'.$data['id'])}}", null, function(data) {
            $("#performers_list option").remove();
            $.each(data, function(i, item) {
                var sel = "";
                // Create and append the new options into the select list
                var dataPerformer = {!! $data['performers'] !!}

                $.each(dataPerformer, function(key, value) {

                    if (item.id === value['id']) {
                        sel = "selected";
                    }
                });
                $("#performers_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
            });
        });
        /* LOAD SELECTED TAB before refresh*/
        if (location.hash) {
            $('a[href=' + location.hash + ']').tab('show');
        }
        $(document.body).on("click", "a[data-toggle]", function(event) {
            location.hash = this.getAttribute("href");
        });
        $(window).on('popstate', function() {
            var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
            $('a[href=' + anchor + ']').tab('show');
        });
        $("#orgForm").click(function() {
            $("#AddOrgForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddOrgForm").offset().top},
                'slow');
            });
        });
        $("#perForm").click(function() {
            $("#AddPersonForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddPersonForm").offset().top},
                'slow');
            });
        });
        $("#guestForm").click(function() {
            $("#AddGuestForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddGuestForm").offset().top},
                'slow');
            });
        });
        $("#performerForm").click(function() {
            $("#AddPerformerForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddPerformerForm").offset().top},
                'slow');
            });
        });
        $("#scheduleForm").click(function() {
            $("#AddScheduleForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddScheduleForm").offset().top},
                'slow');
            });
        });
        $("#multimediaForm").click(function() {
            $("#AddMultimediaForm").toggle("slow", function() {
                $('html,body').animate({
                    scrollTop: $("#AddMultimediaForm").offset().top},
                'slow');
            });
        });
        $("#submit_association_form").submit(function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data)
                {
                    $.getJSON("{{url('getAssociation/'.$data['id'])}}", null, function(data) {
                        $("#association_list option").remove();
                        $.each(data, function(i, item) {
                            var sel = "";
                            // Create and append the new options into the select list
                            var dataAss = {!! $data['associations'] !!}

                            $.each(dataAss, function(key, value) {

                                if (item.id === value['id']) {
                                    sel = "selected";
                                }
                            });
                            $("#association_list").append("<option " + sel + " value=" + item.id + ">" + item.name + "</option>");
                        });
                    });
                },
                error: function()
                {
                    alert("Association is not added.");
                }
            });
            e.preventDefault(); //STOP default action
            $(this).unbind(e); //unbind. to stop multiple form submit.           
            $(this)[0].reset();
        });
        /* FORM Submit person */
        $("#submit_person_form").submit(function(e) {
            e.preventDefault();
            var postData1 = $(this).serializeArray();
            var formURL1 = $(this).attr("action");
            console.log(formURL1);
            $.ajax({
                url: formURL1,
                type: "POST",
                data: postData1,
                success: function(data)
                {
                    $.getJSON("{{url('getPerson/'.$data['id'])}}", null, function(data) {
                        $("#contact_person_list option").remove();
                        $.each(data, function(i, item) {
                            var sel = "";
                            // Create and append the new options into the select list
                            var dataPerson = {!! $data['persons'] !!}

                            $.each(dataPerson, function(key, value) {

                                if (item.id === value['id']) {
                                    sel = "selected";
                                }
                            });
                            $("#contact_person_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
                        });
                    });
                },
                error: function()
                {
                    alert("Person is not added.");
                }
            });
            e.preventDefault(); //STOP default action
            $(this).unbind(e); //unbind. to stop multiple form submit.           
            $(this)[0].reset();
        });
        /* FORM Submit Guest */
        $("#submit_guest_form").submit(function(e) {
            e.preventDefault();
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            console.log(formURL);
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data)
                {
                    $.getJSON("{{url('getGuest/'.$data['id'])}}", null, function(data) {
                        $("#guests_list option").remove();
                        $.each(data, function(i, item) {
                            var sel = "";
                            // Create and append the new options into the select list
                            var dataGuest = {!! $data['guests'] !!}

                            $.each(dataGuest, function(key, value) {

                                if (item.id === value['id']) {
                                    sel = "selected";
                                }
                            });
                            $("#guests_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
                        });
                    });
                },
                error: function()
                {
                    alert("Guest is not added.");
                }
            });
            e.preventDefault(); //STOP default action
            $(this).unbind(e); //unbind. to stop multiple form submit.           
            $(this)[0].reset();
        });
        /* FORM Submit Guest */
        $("#submit_performer_form").submit(function(e) {
            e.preventDefault();
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            console.log(formURL);
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data)
                {
                    $.getJSON("{{url('getPerformer/'.$data['id'])}}", null, function(data) {
                        $("#performers_list option").remove();
                        $.each(data, function(i, item) {
                            var sel = "";
                            // Create and append the new options into the select list
                            var dataGuest = {!! $data['performers'] !!}

                            $.each(dataGuest, function(key, value) {

                                if (item.id === value['id']) {
                                    sel = "selected";
                                }
                            });
                            $("#performers_list").append("<option " + sel + " value=" + item.id + ">" + item.value + "</option>");
                        });
                    });
                },
                error: function()
                {
                    alert("Performer is not added.");
                }
            });
            e.preventDefault(); //STOP default action
            $(this).unbind(e); //unbind. to stop multiple form submit.           
            $(this)[0].reset();
        });
        /* END GUEST FORM */
        /* FORM Submit Guest */
        $("#update_festival,#submit_form_organizers,#submit_form_person,#submit_form_guest,#submit_form_performer,#submit_form_timetable,#submit_form_multimedia").submit(function(e) {
            e.preventDefault();
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            console.log(formURL);
            $.ajax({
                url: formURL,
                type: $(this).attr("method"),
                data: postData,
                success: function(data)
                {
                    alert("Festival data updated.");
                    location.reload(true);

                },
                error: function()
                {
                    alert("Something wrong. Contact with admin.");
                }
            });
            e.preventDefault(); //STOP default action
            $(this).unbind(e); //unbind. to stop multiple form submit.           
            $(this)[0].reset();
        });
        /* END FESTIVAL DATA FORM*/



        /* DELETE IMAGES FROM THE TABLE*/
        $('a.removeImg').click(function() {
            var $this = $(this); //Store the context of this in a local variable 
            $.ajax({
                type: 'DELETE',
                url: '{!! url("api/v1/multimedia" ) !!}/' + $this.attr('id'),
                data: "_token={{ csrf_token() }}",
                success: function() {
                    $this.closest("tr").remove(); //This is much better                    
                }
            });
        });
        /* DELETE Event FROM THE TABLE*/
        $('a.removeEvent').click(function() {
            var $this = $(this); //Store the context of this in a local variable 
            $.ajax({
                type: 'POST',
                url: '{!! url("admin/remove_schedule" ) !!}/' + $this.attr('id'),
                data: "_token={{ csrf_token() }}",
                success: function() {
                    $this.closest("tr").remove(); //This is much better                    
                }
            });
        });
    });

</script>
@stop