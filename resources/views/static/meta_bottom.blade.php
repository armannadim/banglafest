<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! HTML::script('assets/global/plugins/respond.min.js'); !!}
{!! HTML::script('assets/global/plugins/excanvas.min.js'); !!}
<![endif]-->
{!! HTML::script('assets/global/plugins/jquery.min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery-migrate.min.js'); !!}
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! HTML::script('assets/global/plugins/jquery-ui/jquery-ui.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery.blockui.min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery.cokie.min.js'); !!}
{!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js'); !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'); !!}
{!! HTML::script('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'); !!}
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
{!! HTML::script('assets/global/plugins/morris/morris.min.js'); !!}
{!! HTML::script('assets/global/plugins/morris/raphael-min.js'); !!}
{!! HTML::script('assets/global/plugins/jquery.sparkline.min.js'); !!}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! HTML::script('assets/global/scripts/metronic.js'); !!}
{!! HTML::script('assets/admin/layout3/scripts/layout.js'); !!}
{!! HTML::script('assets/admin/layout3/scripts/quick-sidebar.js'); !!}
{!! HTML::script('assets/admin/layout3/scripts/demo.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/index3.js'); !!}

@if(Route::getCurrentRoute()->getPath()=='/') 
{!! HTML::script('assets/admin/pages/scripts/tasks.js'); !!}
@endif




<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN FESTIVAL HOME PAGE -->
@if(Route::getCurrentRoute()->getPath()=='admin/festival') 
{!! HTML::script('assets/global/plugins/select2/select2.min.js'); !!}
{!! HTML::script('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js'); !!}
{!! HTML::script('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js'); !!}
{!! HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); !!}
{!! HTML::script('assets/global/scripts/datatable.js'); !!}
{!! HTML::script('assets/admin/pages/scripts/table-ajax.js'); !!}
<script type="text/javascript">
    jQuery(document).ready(function() {
        $.getJSON("http://localhost:9090/banglafest/api/v1/festival", function(json) {
            $('#datatable_ajax').dataTable({
                sDom: '<"top"if>rt<"bottom"lp><"clear">',
                //ajax: "http://localhost:9090/banglafest/logs",
                aaData: json,
                sPaginationType: "full_numbers",                
                aoColumns: [
                    {mDataProp: "id", sortable: false},
                    {mDataProp: "name"},
                    {mDataProp: "start_datetime"},
                    {mDataProp: "end_datetime"},
                    {mDataProp: "city"},
                    {mDataProp: "description"},
                    {mDataProp: "budget"},
                    {mDataProp: "created_at.date"},
                    {mDataProp: null, sortable: false,
                        "mRender": function(o) {
                            return '<a href="f_edit/' + o.id + '" class="btn default btn-xs purple"><i class="fa fa-edit"></i> Edit </a><a href="f_delete/' + o.id + '" class="btn default btn-xs red"><i class="fa fa-trash"></i> Delete </a>'
                        }
                    }
                ]
            });
        });
    });</script>
@endif
<!-- EMD FESTIVAL HOME PAGE -->



<!-- BEGIN REGISTER FESTIVAL PAGE -->

@if(Route::getCurrentRoute()->getPath()=='admin/f_create')

