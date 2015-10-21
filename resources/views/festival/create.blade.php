
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
                <div class="portlet light" >
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject font-green-sharp bold uppercase">
                                <i class="fa fa-gift"></i> Registar festival
                            </span>
                        </div>                        
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(array('route' => 'f_store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'form_festival')) !!}
                        
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                You have some form errors. Please check below.
                            </div>
                            <div class="alert alert-success display-hide">
                                <button class="close" data-close="alert"></button>
                                Your form validation is successful!
                            </div>
                            <div class="form-wizard">
                                <div class="form-body">
                                    <h3 class="block">Provide festival details</h3>
                                    <div class="form-group">
                                        {!! HTML::decode(Form::label('name', 'Name<span class="required"> * </span>', array('class' => 'control-label col-md-3'))) !!}
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                            <i class="fa"></i>
                                            {!! Form::text('name', '', array('class'=>'form-control', 'data-required'=>'1')) !!}                                                    
                                            </div>
                                            <span class="help-block">
                                                Write title of the festival. Ex: "Bangla Mela", "Boishakhi Mela", "Bijoy utshob" etc. </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! HTML::decode(Form::label('start_datetime', 'Datetime<span class="required"> * </span>', array('class' => 'col-md-3 control-label'))) !!}


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! HTML::decode(Form::label('from', 'From', array('class' => 'col-md-3 control-label'))) !!}
                                                <div class="col-md-9">
                                                    <div class="input-group date form_datetime">

                                                        <input type="text" size="16" readonly class="form-control" name="start_datetime" required>
                                                        <span class="input-group-btn">
                                                            <button class="btn default date-set" type="button" style="height: 34px!important;"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                {!! HTML::decode(Form::label('to', 'To', array('class' => 'col-md-3 control-label'))) !!}
                                                <div class="col-md-9">
                                                    <div class="input-group date form_datetime">                                                    
                                                        <input type="text" size="16" readonly class="form-control" name="end_datetime" required>
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
                                        {!! Form::label('venue', 'Venue', array('class' => 'col-md-3 control-label')) !!}

                                        <div class="col-md-4">
                                            {!! Form::text('venue', '', array('class'=>'form-control')) !!}                                                                                             
                                            <span class="help-block">
                                                Festival venue. </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('city', 'City', array('class' => 'col-md-3 control-label')) !!}

                                        <div class="col-md-4">
                                            {!! Form::text('city', '', array('id'=>'city_list', 'class'=>'form-control')) !!}                                                                                             
                                            <span class="help-block">
                                                Type name of the city. </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description', 'Description', array('class' => 'col-md-3 control-label')) !!}                                            
                                        <div class="col-md-8">
                                            {!! Form::textarea('description', '', array('id'=> 'description', 'class'=>'form-control ckeditor', 'rows'=>'5')) !!}
                                            <span class="help-block">
                                                Write a description of the festival. Ex. Guests, performers, contents, timetable, environment, city etc. </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('budget', 'Budget:', array('class' => 'col-md-3 control-label')) !!}
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                {!! Form::text('budget', '', array('class'=>'form-control')) !!}
                                                <span class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                </span>
                                            </div>
                                            <span class="help-block">
                                                Estimated budget of the festival. Optional. </span>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        {!! Form::label('link', 'Link:', array('class' => 'col-md-3 control-label')) !!}
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                                {!! Form::text('link', '', array('class'=>'form-control col-md-3')) !!}
                                                <span class="input-group-addon">
                                                    <i class="fa fa-facebook"></i>
                                                </span>
                                                {!! Form::text('facebook', '', array('class'=>'form-control col-md-3')) !!}
                                                <span class="input-group-addon">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                                {!! Form::text('twitter', '', array('class'=>'form-control col-md-3')) !!}

                                            </div>
                                            <span class="help-block">
                                                Provide web address(if you've any), facebook page, twitter link etc. </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">                                    
                                        <a href="javascript:;" class="btn blue button-next">
                                            Reset <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                        {!! Form::submit('Submit', array('class'=>'btn green button-submit')) !!}
                                        <!--<a href="javascript:;" class="btn green button-submit">
                                            Submit <i class="m-icon-swapright m-icon-white"></i>
                                        </a>-->

                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@stop

<!-- Organizers Modal-->
<div id="organizers" class="modal fade" data-width="400">
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
<div id="guests" class="modal fade"  data-width="400">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Stack One</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    {!! Form::open(array('route' => 'api.v1.guest.store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_guest_form')) !!}                        
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
                    {!! Form::open(array('route' => 'api.v1.performer.store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'submit_performers_form')) !!}                        
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

@section('js')
{!! HTML::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery-validation/js/additional-methods.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'); !!}

{!! HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); !!}

{!! HTML::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/components-pickers.js'); !!}



{!! HTML::script('assets/global/plugins/select2/select2.min.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/form-wizard.js'); !!}
{!! HTML::script('js/jeoQuery.js'); !!}


{!! HTML::script('assets/admin/pages/scripts/form-validation.js'); !!}


<script>
    jQuery(document).ready(function() {
        
        $("#city_list").jeoCityAutoComplete();       
      
        FormValidation.init();
        FormWizard.init();
        ComponentsPickers.init();
        CKEDITOR.replace('description',
                {
                    customConfig: 'config.js',
                    toolbar: 'simple'
                });
    });
</script>

@stop