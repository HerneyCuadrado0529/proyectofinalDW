<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desarrollo Web</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include('inc/navbar.php') ?>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Desarrollo Web</span>
      </a>
      <!-- Sidebar -->
      <?php include('inc/sidebar.php') ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">USUARIOS</h3>
                </div>
                <div class="card-body">
                  <input type="hidden" name="id" id="id" value="0">
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="nombre" placeholder="Nombre de usuario">
                    </div>
                    <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="apellido" placeholder="Apellido del usuario">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Tipo Id</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="tipo_id" id="tipo_id">
                        <option value="1">CC</option>
                        <option value="2">TI</option>
                        <option value="3">PP</option>
                        <option value="4">RC</option>
                      </select>
                    </div>
                    <label for="apellido" class="col-sm-2 col-form-label">Identificacion</label>
                    <div class="col-sm-4">
                      <input type="number" class="form-control" id="identificacion" placeholder="Identificacion del usuario">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-4">
                      <input require type="email" class="form-control" id="usuario" placeholder="Email">
                    </div>
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo usuario</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="tipo" id="tipo">
                        <option value="A">Administrador</option>
                        <option value="I">Informes</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-1">
                      <button type="button" class="btn btn-success" id="guardar">
                        Guardar
                      </button>
                    </div>
                  </div>

                  <div class="card-body table-responsive p-0" style="height: 240px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Usuario</th>
                          <th>Tipo id</th>
                          <th>Identificacion</th>
                          <th>Tipo</th>
                          <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody id="cuerpo_tabla_usuarios">
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div><!-- /.container-fluid -->
      </section>
    </div>
    <?php include('inc/footer.php') ?>
  </div>

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- SCRIPTS -->
  <script src="../js/usuarios.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>