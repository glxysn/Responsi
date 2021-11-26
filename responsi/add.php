<?php
session_start();

if (!isset($_SESSION["login"]) ){
  header("location: login.php");
  exit;
}
    include 'database.php';

    if(isset($_POST["submit"])){
        if(add($_POST) > 0){
            echo "
                <script>
                alert('Added Successfully');
                document.location.href='list.php';
                </script>
                ";
        }
        else{
            echo "<script>
            alert('Failed to Add');
            document.location.href='list.php';
            </script>";
              echo mysqli_error($connect);
          }
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

    <title>123200052</title>
  </head>
  <body>
    
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <h1>LIST OF INVENTORY</h1>
          <h1>EVERYTHING OFFICE</h1>
        </div>
      </div>
    </div>
  </footer>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="list.php">Inventory List</a>
        </li>
        <li class="nav-item dropdown">
                <div class="dropdown">
          <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          List per Category
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="cat_list.php?category=Building">Building</a>
            <a class="dropdown-item" href="cat_list.php?category=Vehicle">Vehicle</a>
            <a class="dropdown-item" href="cat_list.php?category=Office%20SInventory">Office Inventory</a>
            <a class="dropdown-item" href="cat_list.php?category=Elektronic">Elektronic</a>
          </div>
        </div>
        </li>
      </ul>
    </div>
    <a class="btn btn-danger fixed-right" href="logout.php" role="button">Logout</a>
  </div>
  </nav>


  
    <div class="container">
    <form action="" method="POST">
    
    <table class="table table-borderless" id="tabel">
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td> <label for="item_id" class="col-sm-5 col-form-label">Item ID</label></td>
        <td><input type="text" name="item_id" id="item_id" class="col-sm-7" placeholder="Item ID" aria-label="Item ID Example" required></td>
        </div>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="item_name" class="col-sm-5 col-form-label">Item Name</label></td>
        <td><input type="text" name="item_name" id="item_name" class="col-sm-7" placeholder="Item Name" aria-label="Item Name Example" required></td>
        </div>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="amount" class="col-sm-5 col-form-label">Amount</label></td>
        <td><input type="" name="amount" id="amount" placeholder="Amount" aria-label="Amount Example" required></td>
        </div>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="unit" class="col-sm-5 col-form-label">Unit</label></td>
        <td><input type="text" name="unit" id="unit" placeholder="Unit" aria-label="Unit Example" required></td>
        </div>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="arrival_date" class="col-sm-5 col-form-label">Arrival Date</label></td>
        <td><input type="date" name="arrival_date" id="arrival_date" required></td>
        </div>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="category" class="col-sm-5 col-form-label">Category</label></td>
        <td><select class="form-select" aria-label="Default select example" name="category">
            <option value="Building" selected>Building</option>
            <option value="Vehicle">Vehicle</option>
            <option value="Office Stationary">Office Stationary</option>
            <option value="Elektronic">Elektronic</option>
            </select></td>
        </div>
      </tr>
      <tr>
      <td><label for="tgl_datang" class="col-sm-5 col-form-label">Item Status</label></td>
          <td>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="item_status" id="inlineRadio1" value="Well">
            <label class="form-check-label" for="inlineRadio1">Well</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="item_status" id="inlineRadio2" value="Maintenance">
            <label class="form-check-label" for="inlineRadio2">Maintenance</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="item_status" id="inlineRadio3" value="Damage">
            <label class="form-check-label" for="inlineRadio3">Damage</label>
          </div>

          </td>
      </tr>
      <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td><label for="price" class="col-sm-5 col-form-label">Unit Price</label></td>
        <td><input type="text" name="price" id="price" class="col-sm-7" placeholder="Unit Price" aria-label="Unit Price example" required></td>
        </div>
      </tr>
      
    </table>
    <tr>
        <div class="form-group" style="padding-bottom: 10px;">
        <td> </td>
        <td><button type="submit" name="submit" class="btn btn-success">Save</button>
        <a href="list.php" class="btn btn-primary">Cancel</a>
        </td>
        </div>
      </tr>
          
      </form>
    </div>
  <footer class="bg-dark text-white">
    <div class="container">
      <div class="row pt-3">
        <div class="col text-center">
          <p>Inventory Web 2021</p>
        </div>
      </div>
    </div>
  </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   
  </body>
</html>