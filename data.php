<?php
    $con = mysqli_connect("localhost", "root", "", "social");

    if(mysqli_connect_errno()) {
        echo "failed to connect:" . mysqli_connect_errno();
    } 
    
    define("B_U", "https://www.innercircle.github.io");
?>