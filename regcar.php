<?php
include('jcon.php');

if (isset($_POST['submit'])) {
    $name = validate($_POST['name']);
    $manuda = validate($_POST['manuda']);
    $price = validate($_POST['price']);
    $description = validate($_POST['description']);

    // Prepare to insert car details
    $insert = "INSERT INTO cars (name, manuda, price, description, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $jcon->prepare($insert);

    // Check if an image is uploaded
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
        // Read the first image file
        $imageData = file_get_contents($_FILES['images']['tmp_name'][0]);

        // Bind parameters
        // Use 's' for string and 'b' for blob
        $stmt->bind_param("ssiss", $name, $manuda, $price, $description, $imageData);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Successfully registered!!!');</script>";
            echo "<script>window.location='regcar.php';</script>";
        } else {
            echo "<script>alert('Error: " . htmlspecialchars($stmt->error) . "');</script>";
        }
    } else {
        echo "<script>alert('Please upload at least one image.');</script>";
    }

    $stmt->close();
}

function validate($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = trim($data);
    return $data;
}

if (isset($_POST['reset'])) {
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
            <a class="navbar-brand" href="regcar.php">
            <img src="uploads/Logo.png" alt="logo" style="height: 40px;"> <!-- Adjust logo size -->
            <strong>Roman</strong> cars
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="main-nav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link fw-bold" href="home.html"><strong>Home</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="registeredcar.php"><strong>Cars</strong></a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="about.html"><strong>About us</strong></a>
            </li>
            </ul>
        </div>
</nav>

<div class="container-lg my-5 justify-content-center align-items-center">
    <br/><br/><br/><br/>
    <h3 class="fw-bold display-6 text-center">Car Registration</h3>
    <div class="row my-4 align-items-center justify-content-center fw-light g-3">
        <div class="col-12 col-lg-8 shadow bg-white"> <!-- Increased card size -->
            <div class="card-border-0">
                <div class="card-body text-center py-4">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3 text-start">
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
                            <label class="form-label">Pictures of Car (Select at least 1)</label>
                            <input type="file" name="images[]" class="form-control" accept=".jpg, .png, .jpeg" multiple required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
