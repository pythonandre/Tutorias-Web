<?php
include('database.php');

session_start();
$emilio = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];

$query = "SELECT * FROM HISTORIAL_COMPRA WHERE ALUMNO_ID ='{$id}'";
$result =$mysqli->query($query);

$rowCheck = $connection->query("SELECT * FROM HISTORIAL_COMPRA WHERE ALUMNO_ID = '{$id}' ");
$rowCount = $rowCheck->fetchColumn();

$row = $result->fetch_array(MYSQLI_NUM);
$j = 0;
if($rowCount > 0){

	foreach ($result as $fila) {
		$id_curso[$j] =  $fila['curso_id'];
		$j++;
	}

} else {
	$sin_curso = '<h1>Usted no ha comprado ningun curso</h1>
	<a href="index.php" class="btn btn-primary">Ver cursos</a><br><br>';
}

$query2 = "SELECT tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion, historial_compra.fecha_de_compra 
FROM historial_compra 
JOIN curso ON curso.curso_id=historial_compra.curso_id
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
AND historial_compra.alumno_id='{$id}'";
$result2 =$mysqli->query($query2);

$rowCheck2 = $connection->query("SELECT tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion, historial_compra.fecha_de_compra 
FROM historial_compra 
JOIN curso ON curso.curso_id=historial_compra.curso_id
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
AND historial_compra.alumno_id='{$id}'");

$rowCount2 = $rowCheck2->fetchColumn();

$row2 = $result2->fetch_array(MYSQLI_NUM);

if($rowCount2 > 0){
	$nombre_tutor = array();
	$nombre_curso = array();
	$imagen = array();
	$descripcion = array();
	$fechac = array();
	$curso_id = array();
	$i = 0;
	foreach ($result2 as $fila2) {
		$curso_id[$i] = $fila2['curso_id'];
		$nombre_tutor[$i] = $fila2['tutor_nombre'];
		$nombre_curso[$i] = $fila2['curso_nombre'];
		$imagen[$i] = $fila2['curso_thumb'];
		$descripcion[$i] = $fila2['curso_descripcion'];
		$fechac[$i] = $fila2['fecha_de_compra'];
		$i++;	
	}
	$curso_max = sizeof($curso_id);
	$html = "";
	for	($i=0; $i < $curso_max; $i++){
		$html .= '<div class="col-md-4 mt-3">';
		$html .= '<div class="card text-center border-info">';
		$html .= '<div class="card-header text-center">';
		$html .= "<a>Curso por {$nombre_tutor[$i]} </a> ";
		$html .= '</div>';
		$html .= '<div class="card-body text-center">';
		$html .= "<h5 class='card-title'> {$nombre_curso[$i]} </h5>";
		$html .= '<img src="data:image/jpeg;base64,'.base64_encode( $imagen[$i] ).'" height ="150px" width="300px"/>';
		$html .= "<p class='card-text'> {$descripcion[$i]}</p>";
		$html .= '<a href="detallecurso.php?curso_identity=' .$id_curso[$i]. '" class="btn btn-primary">Entrar</a>';
		$html .= '</div>';
		$html .= '<div class="card-footer text-muted text-center">';
		$html .= "<a>Fecha de compra: {$fechac[$i]}</a>";
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<br>';

	}
	     
}
?>