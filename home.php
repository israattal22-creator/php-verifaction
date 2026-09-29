<?php
session_start();


if(isset($_SESSION["userid"])){
    echo "<script>window.Location.replace('login.php');</script>";}

if(isset($_POST['userid'])){
    session_destroy();
    header("location:login.php");
}







?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>home page</h1>
    <h2> welcome page <?=$_SESSION['username'] ?></h2>

    <br>
    <br>

    <form method ="post">
    <button  name = "btnlogout" type ="submit">logout</button>
    </form>



</body>
</html>
