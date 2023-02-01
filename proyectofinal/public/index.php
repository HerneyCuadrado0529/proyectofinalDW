<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <p class="text-danger" id="alerta"></p>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label">Usuario</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="user">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-3 col-form-label">Clave</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="pass">
          </div>
        </div>
      </div>
      <div class="social-auth-links text-center mb-3">
        <button id="login" class="btn btn-info">Entrar</button>
        <p class="m-2 float-left">
          <a href="RecoverPassword.php">Olvidé mi contraseña</a>
        </p>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <script src="js/login.js"></script>
</body>

</html>