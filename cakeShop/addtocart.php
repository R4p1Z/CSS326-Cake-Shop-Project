<?php
session_start();

if(isset($_GET) && !empty($_GET)){
    $id = $_GET['id'];
    $error_message = ''; // Initialize an empty error message

    if(isset($_GET['quant']) && !empty($_GET['quant'])){
        $quant = $_GET['quant'];
    } else{
        $error_message .= "Quantity is required. ";
    }

    if(isset($_GET['Note']) && !empty($_GET['Note'])){
        $Note = $_GET['Note'];
    } else{
        $error_message .= "Note is required. ";
    }

    // Check if there are any error messages
    if(empty($error_message)){
        // Check if the item is already in the cart
        if(isset($_SESSION['cart'][$id])){
            // If yes, update both quantity and Note
            $_SESSION['cart'][$id]['quantity'] += $quant;
            $_SESSION['cart'][$id]['Note'] = $Note;
        } else{
            // If no, create a new entry
            $_SESSION['cart'][$id] = array("quantity" => $quant, "Note" => $Note);
        }

        header('location: cart.php');
        exit(); // Ensure that the script stops execution after the redirect
    } else {
        // Display error message and prevent redirect
        echo "Error: $error_message";
    }
} else{
    header('location: cart.php');
    exit(); // Ensure that the script stops execution after the redirect
}

echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";
?>