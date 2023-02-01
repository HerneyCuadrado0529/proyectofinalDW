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
                  <h3 class="card-title">ACTAS</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <input type="hidden" name="id" id="id" value="0">
                  <div class="form-group row">
                    <label for="asunto" class="col-sm-2 col-form-label">Asunto</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="asunto">
                    </div>
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha creacion</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="fecha" value="<?php echo date('Y-m-d'); ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="responsable" class="col-sm-2 col-form-label">Responsable</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="responsable" id="responsable">

                      </select>
                    </div>
                    <label for="hi" class="col-sm-2 col-form-label">Hora inicio</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control" id="hi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hf" class="col-sm-2 col-form-label">Hora fin</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control" id="hf">
                    </div>
                    <label for="orden" class="col-sm-2 col-form-label">Orden</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="orden">
                    </div>

                  </div>
                  <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="descripcion"> </textarea>
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
                          <th>ID</th>
                          <th>Asunto</th>
                          <th>Creacion</th>
                          <th>Horas</th>
                          <th>Orden</th>
                          <th>Descripcion</th>
                        </tr>
                      </thead>
                      <tbody id="cuerpo_tabla_actas">

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


  <div class="modal fade" id="modal_acta">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Informacion del acta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">CABECERA DEL ACTA</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <dl>
                    <dt>ASUNTO</dt>
                    <dd id="d_asunto"></dd>
                    <dt>CREADOR</dt>
                    <dd id="d_creador"></dd>
                    <dt>DREADA</dt>
                    <dd id="d_creada"></dd>
                  </dl>

                </div>
                <div class="col-md-6">
                  <dl>
                    <dt>HORAS</dt>
                    <dd id="d_horas">`</dd>
                    <dt>ORDEN</dt>
                    <dd id="d_orden">`</dd>
                    <dt>DESCRIPCION</dt>
                    <dd id="d_descripcion">`</dd>
                  </dl>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">COMPROMISOS DEL ACTA</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 150px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Responsable</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Descripcion</th>
                  </tr>
                </thead>
                <tbody id="cuerpo_tabla_compromisos">

                </tbody>
              </table>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ASISTENTES DEL ACTA</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 150px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ASISTENTE</th>
                  </tr>
                </thead>
                <tbody id="cuerpo_tabla_asistente">

                </tbody>
              </table>
            </div>
          </div>

        </div>        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
  <script src="../js/actas.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>