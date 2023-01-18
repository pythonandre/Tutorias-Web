    <?php
    error_reporting(!E_WARNING | !E_NOTICE);
        // Database connection
    include('database.php');
    session_start();
        $curso_seleccionado = $_GET['seleccion_id'];
        $cantidad_clase = $_POST['clasesporcurso'];
        $cantidad_clases = (int)$cantidad_clase;
        // Error & success messages
        if(isset($_POST["submit"])) {
        $clase_titulo  = $_POST["title"];
        $clase_descripcion  = $_POST["description"];
        $clase_video = $_POST["file"];

            // PHP validation
            //if(!empty($clase_titulo[0]) && !empty($clase_descripcion[0]) && !empty($clase_video[0])){

            $nameCheck = $connection->query( "SELECT * FROM CLASE WHERE clase_nombre = '{$clase_titulo}' ");
            $rowCount = $nameCheck->fetchColumn();

            if($rowCount > 0) {
                $name_exist = '
                <div class="alert alert-danger" role="alert">
                El nombre ya está en uso!
                </div>
                ';
            } else {

                $_name = mysqli_real_escape_string($connection2, $clase_titulo[0]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[0]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[0]);
                $_name = mysqli_real_escape_string($connection2, $clase_titulo[1]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[1]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[1]);
                $_name = mysqli_real_escape_string($connection2, $clase_titulo[2]);
                $_descripcion = mysqli_real_escape_string($connection2, $clase_descripcion[2]);
                $_thumbnail = mysqli_real_escape_string($connection2, $clase_video[2]);


                    if($cantidad_clases == "contador" || $cantidad_clases == 0){
                        $emptyError3 = "Es necesario que agregues una clase";
                    }   if($cantidad_clases == 1){
                        //$sqlc1 = $connection2->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$curso_seleccionado}')");
                        //TESTING QUERY
                        $sql = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$curso_seleccionado}')";
                        if (mysqli_query($conn, $sql)) {
                            echo "Clases agregadas exitosamente";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                            mysqli_close($conn);
                        //END TESTING QUERY
                    }

                    //if(!$sqlc1){
                    //    die("Falló la consulta MySQL para una clase!" . mysqli_error($connection2) . "{$curso_seleccionado}" . "es la id");  
                    //}           
                    else {
                        $success_msg = '<div class="alert alert-success">
                        ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias desi él!
                        </div>';
                    }


                    if($cantidad_clases == 2){
                        $sqlc2 = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$curso_seleccionado}');";
                        $sqlc22 = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[1]}', '{$clase_descripcion[1]}', '{$clase_video[1]}', '{$curso_seleccionado}')";
                    
                    if (mysqli_query($conn, $sqlc2) && mysqli_query($conn, $sqlc22)) {
                            echo "Clases agregadas exitosamente";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                            mysqli_close($conn);
                    //if(!$sqlc2){
                    //    die("Falló la consulta MySQL para dos clases!" . mysqli_error($connection2));
                    //}           
                    } else {
                        $success_msg = '<div class="alert alert-success">
                        ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                        </div>';
                    }
                    

                    if($cantidad_clases == 3){
                    // $sqlc3 = $connection2->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$$curso_seleccionado}')");
                     //$sqlc3.= $connection2->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[1]}', '{$clase_descripcion[1]}', '{$clase_video[1]}', '{$curso_seleccionado}')");
                     //$sqlc3.= $connection2->query("INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[2]}', '{$clase_descripcion[2]}', '{$clase_video[2]}', '{$curso_seleccionado}')");
                    //}

                    //TESTING QUERY
                        $sqlc3 = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[0]}', '{$clase_descripcion[0]}', '{$clase_video[0]}', '{$curso_seleccionado}');";
                        $sqlc32 = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[1]}', '{$clase_descripcion[1]}', '{$clase_video[1]}', '{$curso_seleccionado}');";
                        $sqlc33 = "INSERT INTO clase (clase_nombre, clase_descripcion, clase_video, clase_curso_id) VALUES ('{$clase_titulo[2]}', '{$clase_descripcion[2]}', '{$clase_video[2]}', '{$curso_seleccionado}')";
                         if (mysqli_query($conn, $sqlc3) && mysqli_query($conn, $sqlc32) && mysqli_query($conn, $sqlc33)) {
                            echo "Clases agregadas exitosamente";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                            mysqli_close($conn);

                    //if(!$sqlc3){
                    //die("Falló la consulta MySQL para tres clases!" . mysqli_error($connection2));
                    } else {
                    $success_msg = '<div class="alert alert-success">
                    ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                    </div>';
                    }
            }          
            } else {       
                if(empty($clase_titulo[1]) || $clase_titulo[2]){
                $emptyError1 = '<div class="alert alert-danger">
                Es necesario que ingreses un título.
                </div>';
                } 
                if(empty($clase_descripcion[1]) || ($clase_descripcion[2])){
                $emptyError2 = '<div class="alert alert-danger">
                Es necesario que ingreses una descripción.
                </div>';
                 }
                if(empty($clase_video[1]) || ($clase_video[2])){
                $emptyError4 = '<div class="alert alert-danger">
                Es necesario que ingreses un video.
                </div>';
            }
        }
?>