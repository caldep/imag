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
        <form action="login" method="post">
            @if(Session::has('login_errors'))
                <p style="color:#FB1D1D">Email o contraseña incorrecta.</p>
            @else
                <p>Introduzca datos de autenticación.</p>
            @endif

          <div class="input-group input-sm"> <span class="input-group-addon"><i
                class="fa fa-user"></i></span><input class="form-control" id="username"
              placeholder="Email" type="email" name="username"> </div>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span><input
              class="form-control" id="password" placeholder="Contraseña" type="password" name="password">
          </div>
          <div class="form-actions clearfix"> <input class="btn btn-block btn-primary btn-default"
              value="Acceder" type="submit" id="acceder" name="acceder"> </div>
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
