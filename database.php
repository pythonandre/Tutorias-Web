<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "losktutos";

    $connection2 = mysqli_connect($hostname, $username, $password, "losktutos") or die ("Conexión no establecida.");

    try {
        $connection = new PDO("mysql:host=$hostname;dbname=losktutos", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Database connected successfully";
    } catch(PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }

    $mysqli = new mysqli($hostname, $username, $password, "losktutos");


    //testing purposes
    $conn = mysqli_connect($hostname, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    //echo "Connected successfully";

?>