<script type="text/javascript">
    $(function($) {
        //get a reference to the select element
        var select = $('#country_list');
        //request the JSON data and parse into the select element
        /*$.ajax({
         url: 'http://localhost:9090/banglafest/getCountry',
         dataType: 'JSON',
         success: function(data) {
         //clear the current content of the select
         select.html();
         //iterate over the data and append a select option
         $.each(data, function(key, val) {
         select.append('<option value="' + val.id + '">' + val.country_name + '</option>');
         })
         },
         error: function() {
         
         //if there is an error append a 'none available' option
         select.html('<option id="-1">none available</option>');
         }
         });*/

        /* SELECT CITY*/
        var select_city = $('#city_list');
        /*      $('#country_list').change(function() {
         var str = "";
         
         $("#country_list option:selected").each(function() {
         
         //request the JSON data and parse into the select element
         $.ajax({
         url: 'http://localhost:9090/banglafest/getCity/' + $(this).val(),
         dataType: 'JSON',
         success: function(data) {
         //clear the current content of the select
         select_city.html();
         //iterate over the data and append a select option
         $.each(data, function(key, val) {
         select_city.append('<option id="' + val.id + '">' + val.city_accent + '</option>');
         })
         },
         error: function() {
         
         //if there is an error append a 'none available' option
         select_city.html('<option id="-1">none available</option>');
         }
         });
         });
         
         })
         .change();
         */

        //$("#city_list").jeoCityAutoComplete();
        /*$("#city_list").autocomplete({
         source: function(request, response) {
         $.ajax({
         url: "http://gd.geobytes.com/AutoCompleteCity",
         dataType: "jsonp",
         data: {
         q: request.term
         },
         success: function(data) {
         response(data);
         }
         });
         },
         minLength: 3,
         select: function(event, ui) {
         console.log(ui.item);
         },
         open: function() {
         $(this).removeClass("ui-corner-all").addClass("ui-corner-top");
         },
         close: function() {
         $(this).removeClass("ui-corner-top").addClass("ui-corner-all");
         }
         });
         */
        /*
         // Process organizers submit form
         $('#submit_association_form').submit(function(event) {
         
         // get the form data
         // there are many ways to get this data using jQuery (you can use the class or id also)
         var formData = $(this).serialize();
         // process the form
         $.ajax({
         type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
         url: '{{url("ass_store")}}', // the url where we want to POST
         data: formData, // our data object
         dataType: 'json', // what type of data do we expect back from the server
         encode: true
         })
         // using the done promise callback
         .done(function(data) {
         
         $("#association_list").find('option').remove();
         $.getJSON("{{url('getAssociation')}}", null, function(data) {
         $.each(data, function(i, item) {
         // Create and append the new options into the select list
         $("#association_list").append("<option value=" + item.id + ">" + item.name + "</option>");
         });
         });
         $('#organizers').modal('hide');
         });
         
         // stop the form from submitting the normal way and refreshing the page
         event.preventDefault();
         
         });
         
         
         // Documentation on getJSON: http://api.jquery.com/jQuery.getJSON/
         $.getJSON("{{url('getAssociation')}}", null, function(data) {
         $.each(data, function(i, item) {
         // Create and append the new options into the select list
         $("#association_list").append("<option value=" + item.id + ">" + item.name + "</option>");
         });
         });
         
         
         // Process Contact person submit form
         $('#submit_person_form').submit(function(event) {
         
         // get the form data
         // there are many ways to get this data using jQuery (you can use the class or id also)
         var formData = $(this).serialize();
         // process the form
         $.ajax({
         type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
         url: '{{url("perf_store")}}', // the url where we want to POST
         data: formData, // our data object
         dataType: 'json', // what type of data do we expect back from the server
         encode: true
         })
         // using the done promise callback
         .done(function(data) {
         
         $("#person_list").find('option').remove();
         $.getJSON("{{url('getPerson')}}", null, function(data) {
         $.each(data, function(i, item) {
         // Create and append the new options into the select list
         $("#person_list").append("<option value=" + item.id + ">" + item.name + "</option>");
         });
         });
         $('#contact_person').modal('toggle');
         });
         
         // stop the form from submitting the normal way and refreshing the page
         event.preventDefault();
         
         });
         
         
         // Documentation on getJSON: http://api.jquery.com/jQuery.getJSON/
         $.getJSON("{{url('getPerson')}}", null, function(data) {
         $.each(data, function(i, item) {
         // Create and append the new options into the select list
         $("#person_list").append("<option value=" + item.id + ">" + item.name + "</option>");
         });
         });
         
         */
    });
</script>


@endif
<!-- END REGISTER FESTIVAL PAGE -->

{!! HTML::script('js/libs/angular.js/angular.js'); !!}
{!! HTML::script('js/libs/angular.js/angular-route.js'); !!}
{!! HTML::script('js/libs/angular.js/angular-sanitize.js'); !!}
{!! HTML::script('js/app.js'); !!}
{!! HTML::script('js/libs/ckeditor/ckeditor.js'); !!}



<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        Demo.init(); // init demo(theme settings page)
        QuickSidebar.init(); // init quick sidebar
        //Index.init(); // init index page
        //Tasks.initDashboardWidget(); // init tash dashboard widget
        
    });
</script>

