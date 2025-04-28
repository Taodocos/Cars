<?php
include('jcon.php');

if (isset($_POST['submit'])) {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['pass']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $insert = "INSERT INTO sellers (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($jcon, $insert);

    // Check if statement preparation was successful
    if (!$stmt) {
        die("Failed to prepare statement: " . mysqli_error($jcon));
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $hashedPassword);
    
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registered successfully!');</script>";
        echo "<script>window.location='login.php';</script>";
    } else {
        echo "<script>alert('Registration failed!');</script>";
    }
    
    // Close the statement
    mysqli_stmt_close($stmt);
}

// Validation function
function validate($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}

// Reset values if reset button is pressed
if (isset($_POST['reset'])) {
    $name = "";
    $email = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>Sign Up</title>
</head>
<body>
<section class="bg-light">
<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
    <div class="container-xxl">
        <a class="navbar-brand" href="car_details.php">
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
<div class="container-lg my-5 justify-content-center align-items-center">
    <h4 class="fw-bold display-6 text-center">Sign Up</h4>
    <div class="row my-12 align-items-center justify-content-center fw-light g-3">
        <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
            <div class="card-border-0">
                <div class="card-body text-center py-4">
                    <form method="post" action="">
                        <table>
                            <tr>
                                <td><label class="form-label"><b>User Name</b></label></td>
                                <td><input type="text" class="form-control" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label class="form-label"><b>Email</b></label></td>
                                <td><input type="email" class="form-control" name="email" id="email" value="<?php echo isset($email) ? $email : ''; ?>" required></td>
                            </tr>
                            <tr>
                                <td><label class="form-label"><b>Password</b></label></td>
                                <td>
                                    <input type="password" class="form-control" name="pass" id="passwordInput" required>
                                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show Password
                                </td>
                            </tr>
                            <tr>
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

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const checkbox = document.getElementById('showPassword');
    passwordInput.type = checkbox.checked ? 'text' : 'password';
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
