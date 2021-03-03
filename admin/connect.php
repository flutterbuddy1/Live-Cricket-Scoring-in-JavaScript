<?php 
    $SERVER="localhost";
    $username="root";
    $password="";
    $dbname="cricket_match";

    $conn = new mysqli($SERVER,$username,$password,$dbname);
    if($conn->connect_error)
    {
        die("Connection failed:".$conn->connect_error);
    }
    $string= "Connected Successfully";

    echo "<p><?php sleep(5); echo $string; ?></p>";
?>