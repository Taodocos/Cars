<?php
session_start();
if (isset($_GET['logged'])) {
    header("location:index.php");
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>Cars</title>
    <style>
        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }
        .card {
            cursor: pointer; /* Indicate that the card is clickable */
            transition: transform 0.2s; /* Smooth hover effect */
        }
        .card:hover {
            transform: scale(1.05); /* Slightly enlarge the card on hover */
        }
    </style>
</head>
<body>
<section class="bg-light">
<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
        <div class="container-xxl">
            <a class="navbar-brand" href="regcar.php">
                <img src="uploads/Logo.png" alt="logo" style="height: 40px;">
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
                    <a class="nav-link fw-bold" href="regcar.php"><strong>Register cars</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="about.html"><strong>About us</strong></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-lg my-5">
        <br/><br/>   
        <h3 class="fw-bold display-6 text-center">Cars Available Here</h3>
        <div class="row my-4 align-items-center justify-content-center g-4">
            <?php
            include("jcon.php");
            $select = mysqli_query($jcon, "SELECT * FROM cars"); 
            while ($row = mysqli_fetch_assoc($select)) {
                $id = $row['id'];
                $image = base64_encode($row['image']); // Encode image data
                $name = $row['name'];
                $manuda = $row['manuda'];
                $price = $row['price'];
                $description = $row['description'];
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow bg-white">
                        <img src='data:image/jpeg;base64,<?php echo $image; ?>' class="card-img-top" alt="<?php echo $name; ?>" data-bs-toggle="collapse" data-bs-target="#description-<?php echo $id; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title" data-bs-toggle="collapse" data-bs-target="#description-<?php echo $id; ?>"><?php echo $name; ?></h5>
                            <p class="card-text">Manufacture Date: <?php echo $manuda; ?></p>
                            <p class="card-text">Price: $<?php echo $price; ?></p>
                            <a href="updatee.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update</a>
                            <a href="deletee.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="event.stopPropagation();">Delete</a>
                        </div>
                    </div>
                    <div id="description-<?php echo $id; ?>" class="collapse mt-2">
                        <div class="card card-body">
                            <p><?php echo $description; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
