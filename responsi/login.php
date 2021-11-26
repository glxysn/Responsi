<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("location: index.php");
        exit;
    }
    include 'database.php';
    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = mysqli_query($connect, "SELECT * FROM staff WHERE username = '$username'");
        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_assoc($query);
            if($password == $row["password"]){
                $_SESSION["username"] = $row["username"];
                $_SESSION["full_name"] = $row["full_name"];
                $_SESSION["email"] = $row["email"];
                $_SESSION["phone_num"] = $row["phone_num"];
                $_SESSION["login"] = true;
                header("location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>123200052</title>
  </head>
  <body>
    <div class="container">
        <div class="title">Login</div>
    <form method="POST" action="">
        <div class="form-group" id="username">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <?php if(isset($error)) : ?>
        <p style="color: red; font-style:italic">Username or Password are incorrect</p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary" id="btn" name="login">Submit</button>
    </form>
    <a href="registration.php">Registration</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>