<?php
    $dbConnection=mysqli_connect("localhost","root","014657971","php_gem");
    if(mysqli_connect_error()){
        echo "failed to connect to MYSQL: ".mysqli_connect_error();
        exit();
    }
    //echo "成功連線";
    mysqli_set_charset($dbConnection,"Utf8");
    
?>
