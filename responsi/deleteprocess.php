<?php
    session_start();
    if (!isset($_SESSION["login"]) ){
      header("location: login.php");
      exit;
    }
    include 'database.php';
    $item_id = $_GET['item_id'];

        if(delete($item_id) > 0){
        echo "
            <script>
            alert('Delete Complete');
            document.location.href='list.php';
            </script>
            ";
    }
    else{
            echo mysqli_error($connect);
    }
?>