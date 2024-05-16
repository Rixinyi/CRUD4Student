<?php
//Monica T. Cadavez BSIT-2B
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "dbstudents"; 


    $conn = mysqli_connect($servername, $username, $password, $dbname);


    if ($conn == false){
        die("Connection failed: ". mysqli_connect_error());
    }
?>
