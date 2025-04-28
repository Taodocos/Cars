<?php
session_start();
include_once("jcon.php");

if (isset($_GET['logged'])) {
    header("location:1stpage.html");
    session_destroy();
}

// Handle login
if (isset($_POST['login'])) {
    $email = validate($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute the query
    $sql = "SELECT * FROM sellers WHERE email = ?";
    $stmt = mysqli_prepare($jcon, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($user = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION["email"] = $email;  // Store email in session
            header("Location: owner.php"); // Redirect to owner page
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}

// Validation function
function validate($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <title>Log In</title>
</head>
<body>
<section class="bg-light">
<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
    <div class="container-xxl">
        <a class="navbar-brand" href="about.html">
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
        </ul>
    </div>
</nav>
<div class="container-lg my-5 justify-content-center align-items-center">
    <br/><br/><br/>
    <h3 class="fw-bold display-6 text-center">LOG IN</h3>
    <div class="row my-12 align-items-center justify-content-center fw-light g-3">
        <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
            <div class="card-border-0">
                <div class="card-body text-center py-4">
                    <form method="POST" action="">
                        <table>
                            <tr>
                                <td><label class="form-label"><b>Email</b></label></td>
                                <td><input type="email" class="form-control" name="email" required></td>
                            </tr>
                            <tr>
                                <td><label class="form-label"><b>Password</b></label></td>
                                <td>
                                    <input type="password" class="form-control" name="password" id="passwordInput" required>
                                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show Password
                                </td>
                            </tr>
                            <tr>
                                <td><button type="submit" class="btn btn-success" name="login">Login</button></td>
                                <td><button type="reset" class="btn btn-danger" name="reset">Clear</button></td>
                            </tr>
                        </table>
                        <p class="mt-2"><a href="sellerReg.php">Sign Up</a></p>
                    </form>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                    <?php endif; ?>
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
