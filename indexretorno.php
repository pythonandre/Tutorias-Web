<?php
include('database.php');

session_start();
$emilio = $_SESSION['email'];
$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];

$query = "SELECT curso.curso_id, tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion 
FROM CURSO 
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
WHERE curso.curso_es_aprobado = 1";
$result =$mysqli->query($query);

$rowCheck = $connection->query("SELECT curso.curso_id, tutor.tutor_nombre, curso.curso_nombre, curso.curso_thumb, curso.curso_descripcion 
FROM CURSO 
JOIN tutor ON curso.curso_id_tutor=tutor.tutor_id
WHERE curso.curso_es_aprobado = 1");
$rowCount = $rowCheck->fetchColumn();


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
		 $id_curso[$i] = $fila['curso_id'];
		 $nombre_curso[$i] = $fila['curso_nombre'];
		 $nombre_tutor[$i] = $fila['tutor_nombre'];
		 $descripcion_curso[$i] = $fila['curso_descripcion'];
		 $thumb_curso[$i] = $fila['curso_thumb'];
		 $i++;
	}
    
$cursos_max = sizeof($id_curso);

	for ($i=0; $i < $cursos_max ; $i++) { 		
		$html .= '<div class="heightcard card text-center">';
		$html .= '<div class="card text-center">';
		$html .= '<div class="card-header">';
		$html .= "<a>Curso por {$nombre_tutor[$i]} </a>";
		$html .= '</div>';
		$html .= '<div class="card-body">';
		$html .= "<h5 class='card-title'> {$nombre_curso[$i]} </h5>";
		$html .= '<img src="data:image/jpeg;base64,'.base64_encode( $thumb_curso[$i] ).'" height ="250px" width="450px"/>';
		$html .= "<p class='card-text'> {$descripcion_curso[$i]}</p>";
		$html .= '<a href="detallecurso.php?curso_identity=' .$id_curso[$i]. '" class="btn btn-primary">Ver Detalles</a>';
		$html .= '</div>';
		$html .= '<div class="card-footer text-muted text-center">';
        $html .= 'Publicado el 19/10/2021';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<br>';

	}
	

}else{
	$sin_datos = '<h1>No hay ningun curso cargado en la pagina</h1>';
}



?>