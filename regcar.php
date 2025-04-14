<?php
include('jcon.php');

if (isset($_POST['submit'])) {
    $name = validate($_POST['name']);
    $manuda = validate($_POST['manuda']);
    $price = validate($_POST['price']);
    $description = validate($_POST['description']);

    // Prepare to insert car details
    $insert = "INSERT INTO cars (name, manuda, price, description, image, image1, image2, image3) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $jcon->prepare($insert);

    // Initialize image paths
    $imagePaths = ['', '', '', ''];

    // Ensure the uploads directory exists
    if (!is_dir('uploads')) {
        mkdir('uploads', 0755, true);
    }

    // Handle image uploads
    // Check if at least 4 images are uploaded
    if (isset($_FILES['images']) && count($_FILES['images']['name']) >= 4) {
        for ($i = 0; $i < 4; $i++) {
            if (isset($_FILES['images']['name'][$i]) && $_FILES['images']['name'][$i] != '') {
                $image = $_FILES['images']['name'][$i];
                $targetFilePath = 'uploads/' . basename($image); // Correctly save to the uploads directory

                // Move the uploaded file to the uploads directory
                if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFilePath)) {
                    $imagePaths[$i] = basename($image); // Store only the filename for database insertion
                } else {
                    echo "<script>alert('Failed to upload image: " . htmlspecialchars($image) . "');</script>";
                    return; // Stop processing if upload fails
                }
            }
        }
    } else {
        echo "<script>alert('Please select at least 4 images.');</script>";
        return; // Return early if not enough images are uploaded
    }

    // Bind parameters
    $stmt->bind_param("ssisssss", $name, $manuda, $price, $description, $imagePaths[0], $imagePaths[1], $imagePaths[2], $imagePaths[3]);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "<script>alert('Successfully registered!!!');</script>";
        echo "<script>window.location='regcar.php';</script>";
    } else {
        echo "<script>alert('Error: " . htmlspecialchars($stmt->error) . "');</script>";
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
            <h1 class="navbar-brand"><strong>JONNY</strong> cars</h1>
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
                            <label class="form-label">Pictures of Car (Select at least 4)</label>
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
