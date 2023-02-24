<?php
session_start();
if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="/css1/styleadmin.css">
</head>
<body>
<img class="logo" src="/img/baby.png" alt="" hspace="400" >
<h3 class="title_admin">Welcome to Admin Page</h3>
    <style>
        h3.title_admin{
    text-align: center;
    font-size: 30px;
    margin-top: 150px;
}
img.logo{
    margin-top: -180px;
    margin-bottom: -190px;
}
    </style>
    <?php
        include('config/config.php');
        include('modules/header.php'); 
        include('modules/menu.php');
        include('modules/main.php');
        include('modules/footer.php');
        ?>
</body>
</html>