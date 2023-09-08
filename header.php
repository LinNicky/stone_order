<?php include('stock.php');
include('dbConnection.php');
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <link rel="stylesheet"  href="/css/css.css">
    <title>寶石預定</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                   <a class="nav-link active" aria-current="page" href = "/tttt.php">首頁</a>
                    <a class="nav-link active" href="/about.php">關於我們</a>
                        <?php
                        if($_SESSION['email']=="haha@gmail.com" && $_SESSION['password']=="password")
                        {
                            echo '<a class="nav-link active" href = "/allOrder.php">訂單</a>';
                        }
                        if($_SESSION['email']!=null){
                            echo '<a class="nav-link active" href = "/functions.php?op=logout">登出</a>';
                        }else{
                            echo '<a class="nav-link active" href = "/login.php">員工登入</a>';
                            echo '<a class="nav-link active" href = "/login2.php">會員登入</a>';
                        }
                        ?>
                </ul>
            </div>
        </div>
    </nav>



