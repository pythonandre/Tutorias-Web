<?php
error_reporting(!E_WARNING | !E_NOTICE);

$alumno = "alumno";
$tutor = "tutor";
$administrador = "administrador";

session_start();

if (session_status() == PHP_SESSION_ACTIVE && $_SESSION['sessiontype'] == $alumno) {
    $login_register_option = '<a class="dropdown-item" href="panelalumno.php">Ingresa al panel de alumno.</a>
     <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Terminar sesión</a>';
} elseif (session_status() == PHP_SESSION_ACTIVE && $_SESSION['sessiontype'] == $tutor) {
    $login_register_option = '<a class="dropdown-item" href="paneltutor.php">Ingresa al panel de tutorías.</a>
     <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Terminar sesión</a>';
} elseif (session_status() == PHP_SESSION_ACTIVE && $_SESSION['sessiontype'] == $administrador) {
    $login_register_option = '<a class="dropdown-item" href="paneladmin.php">Ingresa al panel de Admin.</a>
     <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Terminar sesión</a>';
} else {
    $login_register_option = '<a class="dropdown-item" href="registroalumno.php">Aún no tienes cuenta, ¡Regístrate aquí!</a>
          <a class="dropdown-item" href="registrotutor.php">¿Quieres hacer clases? ¡Regístrate como tutor!</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login-alumno.php">Iniciar sesión</a>';
}

?>
