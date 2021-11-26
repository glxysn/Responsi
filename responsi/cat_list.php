<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
    include 'database.php';
    $category = $_GET['category'];
    $data = query("SELECT * FROM inventory WHERE category ='$category'");
    $tot_inve = 0;
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
          <h1>EVERYHTING OFFICE</h1>
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
            <a class="dropdown-item" href="cat_list.php?category=Office%20Stationary">Office Stationary</a>
            <a class="dropdown-item" href="cat_list.php?category=Elektronic">Elektronic</a>
          </div>
        </div>
        </li>
      </ul>
    </div>
    <a class="btn btn-danger fixed-right" href="logout.php" role="button">Logout</a>
  </div>
  </nav>


  <br>
  <div class="container" style="padding: 30px;">
    <table class="table table-striped" id="tabel">
        <thead>
            <tr>
                <th class="table-dark">No</th>
                <th class="table-dark">Item ID</th>
                <th class="table-dark">Item Name</th>
                <th class="table-dark">Amount</th>
                <th class="table-dark">Units</th>
                <th class="table-dark">Arrival Date</th>
                <th class="table-dark">Category</th>
                <th class="table-dark">Status</th>
                <th class="table-dark">Unit Price</th>
                <th class="table-dark">Total Price</th>
                <th class="table-dark">Action</th>
            </tr>
        </thead>
            <?php $i = 1; ?>
            <tbody>
            <?php foreach( $data as $row) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $row["item_id"] ?></td>
                <td><?= $row["item_name"] ?></td>
                <td><?= $row["amount"] ?></td>
                <td><?= $row["unit"] ?></td>
                <td><?= $row["arrival_date"] ?></td>
                <td><?= $row["category"] ?></td>
                <td><?= $row["item_status"] ?></td>
                <td><?php 
                        $number = $row["price"];
                        $price = number_format($number, 2, ',', '.');
                        echo "Rp." . $price;?>
                </td>
                <?php
                    $total = $row["price"] * $row["amount"];
                    $number = $total;
                    $pricepull = number_format($number, 2, ',', '.');
                    $tot_inve += $total;
                ?>
                <td><?= $pricepull ?></td>
                <td><a href="delete.php?item_id=<?= $row['item_id'];?>" class="badge badge-danger">Delete</a> 
                <a href="edit.php?item_id=<?= $row['item_id'];?>" class="badge badge-warning">Edit</a></td>
            </tr>   
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>
        <br>
    </table>
    Total Inventory =
                <?php
                  $number = $tot_inve;
                  $pricesopull = number_format($number, 2, ',', '.');
                ?>
                <?= $pricesopull ?>
            
    </div>
    <center><a href="add.php" class="btn btn-info btn-lg btn-center" >ADD</a></center>
  <footer class="bg-dark text-white fixed-bottom">
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