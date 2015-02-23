<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Imaginamos - Listar Usuarios</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="lib/bootstrap3/css/bootstrap.css">
    <link rel="stylesheet" href="lib/FontAwesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="lib/DataTables-1.9.4/media/js/jquery.dataTables.bootstrap.js"></script>
    <script src="lib/bootstrap3/js/bootstrap.js"></script>


<script type="text/javascript">
    $(function(){
       $('table.data-table.sort').dataTable( {
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "bAutoWidth": false
        });
       $('table.data-table.full').dataTable( {
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            "sDom": '<""f>t<"F"lp>',
            "sPaginationType": "bootstrap"
        });
    });
</script>


<script>
$(document).ready (function () {

	$('.delete').click (function () {

	if (confirm("¿ Confirma eliminar usuario ?")) {
    var id = $(this).attr ("id");
	document.location.href='users/delete/'+id.substr(1);
    }

	}) ;

    $('.edit').click (function () {
        var id = $(this).attr ("id");
        document.location.href='users/update/'+id.substr(1);

    }) ;

}) ;
</script>




    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <!--script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script-->
    <![endif]-->


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

    <div class="navbar-collapse collapse">
        <div id="main-menu">
            <ul class="nav nav-tabs hidden-xs">
                <li ><a href="add_user" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span>Nuevo</span></a></li>
            </ul>
        </div>
    </div>


<div class="col-sm-12">




<div>
    <div class="col-sm-12">

<?php $status=Session::get('status'); ?>
@if($status=='ok_create')
<div class="alert alert-success"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue creado con éxito</div>
@endif
@if($status=='ok_delete')
<div class="alert alert-success fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue eliminado con éxito</div>
@endif
@if($status=='ok_update')
<div class="alert alert-info fade in"><button class="close" data-dismiss="alert" type="button">×</button>
<i class="fa fa-check-square"></i> El usuario fue actualizado con éxito</div>
@endif


        <h2 style="margin-bottom: -1em;">Usuarios</h2>
        <table class="table table-first-column-number data-table display full">
          <thead>
		<tr>
	        <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
			<th>Registrado</th>
            <th>Actualizado</th>
            <th>Acciones</th>
		</tr>
	</thead>
          <tbody>

            <tr>
@if($list_users)
@foreach($list_users as $user)
    <td>{{ $user->name }}</td>
    <td>{{ $user->last_name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->phone }}</td>
    <td>{{ date("d/m/Y",strtotime($user->birthday))  }}</td>
    <td>{{ date("d/m/Y",strtotime($user->created_at)) }}</td>
    <td>{{ date("d/m/Y",strtotime($user->updated_at)) }}</td>
    <td><a href="#" class="edit" id="{{'e'.$user->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        @if($user->id != Auth::user()->id)
            <a href="#" class="delete" id="{{'d'.$user->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        @endif</td></tr>
@endforeach
	</tbody>

</table>
    </div>
</div>
@else
<div class="alert alert-danger fade in">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong>Error</strong>Listado de usuarios vacío.
</div>
@endif


    </div>



    <input id="val" type="hidden" name="user" class="input-block-level" value="" >


  </body>
</html>


