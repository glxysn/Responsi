<?php
include 'database.php';
if (isset($_POST["registration"])) {
    if (registration($_POST) > 0) {
        echo "<script>
                alert('Account Created Successfully');
                document.location.href='login.php';
            </script>";
    }
    else {
        echo mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>

      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <title>123200052</title>
         <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
       <div class="container">
       <div class="title">RegistrationI</div>
        <form action="" method="POST">
            <ul>
            <li class="form-group">
                    <label for="full_name">Full Name :</label>
                    <input type="text" name="full_name" id="full_name" required>
                </li>
                <li class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required>
                </li>
                <li class="form-group">
                    <label for="phone_num">Phone Num :</label>
                    <input type="text" name="phone_num" id="phone_num" required>
                </li>
                <li class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" required>
                </li>
                <li class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" required>
                </li>
                <li class="form-group">
                    <label for="password2">Password Confirmation :</label>
                    <input type="password" name="password2" id="password2" required>
                </li>
                    <button type="submit" name="registration" class="btn btn-primary" id="btn">Registrtion</button>    
            </ul>
        </form>
        <a href="login.php">Login</a>
       </div>
       
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>