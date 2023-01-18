<?php
include('database.php');
$idalumno = $_POST['idalumno'];
$idcurso = $_POST['idcurso'];

if(!empty($idalumno) && !empty($idcurso)){
	 $sql = $connection->query("INSERT INTO historial_compra (alumno_id, curso_id, fecha_de_compra) VALUES ('{$idalumno}', '{$idcurso}', '2021-11-19')");
            
                if(!$sql){
                    die("Falló la consulta MySQL!" . mysqli_error($connection));
                } else {
                    $success_msg = '<div class="alert alert-success">
                        Curso comprado exitosamente!
                </div>';
                }
}
?>