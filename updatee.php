<?php
include('jcon.php');
$id= $_GET['id'];
if(isset($_POST['submit']))
{
    $image=validate($_POST['image']);
    $name=validate($_POST['name']);
    $manuda=validate($_POST['manuda']);
    $price=validate($_POST['price']);

    $update = "update `cars` set id=$id,image='$image',name='$name',manuda='$manuda',price='$price' where id = $id";
    $query= mysqli_query($jcon, $update);
    if($query){
        echo "<script>alert('updated successfully!!!');</script>";
        echo "<script>window.location='registeredcar.php';</script>";}}
function validate($data){
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    $data=trim($data);
    return $data;
    #include('session.php');

}
if(isset($_POST['reset']))
{
    $image="";
    $name="";
    $manuda="";
    $price="";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css"rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>update</title>
</head>
<body>
<section class="bg-light">
<nav class="navbar navbar-expand-md navbar-light fixed-top border-secondary shadow-lg bg-white">
        <div class="container-xxl">
            <a class="navbar-brand" href="car_details.php">
            <img src="jj/Logo.png" alt="logo" style="height: 40px;"> <!-- Adjust logo size -->
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
        <div class="container-lg my-5 justify-content-center align-items-center">

        <br/> <br/>   <br/><br/>
            <h3 class="fw-bold display-6 text-center ">Update car information</h3>
            <div class="row my-12 align-items-center justify-content-center fw-light g-3 ">
                <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
                    <div class="card-border-0">
                        <div class="card-body text-center py-4">
                            <form method="post" action="">
                            <table>
                                <tr>
                                    <td><label  class="form-label " ><b> Car Name</b></label></td>
                                    <td><input type="text" class="form-control" value="<?php          //echo $fname; ?> " name="name" id=""></td>
                                </tr>
                                <tr><td><label  class="form-label "><b>Manu Date</b></label></td>
                                    <td><input value="<?php #echo  $lname; ?> " type="Date" class="form-control"   name="manuda" id=""></td></tr>
                                <tr><td><label  class="form-label "><b>Price</b></label></td>
                                    <td><input value="<?php #echo  $lname; ?> " type="number" class="form-control"   name="price" id=""></td></tr>
                                    <td><label for="insert the screen shoot"><b>Picture of car</b></label></td>
                                    <td> <input type="file" value="<?php // echo $myimage; ?> "  name="image" id="img" class="form-control"  accept=".JPG, .PNG, .JPEG,">
                             </td></tr>

                                <tr><td><button type="submit" class="btn btn-success width" name="submit">update</button></td>
                                    <td><button type="reset" class="btn btn-danger" name="reset">clear</button></td>
                                  
                                </tr>
                           </table>
                           </form>
                        </div>
                    </div>
                    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
