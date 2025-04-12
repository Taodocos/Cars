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
        <div class="container-lg my-5 justify-content-center align-items-center">
            <h3 class="fw-bold display-6 text-center ">update car information</h3>
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
</body>
</html>
