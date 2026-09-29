<?php

session_start();

if(isset($_SESSION["userid"])){
    header("Location:home.php");
}

include("connection.php");

if(isset($_POST["btn"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];



    $fetchquery = "SELECT * FROM `users` WHERE `email` = :email";
    $fetchprepare = $connect->prepare($fetchquery);
    $fetchprepare->bindParam(":email",$email,PDO::PARAM_STR);
    $fetchprepare->execute();
    $userData = $fetchprepare->fetch(PDO::FETCH_ASSOC);


    echo "<pre>";
    print_r($userData);
    echo "</pre>";

    if($userData){
      
    echo "<pre>";
    print_r($userData);
    echo "</pre>";
        $verifyuser = password_verify($password,$userData['password']);

        if($verifyuser){
          echo "login successfully";


        $_SESSION['userid'] = $userData['id'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['username'] = $userData['username'];

        echo "<script>window.location.replace('home.php');</script>";
    } 
    else{
      
    echo "<pre>";
    print_r($userData);
    echo "</pre>";
    }      
   }
    else{
        echo"login failed";
    }











}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>verifaction form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1 class=text-center>login page</h1>
    <div class="container">
    <form class="row g-3" method ="post">
  <div class="col-md-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" name ="email">
  </div>
  <div class="col-md-12">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" name ="password">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name ="btn">login</button>
  </div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
