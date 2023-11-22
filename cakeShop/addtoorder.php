<?php
  session_start();
  require_once 'config/connect.php';
  if (isset($_GET) & !empty($_GET)) {

    if(isset($_GET['pickup_time']) & !empty($_GET['pickup_time'])){
      $pickup_time = $_GET['pickup_time'];
    } else{
      $pickup_time = "11:00";
    }

    if(isset($_GET['pickup_date']) & !empty($_GET['pickup_date'])){
      $pickup_date = $_GET['pickup_date'];
    } else{
      $pickup_date = date('Y-m-d', strtotime('+1 day'));
    }

    $orderstatus = "Order placed!";
    
    if(isset($_GET['Note']) & !empty($_GET['Note'])){
      $note = $_GET['Note'];
    } else{
      $note = "HBD";
    }

    $uid = $_SESSION['customerid'];

    $iosql = "INSERT INTO orders (uid, orderDate, pickUp_time, pickUp_date, odstatus, note) VALUES (?, NOW(), ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $iosql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssss", $uid, $pickup_time, $pickup_date, $orderstatus, $note);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Check for success
    if(mysqli_stmt_affected_rows($stmt) > 0){
        echo "Order inserted, insert order items <br>";
    }else {
        echo "Order failed. <br>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

  }
?>