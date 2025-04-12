<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>Car Buying</title>
    <!-- https://www.youtube.com/watch?v=oHyrAPIQtuc&list=PLl4lFfozlRA_kw69E1bVF4EasOFQliENj listen to this when ur tired!-->  
</head>
<body>
<section class="bg-light">
<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
                            <div class="container-xxl">
                                <h1 class="navbar-brand"><strong>JONNY</strong> cars</h1>
                            </div>
                            <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="home.html"><strong>Home</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="regcarfuser.php"><strong>Cars</strong></a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link fw-bold" href="Login.php"><strong>Log in</strong></a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="about.html"><strong>About us</strong></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    
    <div class="container-lg my-5 justify-content-center align-items-center">
        <h3 class="fw-bold display-6 text-center">To Buy Car Register Here</h3>
        <div class="row my-12 align-items-center justify-content-center fw-light g-3">
            <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
                <div class="card-border-0">
                    <div class="card-body text-center py-4">
                    <form method="post" action=" ">
                                 <table>
                                <tr>
                                    
                                    <td><label class="form-label"><b>First Name</b></label></td>
                                    <td><input type="text" class="form-control" name="fname" required></td>
                                </tr>
                                <tr>
                                    <td><label class="form-label"><b>Last Name</b></label></td>
                                    <td><input type="text" class="form-control" name="lname" required></td>
                                </tr>
                                <tr>
                                    <td><label class="form-label"><b>Email</b></label></td>
                                    <td><input type="email" class="form-control" name="email" required></td>
                                </tr>
                                <tr>
                                    <td><label class="form-label"><b>Phone No</b></label></td>
                                    <td><input type="number" class="form-control" name="phone" required></td>
                                </tr>
                                <tr>
                                <input type="hidden" name="carId" value="<?php echo isset($_SESSION['carId']) ? htmlspecialchars($_SESSION['carId']) : ''; ?>">
                                    <td><button type="submit" class="btn btn-success" name="submit">Save</button></td>
                                    <td><button type="reset" class="btn btn-danger" name="reset">Clear</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

include('jcon.php');

// Check if the connection was successful
if (!$jcon) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set Car ID from URL if it exists
if (isset($_GET['id'])) {
    $_SESSION['carId'] = htmlspecialchars($_GET['id']);
    // echo "Car ID set: " . $_SESSION['carId'] . "<br>";
} else {
    echo "No Car ID in URL.<br>";
}

// echo "Current Car ID: " . (isset($_SESSION['carId']) ? $_SESSION['carId'] : 'Not Set') . "<br>";

if (isset($_POST['submit'])) {
    $fname = validate($_POST['fname']);
    $lname = validate($_POST['lname']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $carId = validate($_SESSION['carId']);// Get carId from session
   
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


</body>
</html>


