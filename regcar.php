<?php
include('jcon.php');

if (isset($_POST['submit'])) {
    $image = validate($_POST['image']);
    $name = validate($_POST['name']);
    $manuda = validate($_POST['manuda']);
    $price = validate($_POST['price']);
    $description = validate($_POST['description']); // New description field

    $insert = "INSERT INTO cars (image, name, manuda, price, description)
               VALUES ('$image', '$name', '$manuda', '$price', '$description')";
    $query = mysqli_query($jcon, $insert);
    if ($query) {
        echo "<script>alert('Successfully registered!!!');</script>";
        echo "<script>window.location='regcar.php';</script>";
    }
}

function validate($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

if (isset($_POST['reset'])) {
    $image = "";
    $name = "";
    $manuda = "";
    $price = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <style>
        /* Custom CSS to make labels bold */
        .form-label {
            font-weight: bold; /* Ensure labels are bold */
        }
    </style>
    <title>New Car Registration</title>
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
                                        <a class="nav-link fw-bold" href="registeredcar.php"><strong>Cars</strong></a>
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
        <h3 class="fw-bold display-6 text-center">Car Registration</h3>
        <div class="row my-4 align-items-center justify-content-center fw-light g-3">
            <div class="col-12 col-lg-8 shadow bg-white"> <!-- Increased card size -->
                <div class="card-border-0">
                    <div class="card-body text-center py-4">
                        <form method="post" action="">
                            <div class="mb-3 text-start"> <!-- Align labels to the left -->
                                <label class="form-label">Car Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label">Manufacture Date</label>
                                <input type="date" class="form-control" name="manuda" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" required>
                            </div>
                            <div class="mb-3 text-start">
                                <label class="form-label">Picture of Car</label>
                                <input type="file" name="image" class="form-control" accept=".jpg, .png, .jpeg" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label> <!-- Centered above -->
                                <textarea class="form-control" name="description" rows="3" required></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success" name="submit">Save</button>
                                <button type="reset" class="btn btn-danger" name="reset">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>