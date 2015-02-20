<!DOCTYPE html>
<html lang="es">
  <head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Imaginamos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('includes.styles')
    <?php echo HTML::style('css/login.css'); ?>
  </head>
  <body>
    <div id="container">
      <div id="logo"> <!--img src="{{ asset('img/logo.png') }}" alt=""--> </div>
      <div id="loginbox">
        <form id="loginform" action="index.html">
          <p>Introduzca datos de autenticación.</p>
          <div class="input-group input-sm"> <span class="input-group-addon"><i
                class="fa fa-user"></i></span><input class="form-control" id="username"
              placeholder="Email" type="text"> </div>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span><input
              class="form-control" id="password" placeholder="Contraseña" type="password">
          </div>
          <div class="form-actions clearfix"> <input class="btn btn-block btn-primary btn-default"
              value="Acceder" type="submit"> </div>
          <div class="footer-login">
            <div class="pull-left text"></div>
          </div>
        </form>
      </div>
    </div>
    <?php echo HTML::script('js/jquery.js'); ?>
    <?php echo HTML::script('js/jquery-ui.js'); ?>
    <?php echo HTML::script('js/login.js'); ?>
    </body>
</html>
