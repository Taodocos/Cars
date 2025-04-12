<?php
include('jcon.php');
$id= $_GET['id'];
if(isset($_POST['submit']))
{
    $fname=validate($_POST['fname']);
    $lname=validate($_POST['lname']);
    $email=validate($_POST['email']);
    $phone=validate($_POST['phone']);
    $myimage=validate($_POST['myimage']);

    $update = "update `users` set id=$id,fname='$fname',lname='$lname',email='$email',phone='$phone',image='$myimage' where id = $id";
    $query= mysqli_query($jcon, $update);
    if($query){
        echo "<script>alert('updated successfully!!!');</script>";
        echo "<script>window.location='carview.php';</script>";}}
function validate($data){
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    $data=trim($data);
    return $data;
    #include('session.php');

}
if(isset($_POST['reset']))
{
    $fname="";
    $lname="";
    $email="";
    $phone="";
    $myimage="";
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
        <div class="container-lg my-5 justify-content-center align-items-center">
            <h3 class="fw-bold display-6 text-center ">update information</h3>
            <div class="row my-12 align-items-center justify-content-center fw-light g-3 ">
                <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
                    <div class="card-border-0">
                        <div class="card-body text-center py-4">
                            <form method="post" action="">
                            <table>
                                <tr>
                                    <td><label  class="form-label " ><b>First name</b></label></td>
                                    <td><input type="text" class="form-control" value="<?php          //echo $fname; ?> " name="fname" id=""></td>
                                </tr>
                                <tr><td><label  class="form-label "><b>Last name</b></label></td>
                                    <td><input value="<?php #echo  $lname; ?> " type="text" class="form-control"   name="lname" id=""></td></tr>
                                <tr><td><label  class="form-label "><b>Email</b></label></td>
                                    <td><input type="email" class="form-control" value="<?php //echo $email; ?> "  name="email" id="" required x-moz-errormessage="Email is requred"></td></tr>
                                    <tr><td><label  class="form-label "><b>phone no</b></label></td>
                                    <td><input type="number" class="form-control" value="<?php//        echo  $phone; ?> "  name="phone" id=""></td></tr>
                                    <td><label for="insert the screen shoot"><b>Picture of car</b></label></td>
                                    <td> <input type="file" value="<?php // echo $myimage; ?> "  name="myimage" id="img" class="form-control"  accept=".JPG, .PNG, .JPEG,">
                             </td></tr>

                                <tr><td><button type="submit" class="btn btn-success width" name="submit">update</button></td>
                                    <td><button type="reset" class="btn btn-danger" name="reset">clear</button></td>
                                  
                                </tr>
                           </table>
                           </form>
                        </div>
                    </div>
</body>
</html>
