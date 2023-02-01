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
      <form action="../index.php?c=auth&a=actualizarPass" method="post" id="form_update">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Restablezca su contraaseña</p>
        <p class="text-danger" id="alerta"></p>
        <div class="form-group row">
          <input type="hidden" name="email" id="email" value="<?php echo $_GET['email'];?>">
          <label for="email" class="col-sm-4 col-form-label">Contraseña</label>
          <div class="col-sm-8">
            <input require type="password" class="form-control" id="pass1" name="pass">
          </div>
        </div> 

        <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">Confirmar contraseña</label>
          <div class="col-sm-8">
            <input require type="password" class="form-control" id="pass2">
          </div>
        </div>              
      </div>   
      <div class="social-auth-links text-center mb-3">
        <button type="submit" class="btn btn-info">Reestablecer</button>
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
  <script>
    document.getElementById("form_update").onsubmit = function() {
    let p1 =  document.getElementById("pass1");
    let p2 =  document.getElementById("pass2");
    if(p1.value == p2.value){
        return true;
    } else {
        alert('Las contraseñas no coinciden');
        return false;
    }
};
  </script>
</body>

</html>