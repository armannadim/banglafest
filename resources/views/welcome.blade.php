<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="//cdn.datatables.net/1.10.6/css/jquery.dataTables.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js" ></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>        
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                margin: auto;
                vertical-align: middle;
                width: 90%;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 3em;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $.getJSON("http://localhost:9090/banglafest/logs", function(json) {
                    $('#log').dataTable({
                        sDom: '<"top"if>rt<"bottom"lp><"clear">',
                        //ajax: "http://localhost:9090/banglafest/logs",
                        aaData: json,
                        aoColumns: [
                            {mDataProp: "id", sortable: false},
                            {mDataProp: "activity"},
                            {mDataProp: "user"},
                            {mDataProp: "created_at.date"}
                        ]
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Activity log</div>

            </div>
            <table id="log" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Activity</th>
                        <th>User</th>
                        <th>Date</th>
                    </tr>
                </thead>

            </table>
        </div>
    </body>
</html>