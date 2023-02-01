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
                  <h3 class="card-title">ASISTENTES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <input type="hidden" name="id" id="id" value="0">
                  <div class="form-group row">
                    <label for="acta" class="col-sm-2 col-form-label">Acta</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="acta" id="acta">
                      </select>
                    </div>
                    <label for="asistente" class="col-sm-2 col-form-label">Asistente</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="asistente" id="asistente">
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
                  <div class="card-body table-responsive p-0" style="height: 250px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>ACTA</th>
                          <th>ASISTENTE</th>                         
                          <th>Accion</th>
                        </tr>
                      </thead>
                      <tbody id="cuerpo_tabla_asistente">

                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
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
  <script src="../js/asistente.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>