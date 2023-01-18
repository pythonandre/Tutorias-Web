<?php include('registroalumnoretorno.php'); ?>
<?php error_reporting(!E_WARNING | !E_NOTICE); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Maqueta Tutorías</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		.btnsearch {
    	background-color: #FFFFFF;
		}
</style>
</head>
<body>
	<!-- Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- NAVBBAR -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">LosK-Tutos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form action="buscar_curso.php" class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control ml-sm-2" type="text" name="busqueda" placeholder="Buscar">
      <input class="btn btn-outline-success my-2 my-sm-0 btnsearch" name="buscar" value="Buscar cursos" type="submit">
    </form>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tu Cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registroalumno.php">Aún no tienes cuenta, ¡Regístrate aquí!</a>
          <a class="dropdown-item" href="registrotutor.php">¿Quieres hacer clases? ¡Regístrate como tutor!</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="login-alumno.php">Iniciar sesión</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="formulariocontacto.php">Contacto</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="quienessomos.php">¿Quiénes Somos?</a>
      </li>
    </ul>
  </div>
</nav>
<!-- titulo -->
<br>
<h1 style="text-align: center">Formulario de Registro de Alumno</h1>
&nbsp;&nbsp;&nbsp;
<!-- fin titulo -->

            <?php echo $success_msg; ?>
            <?php echo $email_exist; ?>

<!-- Formulario -->
<div class="d-flex justify-content-center">
<form action="" method="post">  
    <div class="form-group">
    <label for="InputName">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Ingresa tu nombre">
    <?php echo $emptyError1; ?>
    <?php echo $_nameErr; ?>
  </div>
  <div class="form-group">
    <label for="InputEmail">Dirección de correo electrónico</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu e-mail">
    <small class="form-text text-muted">No te enviaremos spam.</small>
    <?php echo $emptyError2; ?>
    <?php echo $_emailErr; ?>
  </div>
  <div class="form-group">
    <label for="InputPassword">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu Contraseña">
    <small class="form-text text-muted">No se la mostraremos a nadie.</small>
       <?php echo $emptyError3; ?>
      <?php echo $_passwordErr; ?>
  </div>
   <div class="form-group">
    <label for="InputPassword">Confirmar contraseña</label>
    <input type="password" class="form-control" id="password2"  name="password2" placeholder="Ingresa tu Contraseña">
    <small class="form-text text-muted">Ambas contaseñas deben coincidir.</small>
    <?php echo $emptyError4; ?>
    <?php echo $unmatchedPassword; ?>
  </div>
  <!-- file upload -->
  <h4>Ingresa tu certificado de alumno regular</h4>
  <div class="custom-file form-group">
    <input type="file" class="custom-file-input" id="certificado" name="certificado">
    <label class="custom-file-label" for="customFile">Elige tu certificado</label>
    <?php echo $emptyError6; ?>
  </div>
  &nbsp;
  
<p>Selecciona tu nivel de estudios:</p>

<div class = "form-group">
  <input type="radio" id="primero" name="seleccionAnio" value="primero"
         checked>
  <label for="huey">Soy alumno de primer año de una carrera asociada a la programación</label>
</div>

<div class = "form-group">
  <input type="radio" id="media" name="seleccionAnio" value="media">
  <label for="dewey">Soy alumno de enseñanza media</label>
</div>

<div class = "form-group">
  <input type="radio" id="avanzado" name="seleccionAnio" value="otro" onclick="alertarAvanzado()">
  <label for="louie">Soy un alumno de curso avanzado</label>
</div>
<?php echo $emptyError5; ?>
&nbsp;



<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").php(fileName);
});
</script>

<!-- fin file upload -->
<br><br>
  <button type="submit" id="submit" name="submit" class="btn btn-primary">Registrarse</button>
</form>
 <script type="text/javascript">
  function alertarAvanzado(){
      alert("Si encuentras nuestros cursos muy fáciles, ¡Recuerda que están hechos para alumnos de primer año!");
  }
  </script>
</div>
<br>

<!-- Fin Formulario -->


  <!-- Footer -->
  <section class="">
  <footer class="text-center text-white" style="background-color: #0275d8;">
    <div class="container p-4 pb-0">
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3">¿Quieres hacer clases? ¡Regístrate como tutor! &nbsp;</span>
          <button type="button" class="btn btn-outline-success my-2 my-sm-0 btnsearch">
            <a href="registrotutor.php">
            Registrarse
            </a>
          </button>
        </p>
      </section>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2021 Copyright:
      <a class="text-white">LosKTutos.com</a>
    </div>
  </footer>
</section>
  <!-- Fin Footer -->
</body>
</html>