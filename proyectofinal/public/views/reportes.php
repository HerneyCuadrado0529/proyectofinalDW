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
            <div class="col-md-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">REPORTES</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group row">
                    <label for="acta" class="col-sm-1 col-form-label">Informe</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="informe" id="informe">
                        <option value="">--seleccionar--</option>
                        <option value="f">Por fecha</option>
                        <option value="cp">Compromisos pendiente</option>
                        <option value="au">Actas creadas por usuario</option>
                        <option value="ba">Búsqueda por código de acta</option>
                        <option value="bna">Buscar por nombre asunto</option>
                      </select>
                    </div>
                  </div>
                  <div id="div_reporte_actas_fechas" hidden>
                    <div class="form-group row">
                      <label for="fecha_i" class="col-sm-2 col-form-label">Fecha inicial</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="fecha_i" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <label for="fecha_f" class="col-sm-2 col-form-label">Fecha final</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="fecha_f" value="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-success" id="reporte_fecha">
                          Generar
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 250px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
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

                  <div id="div_reporte_compromisos" hidden>
                    <div class="form-group row">
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-success" id="reporte_cp">
                          Generar
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 250px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>Asunto</th>
                            <th>Creacion</th>
                            <th>Horas</th>
                            <th>Orden</th>
                            <th>Descripcion</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_actas_cp">

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div id="div_reporte_actas_usuarios" hidden>
                    <div class="form-group row">
                      <label for="responsable" class="col-sm-1 col-form-label">Usuario</label>
                      <div class="col-sm-4">
                        <select class="form-control" name="usuario" id="usuario">
                        </select>
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-success" id="reporte_au">
                          Generar
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 250px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>Asunto</th>
                            <th>Creacion</th>
                            <th>Horas</th>
                            <th>Orden</th>
                            <th>Descripcion</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_actas_au">

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div id="div_reporte_actas_busque_acta" hidden>
                    <div class="form-group row">
                      <label for="responsable" class="col-sm-1 col-form-label">Codigo</label>
                      <div class="col-sm-4">
                      <input type="number" class="form-control" id="codigo" >
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-success" id="reporte_ba">
                          Buscar
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 250px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>Asunto</th>
                            <th>Creacion</th>
                            <th>Horas</th>
                            <th>Orden</th>
                            <th>Descripcion</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_actas_ba">

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div id="div_reporte_actas_busque_asunto" hidden>
                    <div class="form-group row">
                      <label for="asunto" class="col-sm-1 col-form-label">Asunto</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" id="asunto" >
                      </div>
                      <div class="col-sm-1">
                        <button type="button" class="btn btn-success" id="reporte_a">
                          Buscar
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" style="height: 250px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>Asunto</th>
                            <th>Creacion</th>
                            <th>Horas</th>
                            <th>Orden</th>
                            <th>Descripcion</th>
                          </tr>
                        </thead>
                        <tbody id="cuerpo_tabla_actas_a">

                        </tbody>
                      </table>
                    </div>
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
  <script src="../js/resportes.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>