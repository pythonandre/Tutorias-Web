<?php
   
    // Database connection
    include('database.php');
    
    // Error & success messages
    global $success_msg, $email_exist, $emptyError1, $emptyError2, $emptyError3, $emptyError4, $emptyError5, $emptyError6, $unmatchedPassword;
    

    if(isset($_POST["submit"])) {
        $name          = $_POST["name"];
        $email         = $_POST["email"];
        $password      = $_POST["password"];
        $password2     = $_POST["password2"];
        $certificado   = $_POST["certificado"];
        $grado         = $_POST["seleccionAnio"];

        // verify if email exists
        $emailCheck = $connection->query( "SELECT * FROM ALUMNO WHERE alumno_email = '{$email}' ");
        $rowCount = $emailCheck->fetchColumn();

        // PHP validation
        if(!empty($name) && !empty($email) && !empty($password) && !empty($password2) && !empty($certificado) && $password == $password2){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        El e-mail ya está en uso!
                    </div>
                ';
            } else {

                $_name = mysqli_real_escape_string($connection2, $name);
                $_email = mysqli_real_escape_string($connection2, $email);
                $_password = mysqli_real_escape_string($connection2, $password);
                $_password2 = mysqli_real_escape_string($connection2, $password2);
                $_certificado = mysqli_real_escape_string($connection2, $certificado);
                $_grado = mysqli_real_escape_string($connection2, $grado);

            // Password hash
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

             if(!preg_match("/^[a-zA-Z ]*$/", $_name)) {
                    $_NameErr = '<div class="alert alert-danger">
                            Sólo letras y espacios permitidos.
                        </div>';
                }
            if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            El formato del e-mail es inválido.
                        </div>';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             La contaseña debería tener 6 a 20 carácteres de largo, contener almenos un carácter especial, minúscula, mayúscula y un digito.
                        </div>';
                } else {


            $sql = $connection->query("INSERT INTO alumno (alumno_nombre, alumno_email, alumno_password, alumno_grado, alumno_certificado) 
            VALUES ('{$name}', '{$email}', '{$password_hash}', '{$grado}', '{$certificado}')");
            
                if(!$sql){
                    die("Falló la consulta MySQL!" . mysqli_error($connection));
                } else {
                    $success_msg = '<div class="alert alert-success">
                        Usuario registrado exitósamente!
                </div>';
                }
            }
        }
        
        } else {
            if(empty($name)){
                $emptyError1 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu nombre.
                </div>';
            }
            if(empty($email)){
                $emptyError2 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu e-mail.
                </div>';
            }
            if(empty($password)){
                $emptyError3 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu contraseña.
                </div>';
            }
            if(empty($password2)){
                $emptyError4 = '<div class="alert alert-danger">
                    Es necesario que verifiques tu contraseña.
                </div>';
            }
            if(empty($grado)){
                $emptyError5 = '<div class="alert alert-danger">
                    Selecciona tu experiencia.
                </div>';
            }
            if(empty($certificado)){
                $emptyError6     = '<div class="alert alert-danger">
                    Porfavor, sube tu certificado.
                </div>';
            }            
            if($password != $password2){
                $unmatchedPassword = '<div class="alert alert-danger">
                    Las contraseñas no coinciden.
                </div>';
            }
        }
    }
?>