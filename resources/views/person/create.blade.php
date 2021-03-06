
@extends('layout.master')

@section('content')


<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="#">Home</a><i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="{!! route('person') !!}">User Management</a><i class="fa fa-circle"></i>
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
                                <i class="fa fa-gift"></i> Registar new user
                            </span>
                        </div>                        
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(array('route' => 'api.v1.person.store', 'method' => 'POST', 'class'=>'form-horizontal ', 'id'=>'person_form')) !!}                        
                        <div class="form-wizard">
                            <div class="form-body">
                                <h3 class="block">Provide user details</h3>
                                <div class="form-group">
                                    {!! HTML::decode(Form::label('name', 'Name<span class="required"> * </span>', array('class' => 'control-label col-md-3'))) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('name', '', array('class'=>'form-control')) !!}                                                    
                                        <span class="help-block">
                                            Write name of the user. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! HTML::decode(Form::label('first_name', 'First Name<span class="required"> * </span>', array('class' => 'control-label col-md-3'))) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('first_name', '', array('class'=>'form-control')) !!}                                                                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('last_name', 'Last Name', array('class' => 'control-label col-md-3')) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('last_name', '', array('class'=>'form-control')) !!}                                                                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('username', 'Username', array('class' => 'control-label col-md-3')) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('username', '', array('class'=>'form-control')) !!}                                                                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Password <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="password" id="submit_form_password"/>
                                        <span class="help-block">
                                            Provide your password. </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Confirm Password <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="rpassword"/>
                                        <span class="help-block">
                                            Confirm your password </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Role <span class="required">
                                            * </span>
                                    </label>
                                    <div class="col-md-4">
                                        <select name="role" id="roles" class="form-control col-md-6"></select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('address', 'Address', array('class' => 'control-label col-md-3')) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('address', '', array('class'=>'form-control')) !!}                                                                                            
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
                                    {!! Form::label('contact_number', 'Contact Number', array('class' => 'control-label col-md-3')) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('contact_number', '', array('class'=>'form-control')) !!}                                                                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', array('class' => 'control-label col-md-3')) !!}
                                    <div class="col-md-4">
                                        {!! Form::text('email', '', array('class'=>'form-control')) !!}                                                                                            
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
                                <div class="form-group">
                                    {!! Form::label('short_text', 'Comments', array('class' => 'col-md-3 control-label')) !!}                                            
                                    <div class="col-md-8">
                                        {!! Form::textarea('short_text', '', array('id'=> 'short_text', 'class'=>'form-control ckeditor', 'rows'=>'2')) !!}
                                        <span class="help-block">
                                            Write a description of the festival. Ex. Guests, performers, contents, timetable, environment, city etc. </span>
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
                </div>

            </div>
        </div>
    </div>
</div>


@stop
@section('js')
{!! HTML::script('js/jeoQuery.js'); !!}
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("#city_list").jeoCityAutoComplete();
        $.getJSON("{{ url('getRoles') }}", null, function(data) {
            $("#roles option").remove();
            $.each(data, function(i, item) {
                $("#roles").append("<option value=" + item.id + ">" + item.value + "</option>");
            });
        });
        
        $("form").submit(function(e) {
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
                    alert("User data created successfully.");
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
        
    });
</script>
@stop