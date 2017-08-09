<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user4-128x128" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Administrador</p>
                <a href="#"><i class="fa fa-circle text-success"></i> linea </a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Navegando...</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-building"></i> <span>DatosEmpresa</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>

                <ul class="treeview-menu">
                    <li><a href="../Administrador/CreateDatosEmpresa.php"><i class="fa fa-circle-o"></i>Registrar</a></li>
                    <li><a href="../Administrador/GestionarDatos.php"><i class="fa fa-circle-o"></i>Ver Registros</a></li>


                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-pencil-square-o"></i> <span>Registrar empleado</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../Administrador/CreateRegistroemp.php"><i class="fa fa-circle-o"></i>Crear</a></li>
                    <li><a href="../Administrador/gestionarRecepcion.php"><i class="fa fa-circle-o"></i>Ver</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-pencil-square-o"></i> <span>Habitaciones</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../Administrador/CreateHabitaciones.php"><i class="fa fa-circle-o"></i>Registrar</a></li>
                    <li><a href="../Administrador/GestionarHabitacion.php"><i class="fa fa-circle-o"></i>registros</a></li>
                    <li><a href="../Administrador/HabitacionesDispo.php"><i class="fa fa-circle-o"></i>ver Disponibles</a></li>



                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-fw fa-search"></i> <span>Facturas </span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../Administrador/Administrar.php"><i class="fa fa-circle-o"></i> ver</a></li>

                </ul>
            </li>
        </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>