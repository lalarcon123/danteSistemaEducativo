<?php

   require_once('includes/load.php');
   $user = $_SESSION['user_id'];
   $result  = find_by_user('users',$user);  
   foreach ($result as $row): 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DANTE</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <header class="header">
        <a href="#" class="brand">
          <div class = 'img-logo'><img src="images/Logo-UEDA.png" alt="" style="height: 50px;"></div>
          <div class = 'logo'>Unidad Educativa "Dante Alighieri"</div>
        </a>

        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <nav class="navbar">
          <ul>
            <li><a href="#">Administración</a>
              <ul>
                <li><a href="consultausuarios.php">Usuarios</a></li>
                <li><a href="ConsultaPerfiles.php">Perfiles</a></li>
              </ul>
            </li>
            <li><a href="#">Mantenimiento</a>
              <ul>
                <li><a href="ConsultaDocentes.php">Docentes</a></li>
                <li><a href="ConsultaEstudiantesM.php">Estudiantes</a></li>
                <li><a href="ConsultaRepresentantes.php">Representantes</a></li>
                <li><a href="Consultaperiodolectivo.php">Período Lectivo</a></li>
                <li><a href="Consultacursoestudiantil.php">Cursos</a></li>
                <li><a href="Consultaparalelo.php">Paralelos</a></li>
                <li><a href="ConsultaMateria.php">Materias</a></li> 
              </ul>
            </li>
            <li><a href="#">Procesos</a>
              <ul>
                <li><a href="ConsultaAsigEstudiantes.php">Asignación de Estudiantes</a></li>
                <li><a href="#">Opción 2</a></li>
                <li><a href="#">Opción 3</a></li>
              </ul>
            </li>
            <li><a href="#">Reportes</a>
              <ul>
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
                <li><a href="#">Opción 3</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['nombres']; ?><i class="fas fa-user fa-fw"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                      <!--<a class="dropdown-item" href="#">Configuracion</a>-->
                      <!--<a class="dropdown-item" href="#">Activity Log</a>-->
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php">Salir</a>
                  </div>
            </li>
          </ul>
        </nav>
    </header>
  <?php endforeach; ?>