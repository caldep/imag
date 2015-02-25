<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Imaginamos - Editar Usuario</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="lib/bootstrap3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">

    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.bootstrap.js"></script>
    <script src="lib/bootstrap3/js/bootstrap.js"></script>
    <link rel="stylesheet" href="lib/datepicker/css/datepicker.css">


    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>

    <![endif]-->

    <script>
        /*
         jQuery.extend( jQuery.fn.pickadate.defaults, {

         });
         */
        $(document).ready(function() {

            $('#calendar').datepicker({
                monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo',
                    'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],   // Array of full month names, like 'January' ...
                monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May',
                    'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],  // Array of short month names, like 'Jan', 'Feb' ...
                today:{{ date("d/m/Y",strtotime(Session::get('birthday'))) }},
                firstDay: 1,       // First day of the week
                format: 'dd-mm-yyyy',        // Default format of the displayed value
                formatSubmit: 'yyyy-mm-dd'   // Default format of the submitted value
            });

        } );

    </script>

</head>

<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
<!--<![endif]-->

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-reorder"></span>
        </button>
        <a class="navbar-brand" href="#">Imaginamos</a>
    </div>

    <div class="hidden-xs">
        <ul class="nav navbar-nav pull-right">
            <li id="fat-menu" class="dropdown">
                <a href="logout" role="button">
                            <span class="glyphicon glyphicon-off" aria-hidden="true">
                </a>
            </li>
        </ul>
    </div><!--/.navbar-collapse -->
</div>

<div id="sidebar-nav" class="hidden-xs">

    <ul id="dashboard-menu" class="nav nav-list">
        <a href="edit_img">
            @if(is_null(Session::get('path_name')))
                <img src="uploads/avatars/sin_imagen.jpg" height="200" width="200" title="Pulse para cambiar imágen"/>
            @else
                <img src="uploads/avatars/{{Session::get('path_name')}}" height="200" width="200" title="Pulse para cambiar imágen"/>
            @endif

        </a>
</ul>
        </div>
<div class="content">


    <form role="form" action="users/update" method="post" id="formEdit">
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="name_edit" value="{{ Session::get('name') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Apellido</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Apellido" name="last_name_edit" value="{{ Session::get('last_name') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Correo Electrónico" name="email_edit" value="{{ Session::get('email') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Teléfono</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Número Telefónico" name="phone_edit" value="{{ Session::get('phone') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Fecha de Nacimiento</label>
            <input type="text" class="form-control datepicker" id="calendar" placeholder="Fecha de Cumpleaños" name="birthday_edit" value="{{ date("d/m/Y",strtotime(Session::get('birthday'))) }}">
        </div>

        <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">

        <div class="modal-footer">
            <a href="ls_users"><button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button></a>
            <button type="submit" class="btn btn-inverse">Guardar</button>
    </form>
</div>




</div>



<input id="val" type="hidden" name="user" class="input-block-level" value="" >

</body>
</html>


