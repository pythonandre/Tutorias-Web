<?php error_reporting(!E_WARNING | !E_NOTICE); ?>
<?php include('login-adminretorno.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<title>Maqueta Tutorías</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style-login.css">
  <style>
		.carousel-item {
 	 	height: 500px;
		}

		.imgcarrousel {
			height: 450px;
			width: 100%;
		}

		.heightcard {
			width: 50%;
			margin-left: 27%;
		}

		.btnsearch {
    	background-color: #FFFFFF;
		}

    .cursitotarjeta {
      width: 50%;
      height: 50%;
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
      <button class="btn btn-outline-success my-2 my-sm-0 btnsearch" name="buscar" id="buscar" value="Buscar cursos" type="submit">Buscar cursos</button>
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
    <!-- FIN NAVBAR -->

<!-- LOGIN --->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Tabs -->
    <div class="fadeIn first">
      <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="login-alumno.php">Entrar como alumno</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login-tutor.php">Entrar como tutor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active actual" aria-current="page" href="login-admin.php" style="color: blue;">Entrar como admin</a>
      </li>
      </ul>
    </div>

    <!-- Login Form -->
    <form action="" method="post">
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="correo">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Entrar" name="submit" id="submit">
    </form>

    <?php echo $welcomeMsg; ?>
    <?php echo $email_exist; ?>
    <?php echo $emptyError2 ?>
    <?php echo $emptyError3 ?>
    <?php echo $wrongPassError3 ?>
    <?php echo $_emailErr ?>
    <?php echo $_passwordErr ?>


  </div>
</div>
<!-- FIN LOGIN -->

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