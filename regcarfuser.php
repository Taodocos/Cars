<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start();
    if (isset($_GET['logged'])) {
        header("location:index.php");
        session_destroy();
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <title>Cars</title>
    <style>
        .card-img-top {
            height: 200px; 
            object-fit: cover; 
        }
        .card {
            cursor: pointer; 
            transition: transform 0.2s; 
            position: relative; 
        }
        .card:hover {
            transform: scale(1.05); 
        }
    </style>
</head>
<body>
<section class="bg-light">

<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
        <div class="container-xxl">
            <a class="navbar-brand" href="regcarfuser.php">
            <img src="uploads/Logo.png" alt="logo" style="height: 40px;"> 
            <strong>R</strong> cars
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
                <a class="nav-link fw-bold" href="about.html"><strong>About us</strong></a>
            </li>
            </ul>
        </div>
</nav>

<div class="container-lg my-5">
    <br/><br/><br/><br/>
    
    <h3 class="fw-bold display-6 text-center">Cars Available Here</h3>
    <div class="row my-4 align-items-center justify-content-center g-4">
        <?php
        include("jcon.php");
        $select = mysqli_query($jcon, "SELECT * FROM cars"); 
        while ($row = mysqli_fetch_assoc($select)) {
            $id = $row['id'];
            $imageData = base64_encode($row['image']); // Encode binary data
            $name = $row['name'];
            $manuda = $row['manuda'];
            $price = $row['price'];
            $description = $row['description'];
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card shadow bg-white" onclick="window.location.href='car_details.php?id=<?php echo $id; ?>';">
                    <img src='data:image/jpeg;base64,<?php echo $imageData; ?>' class="card-img-top" alt="<?php echo $name; ?>">

                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $name; ?></h5>
                        
                        <div>
                            <p class="card-text">Manufacture Date: <?php echo $manuda; ?></p>
                            <p class="card-text">Price: $<?php echo $price; ?></p>
                        </div>
                    </div>
                </div>
                <div class="text-center my-4">
                            <a href="https://t.me/eagle_s_eye04" class="text-decoration-none mx-2" target="_blank">
                                <i class="fab fa-telegram fa-2x"></i>
                            </a>
                            <a href="https://wa.me/yourwhatsapplink" class="text-decoration-none mx-2" target="_blank">
                                <i class="fab fa-whatsapp fa-2x"></i>
                            </a>
                            <a href="https://www.instagram.com/eagleseye4444/#" class="text-decoration-none mx-2" target="_blank">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a>
                        </div>
            </div>
            
        <?php } ?>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
