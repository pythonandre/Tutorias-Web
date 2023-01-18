<?php
//error_reporting(!E_WARNING | !E_NOTICE);
include('database.php');

session_start();
$emilio = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];

$query = "SELECT curso.curso_id, tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion 
FROM CURSO 
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
WHERE curso.curso_es_aprobado = 0";
$result =$mysqli->query($query);

$rowCheck = $connection->query("SELECT curso.curso_id, tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion 
FROM CURSO 
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
WHERE curso.curso_es_aprobado = 0");
$rowCount = $rowCheck->fetchColumn();

if($_POST['accion']=='Autorizar'){
	$sql = $connection->query("UPDATE CURSO set curso_es_aprobado = 1 where curso_id = '".$_POST['idcurso']."'");
	header("Location: peticioncurso.php");
}elseif($_POST['accion']=='Denegar'){
	$sql = $connection->query("DELETE FROM CLASE where clase_curso_id = '".$_POST['idcurso']."'");
	$sql2 = $connection->query("DELETE FROM CURSO where curso_id = '".$_POST['idcurso']."'");
	header("Location: peticioncurso.php");
}

$row = $result->fetch_array(MYSQLI_NUM);
$html = "";

if($rowCount > 0){

$id_curso = array();
$nombre_tutor = array();
$nombre_curso = array();
$descripcion_curso = array();
$thumb_curso = array();

$i = 0;
	foreach ($result as $fila) {
		 //$fila['curso_id'];
		 $id_curso[$i] = $fila['curso_id'];
		 $nombre_curso[$i] = $fila['curso_nombre'];
		 $nombre_tutor[$i] = $fila['tutor_nombre'];
		 $descripcion_curso[$i] = $fila['curso_descripcion'];
		 $thumb_curso[$i] = $fila['curso_thumb'];
		 $i++;
	}	

$cursos_max = sizeof($id_curso);

	for ($i=0; $i < $cursos_max ; $i++) { 		
		$html .= '<div class="col-md-4 mt-3">';
		$html .= '<div class="card text-center border-info">';
		$html .= '<div class="card-header text-center">';
		$html .= "<a>Curso por {$nombre_tutor[$i]} </a> ";
		$html .= '</div>';
		$html .= '<div class="card-body text-center">';
		$html .= "<h5 class='card-title'> {$nombre_curso[$i]} </h5>";
		$html .= '<img src="data:image/jpeg;base64,'.base64_encode( $thumb_curso[$i] ).'" height ="150px" width="300px"/>';
		$html .= "<p class='card-text'> {$descripcion_curso[$i]}</p>";
		$html .= '<a href="detallecurso.php?curso_identity='.$id_curso[$i].'" class="btn btn-primary">Revisar Clase</a>';
		$html .= '</div>';
		$html .= '<div class="card-footer text-center">';
		$html .= '<form action="peticioncursoretorno.php" method="POST">';
		$html .= '<input value="'. $id_curso[$i] .'" type="hidden" name="idcurso">';
		$html .= '<input type="submit" class="btn btn-success" value="Autorizar"  name="accion"  style="margin:10px;">';		
		$html .= '<input type="submit" class="btn btn-danger" value="Denegar"  name="accion">';
		$html .= '</form>';		
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<br>';

	}
	

}else{
	$sin_datos = '<h1>No tiene ninguna peticion de cursos</h1>';
}



?>