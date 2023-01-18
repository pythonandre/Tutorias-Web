<?php
    error_reporting(!E_WARNING | !E_NOTICE);
    // Database connection
    include('database.php');
    
    // Error & success messages
    global $success_msg, $email_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5, $emptyError6, $unmatchedPassword;
    session_start();
    $idtutor = $_SESSION['id'];

    if(isset($_POST["submit"])) {
        $c_name        = $_POST["name"];
        $descripcion   = $_POST["descripcion"];
        $thumbnail     = $_FILES["thumbnail"]['tmp_name'];
        $ImgContent    = addslashes(file_get_contents($thumbnail));
        $precio        = $_POST["seleccionPrecio"];

        // verify if email elsexists
        $nameCheck = $connection->query( "SELECT * FROM CURSO WHERE curso_nombre = '{$c_name}' ");
        $rowCount = $nameCheck->fetchColumn();

        // PHP validation
        if(!empty($c_name) && !empty($descripcion) && !empty($ImgContent) && !empty($precio)){
            
            // check if user email already exist
            if($rowCount > 0) {
                $name_exist = '
                    <div class="alert alert-danger" role="alert">
                        El nombre ya está en uso!
                    </div>
                ';
            } else {

                $_name = mysqli_real_escape_string($connection2, $name);
                $_descripcion = mysqli_real_escape_string($connection2, $email);
                $_ImgContent = mysqli_real_escape_string($connection2, $password);
                $_precio = mysqli_real_escape_string($connection2, $password2);
                
             if(!preg_match("/^[a-zA-Z ]*$/", $_name)) {
                    $_NameErr = '<div class="alert alert-danger">
                            Sólo se permiten letras y espacios.
                        </div>';
                }

             if(!preg_match("/^[a-zA-Z ]*$/", $_descripcion)) {
                    $_DescriptionErr = '<div class="alert alert-danger">
                            Sólo se permiten letras y espacios.
                        </div>';
                }

                 else {

            $sql = $connection->query("INSERT INTO curso (curso_nombre, curso_descripcion, curso_thumb, curso_precio, curso_es_aprobado, curso_id_tutor) VALUES ('{$c_name}', '{$descripcion}', '{$ImgContent}', '{$precio}', 0, '{$idtutor}')");
            
                if(!$sql){
                    die("Falló la consulta MySQL!" . mysqli_error($connection));
                } else {
                    $success_msg = '<div class="alert alert-success">
                        ¡Tu curso ha sido enviado a un Administrador para su revisión, pronto tendrás noticias de él!
                </div>';
                }
            }
        }
        } else {
            if(empty($c_name)){
                $emptyError1 = '<div class="alert alert-danger">
                    Es necesario que ingreses un nombre.
                </div>';
            }
            if(empty($descripcion)){
                $emptyError2 = '<div class="alert alert-danger">
                    Es necesario que ingreses una descripcion.
                </div>';
            }
            if(empty($ImgContent)){
                $emptyError3 = '<div class="alert alert-danger">
                    Es necesario que ingreses una imágen.
                </div>';
            }
            if(empty($precio)){
                $emptyError4 = '<div class="alert alert-danger">
                    Es necesario que ingreses un precio.
                </div>';
            }
        }
    }
?>