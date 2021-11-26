<?php
    $connect = mysqli_connect("localhost", "root", "", "responsi");

function registration($data){
        global $connect;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($connect, $data["password"]);
        $password2 = mysqli_real_escape_string($connect, $data["password2"]);
        $full_name = $data["full_name"];
        $email = $data["email"];
        $no_tlp = $data["phone_num"];
        $result = mysqli_query($connect, "SELECT username FROM staff WHERE username = $username");
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                    alert('The username are already used');
                </script>";
          return false;
        }
        if($password != $password2){
            echo "<script>
                    alert('The password is not the same');
                </script>";

          return false;
        }
        mysqli_query($connect, "INSERT INTO staff VALUES ('$username',
                                                            '$password',
                                                            '$full_name',
                                                            '$email',
                                                            '$phone_num')");

        return mysqli_affected_rows($connect);
}
function query($query){
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function add($data){
    global $connect;
    $item_id = $data["item_id"];
    $item_name = $data["item_name"];
    $amount = $data["amount"];
    $unit = $data["unit"];
    $arrival_date = $data["arrival_date"];
    $category = $data["category"];
    $item_status = $data["item_status"];
    $price = $data["price"];

    $query = "INSERT INTO inventory VALUES('$item_id',
                                            '$item_name',
                                            '$amount',
                                            '$unit',
                                            '$arrival_date',
                                            '$category',
                                            '$item_status',
                                            '$price')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function edit($data){
    global $connect;
    $item_id = $data["item_id"];
    $item_name = $data["item_name"];
    $amount = $data["amount"];
    $unit = $data["unit"];
    $arrival_date = $data["arrival_date"];
    $category = $data["category"];
    $item_status = $data["item_status"];
    $price = $data["price"];

    $query = "UPDATE inventory SET
                item_id = '$item_id',
                item_name = '$item_name',
                amount = '$amount',
                unit = '$unit',
                arrival_date = '$arrival_date',
                category = '$category',
                item_status = '$item_status',
                price = '$price' WHERE item_id = '$item_id'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}

function delete($item_id){
    global $connect;
    mysqli_query($connect, "DELETE FROM inventory WHERE item_id = '$item_id'");
    return mysqli_affected_rows($connect);
}
?>