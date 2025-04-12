<?php
session_start();
include('jcon.php');

// Check if the connection was successful
if (!$jcon) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set Car ID from URL if it exists
if (isset($_GET['id'])) {
    $_SESSION['carId'] = htmlspecialchars($_GET['id']);
    echo "Car ID set: " . $_SESSION['carId'] . "<br>";
} else {
    echo "No Car ID in URL.<br>";
}

echo "Current Car ID: " . (isset($_SESSION['carId']) ? $_SESSION['carId'] : 'Not Set') . "<br>";

if (isset($_POST['submit'])) {
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $carId = validate($_POST['carId']);// Get carId from session

    // Debug output

    

    exit; 
    $stmt = $jcon->prepare("INSERT INTO users (fname, lname, email, phone, carId) VALUES (?, ?, ?, ?, ?)");
    
    // Check if the prepare was successful
    if (!$stmt) {
        die("Prepare failed: " . $jcon->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssi", $fname, $lname, $email, $phone, $carId);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<script>alert('Successfully registered!!!');</script>"; 
        echo "<script>window.location='regcarfuser.php';</script>";
    } else {
        echo "<script>alert('Registration failed: " . $stmt->error . "');</script>";
    }

    // Close the statement
    $stmt->close();
    
}

// Function to validate input
function validate($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

// Reset form values if reset is pressed
if (isset($_POST['reset'])) {
    $fname = "";
    $lname = "";
    $email = "";
    $phone = "";
}
?>