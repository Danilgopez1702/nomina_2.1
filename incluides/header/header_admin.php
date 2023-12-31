<?php
session_start();
if (empty($_SESSION['active'])) {
	header('location: ../../');
  }
//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

  //Tiempo en segundos para dar vida a la sesión.
  $inactivo = 600;//10min en este caso.

  //Calculamos tiempo de vida inactivo.
  $vida_session = time() - $_SESSION['tiempo'];

      //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
      if($vida_session > $inactivo)
      {
          //Removemos sesión.
          session_unset();
          //Destruimos sesión.
          session_destroy();              
          //Redirigimos pagina.
          header("Location: ../../index.php");

          exit();
      } else {  // si no ha caducado la sesion, actualizamos
          $_SESSION['tiempo'] = time();
      }


} else {
  //Activamos sesion tiempo.
  $_SESSION['tiempo'] = time();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DigitalNet Nominas</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- Nav principal -->
      <nav class="sidebar sidebar-offcanvas fixed-top-amburguesa" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.php"><h3 style = "color:white;">Nominas</h3></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><h3 style = "color:white;">DG</h3></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile" style="background-color: #7a9fb2;">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h4 class="mb-0 font-weight-normal"><?php	echo $_SESSION['nombre']; ?></h4>
                  
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navegacion</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer text-success"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/usuarios.php">
              <span class="menu-icon">
                <i class="mdi mdi-account text-success "></i>
              </span>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-account-box-outline text-success"></i>
              </span>
              <span class="menu-title">Empleados</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item menu-items"> <a class="nav-item" href="../admin/empleados_activos.php"> Empleados Activos </a></li>
                <li class="nav-item menu-items"> <a class="nav-item" href="../admin/empleados_inactivos.php"> Empleados Inactivos </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/departamentos.php">
              <span class="menu-icon">
                <i class="mdi mdi-hospital-building text-success"></i>
              </span>
              <span class="menu-title">Departamentos</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/guardia.php">
              <span class="menu-icon">
                <i class="mdi mdi-security text-success"></i>
              </span>
              <span class="menu-title">Guardias</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/nomina.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar text-success"></i>
              </span>
              <span class="menu-title">Generar Nomina</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../admin/historico.php">
              <span class="menu-icon">
                <i class="mdi mdi-history text-success"></i>
              </span>
              <span class="menu-title">Historial de nomina</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- Nav superior -->
      
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu " style = "color:white;"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php	echo $_SESSION['nombre']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Perfil</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../header/salir.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <div class="container-fluid page-body "style="background: #FFFFFF; margin-left: 244px;">
        <!-- partial -->
        <div class="main-panel"   >  
            