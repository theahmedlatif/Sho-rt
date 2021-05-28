<?php

if (session_status() == 1)
{
    session_start();
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="..styles.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="#">Sho.rt</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"> Home </a></li>
                <?php if (isset($_SESSION['login_user']))
                {echo "<li class='nav-item'><a class='nav-link' href='mylinks.php'> My Links </a></li>";} ?>

                <?php if (isset($_SESSION['login_user']))
                {echo "<li class='nav-item'><a class='nav-link' href='account.php'> My Account </a></li>";} ?>

                <?php if (isset($_SESSION['login_user']))
                {echo "<li class='nav-item'><a class='nav-link' href='logout.php'> Logout </a></li>";} ?>

                <?php if (!isset($_SESSION['login_user']))
                {echo "<li class='nav-item'><a class='nav-link' href='register.php'> Register </a></li>";} ?>

                <?php if (!isset($_SESSION['login_user']))
                {echo "<li class='nav-item'><a class='nav-link' href='login.php'> Login </a></li>";} ?>
            </ul>
        </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
</nav>



