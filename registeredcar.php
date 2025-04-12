<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    session_start();
    if(isset($_GET['logged'])) {
        Header("location:index.php");
        session_destroy();
    }
    ?>
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
                                <h1 class="navbar-brand"><strong>JONNY</strong> cars</h1>
                            </div>
                            <div class="collapse navbar-collapse justify-content-end" id="main-nav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="home.html"><strong>Home</strong></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold" href="regcar.php"><strong>Register cars</strong></a>
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
    <div class="container-lg my-5">
        <h3 class="fw-bold display-6 text-center">Cars Available Here</h3>
        <div class="row my-4 align-items-center justify-content-center g-4">
            <?php
            include("jcon.php");
            $select = mysqli_query($jcon, "SELECT * FROM cars"); 
            while ($row = mysqli_fetch_assoc($select)) {
                $id = $row['id'];
                $image = $row['image'];
                $name = $row['name'];
                $manuda = $row['manuda'];
                $price = $row['price'];
                $description = $row['description']; // Fetching the description
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow bg-white" data-bs-toggle="collapse" data-bs-target="#description-<?php echo $id; ?>">
                        <img src='jj/<?php echo $image; ?>' class="card-img-top" alt="<?php echo $name; ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $name; ?></h5>
                            <p class="card-text">Manufacture Date: <?php echo $manuda; ?></p>
                            <p class="card-text">Price: $<?php echo $price; ?></p>
                            <a href="updatee.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update</a>
                            <a href="deletee.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
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
        <!-- <div class="text-center my-4">
            <a href="1stpage.html" class="btn btn-primary">Click Here to Buy a Car</a>
        </div> -->
    </div>
</section>
</body>
</html>