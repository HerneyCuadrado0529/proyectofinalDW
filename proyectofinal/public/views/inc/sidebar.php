<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php if ($_SESSION['rol'] == "A") { ?>
                <li class="nav-item">
                    <a href="usuarios.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>USUARIOS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="actas.php" class="nav-link">
                        <i class="fas fa-book-open"></i>
                        <p>ACTAS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="compromisos.php" class="nav-link">
                        <i class="fas fa-check"></i>
                        <p>COMPROMISOS</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="asistentes.php" class="nav-link">
                        <i class="fas fa-people-arrows"></i>
                        <p>ASISTENTES</p>
                    </a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="reportes.php" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>REPORTES</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="../index.php?c=auth&a=logout" class="nav-link">
                    <i class="fas fa-clipboard-list"></i>
                    <p>SALIR</p>
                </a>
            </li>           

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>