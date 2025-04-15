<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <title>Home</title>
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            height: 50px; /* Adjust the height as needed */
            margin-right: 10px; /* Space between logo and brand name */
        }
    </style>
</head>
<body>
<section class="bg-light">
    <nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
        <div class="container-xxl">
            <a class="navbar-brand" href="home.html">
                <img src="uploads/Logo.png" alt="logo">
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
                    <a class="nav-link fw-bold" href="regcarfuser.php"><strong>Cars</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="Login.php"><strong>Log in</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="about.html"><strong>About us</strong></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="jj/c2.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Roman car sales</h5>
                        <p>You can found your dream cars here!</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="jj/c9.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Roman car sales</h5>
                        <p>You can found car salers and buyres here! </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="jj/c1.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Mission</h5>
                        <p>To meet your needs!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
