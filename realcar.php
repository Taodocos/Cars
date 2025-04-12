<!DOCTYPE html>
<html>
<head>
	<?php 
	//include_once('header.php');
	session_start();
    if(isset($_GET['logged']))
	{
		Header("location:index.php");
		session_destroy();
		
	} //<link rel="stylesheet" href="styles/slide1.css" type="text/css"/>
 
 ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css"rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>car buying</title>
</head>
<body>
<section class="bg-light">
        <div class="container-lg my-5 justify-content-center align-items-center">
            <h3 class="fw-bold display-6 text-center ">Registered custemer to buy car</h3>
            <div class="row my-12 align-items-center justify-content-center fw-light g- 5">
                <div class="col-12 col-lg-8 col-xl-8 shadow bg-white">
                    <div class="card-border-0">
                        <div class="card-body text-center py-4">
<div class="container">
		<table id="example" class="table table-stripped">
						<thead>
							<tr>
								<th style="width:5;">ID</th>
								<th style="width:5;">Car Image</th>
								<th style="width:5;">Descriction</th>
								<th style="width:5;">Email</th>
								<th style="width:5;">Phone no</th>
								<th style="width:5;">Image</th>
							</tr>
						</thead>
                          <tbody>

<?php

   include("jcon.php");
#if(isset($_POST['view'])){   
#include("DBof-Gibi_conn.php");   
$select = mysqli_query($jcon, "select * from users"); 
while ($row = mysqli_fetch_assoc($select)) {
	$id=$row['id'];
	$fname = $row['fname'];
   $lname= $row['lname'];
	$email = $row['email'];
	$phone = $row['phone'];
	$myimage= $row['image'];
 {
 	echo'<tr>';
 	    echo'<th scope="row">'.$id.'';
		echo '<td>' . $fname . '</td>';
		echo '<td>' . $lname . '</td>';
		echo '<td>' . $email . '</td>';
		echo '<td>' . $phone  . '</td>';
		
		?>
		<td><img width="70" height="70" src='jj\<?php  echo $myimage;?>'></td>
		<td>
	<button class="btn btn-secondary"><a href="update.php?id=<?php echo   $id  ;?>" class="text-black">update</a></button>
	<td><button class="btn btn-danger"><a href="delete.php?id=<?php echo   $id  ;?>"class="text-black">delete</a></button>
</td>
		<?php
	}}
	    
	                          
?>

</tr>
</tbody>
</table>
</body>
</html>
	
	