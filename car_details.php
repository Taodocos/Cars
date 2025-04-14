<?php
include('jcon.php');

if (isset($_GET['id'])) {
    $carId = intval($_GET['id']); // Ensure ID is an integer

    // Fetch car details from the database
    $query = "SELECT * FROM cars WHERE id = ?";
    $stmt = $jcon->prepare($query);
    $stmt->bind_param("i", $carId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $car = $result->fetch_assoc();
    } else {
        echo "<script>alert('Car not found.'); window.location='regcarfuser.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No car ID specified.'); window.location='regcarfuser.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title><?php echo $car['name']; ?> - Car Details</title>
    <style>
        .car-images img {
            max-width: 100%;
            height: auto;
            margin: 5px;
        }
        .description {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<section class="bg-light">
    <nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
        <div class="container-xxl">
            <h1 class="navbar-brand"><strong>JONNY</strong> cars</h1>
        </div>
    </nav>

    <div class="container-lg my-5">
        <h3 class="fw-bold display-6 text-center"><?php echo $car['name']; ?></h3>
        <div class="row my-4">
            <div class="col-md-6 car-images">
                <h5>Images:</h5>
                <img src='uploads/<?php echo $car['image']; ?>' alt="Main Image">
                <img src='uploads/<?php echo $car['image1']; ?>' alt="Image 1">
                <img src='uploads/<?php echo $car['image2']; ?>' alt="Image 2">
                <img src='uploads/<?php echo $car['image3']; ?>' alt="Image 3">
            </div>
            <div class="col-md-6 description">
                <h5>Description:</h5>
                <p><?php echo nl2br(htmlspecialchars($car['description'])); ?></p>
                <p><strong>Manufacture Date:</strong> <?php echo htmlspecialchars($car['manuda']); ?></p>
                <p><strong>Price:</strong> $<?php echo htmlspecialchars($car['price']); ?></p>
            </div>
        </div>
        <div class="text-center">
            <a href="regcarfuser.php" class="btn btn-primary">Back to Cars</a>
        </div>
    </div>
</section>
</body>
</html>
