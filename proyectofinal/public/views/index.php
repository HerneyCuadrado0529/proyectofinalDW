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
    </aside>

    <div class="content-wrapper pt-5">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10 offset-1">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Bienvenido!</h3>
                </div>
                <div class="card-body">
                  <div class="callout callout-info">
                    <h5>Hola, <?php echo $_SESSION['nombre'] ?></h5>
                    <p>Su rol en el sistema es <?php echo $_SESSION['rol'] == "A" ? "ADMINISTRADOR" : "INFORMES" ?>.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include('inc/footer.php') ?>
  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script src="../dist/js/adminlte.min.js"></script>

  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>