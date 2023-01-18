<?php
   
    // Database connection
    include('database.php');
    
    // Error & success messages
    global $email_exist,$emptyError2, $emptyError3, $userMail, $logedIn, $welcomeMsg, $wrongPassError3, 
    $passrowCountLogin, $passwordCheckLogin, $password_hashLogin, $rowCount, $emailCheck, $email_login, $password_login, $type;

    $type = "tutor";

    if(isset($_POST["submit"])) {
        $email_login   = $_POST["email"];
        $password_login      = $_POST["password"];
        $_email = mysqli_real_escape_string($connection2, $email_login);
        $_password = mysqli_real_escape_string($connection2, $password_login);   

        //clean data
        $user_email = filter_var($email_login, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection2, $password_signin);

        // perform validation
                if(!filter_var($email_login, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            El formato del email es inválido
                        </div>';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password_login)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             La contraseña debería tener de 6 a 20 carácteres de largo, contener almenos un carácter especial, minúscula, mayúscula y un dígito.
                        </div>';
                }     


        // verify rows
        $emailCheck = $connection->query( "SELECT * FROM tutor WHERE tutor_email = '{$email_login}' ");
        $sql = "SELECT * From tutor where tutor_email = '{$email_login}' ";
        $rowCount = $emailCheck->fetchColumn();
        $query = mysqli_query($connection2, $sql);
        if(!$query){
            die("Falló la query: " . mysqli_error($connection2));
        }

        // PHP validation
        if(!empty($email_login) && !empty($password_login)){
            
            // chequeando que las columnas sean mayor a cero
            if($rowCount > 0){
                while($row = mysqli_fetch_array($query)){
                    $email = $row['tutor_email'];
                    $pass_word = $row['tutor_password'];
                    $nombre = $row['tutor_nombre'];
                    $id = $row['tutor_id'];
                }
            $password = password_verify($password_login, $pass_word);
            if($email_login == $email && $password_login == $password){
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $email;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['sessiontype'] = $type;
            $welcomeMsg = "<div class='alert alert-success'> Bienvenido '{$email_login}'! </div>";
            header("Location: index.php");
            }
            }

            if($rowCount <= 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        ¡Esa cuenta no existe!
                    </div>
                ';
            }
            if($password_login != $password && $rowCount > 0){
                $wrongPassError3 = '<div class="alert alert-danger">
                    La contraseña ingresada es incorrecta.
                </div>';
            }     
        } else {
            if(empty($email_login)){
                $emptyError2 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu e-mail.
                </div>';
            }
            if(empty($password_login)){
                $emptyError3 = '<div class="alert alert-danger">
                    Es necesario que ingreses tu contraseña.
                </div>';
            }
        }
}

?>