<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="mycontact";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error)
    {
        die("Connection Failed due to ".$conn->connect_error);
    }
    // else{
    //         echo "Successfully Connected";
    // }

?> 