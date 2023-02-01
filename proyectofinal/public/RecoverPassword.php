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
      <form action="../index.php?c=auth&a=cambioContraseña" method="POST">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Ingrese su correo para el cambio de contraseña</p>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Usuario</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="email">
            </div>
          </div>
        </div>
        <div class="social-auth-links text-center mb-3">
          <button type="submit" id="enviar" class="btn btn-info">Enviar</button>
        </div>
      </form>
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