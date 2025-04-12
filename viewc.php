<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css"rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <title>car buying</title>
</head>
<body>
	
<section class="bg-light">
        <div class="container-lg my-5 justify-content-center align-items-center">
            <h3 class="fw-bold display-6 text-center ">To buy car register here</h3>
            <div class="row my-12 align-items-center justify-content-center fw-light g-8 ">
                <div class="col-8 col-lg-4 col-xl-5 shadow bg-white">
                    <div class="card-border-0">
                        <div class="card-body text-center py-4">
<div class="container">
		<table id="example" class="table table-stripped">
						<thead>
							<tr>
								<th style="width:5;">First name</th>
								<th style="width:5;">Last name</th>
								<th style="width:5;">Email</th>
								<th style="width:5;">Phone no</th>
								<th style="width:5;">Image</th>
							</tr>
						</thead>
                          <tbody>

<?php

   include("DBof-Gibi_conn.php");
if(isset($_POST['view'])){   
#include("DBof-Gibi_conn.php");   
$select = mysqli_query($conn, "select * from newstud"); 
while ($row = mysqli_fetch_array($select)) {
	
	$id = $row['id'];
    $name= $row['name'];
	$frname = $row['fathername'];
	$sex = $row['sex'];
	$spname = $row['religiousname'];
	$region= $row['region'];
	$zone = $row['zone'];
	$wereda = $row['woreda'];
	$abe = $row['church'];
	$kihnet=$row['ordination'];
	$phoneno = $row['phone'];
	$nearpname = $row['emergenceyname'];
	$nearpphone=$row['emergenceyphone'];
	$email = $row['email'];
	$photo= $row['myimage'];
	$year= $row['year'];
 {
 	echo'<tr>';
		echo '<td>' . $id . '</td>';
		echo '<td>' . $name . '</td>';
		echo '<td>' . $frname . '</td>';
		echo '<td>' . $sex  . '</td>';
		echo '<td>' . $spname . '</td>';
		echo '<td>' . $region . '</td>';
		echo '<td>' . $zone. '</td>';
		echo '<td>' . $wereda . '</td>';
		echo '<td>' . $abe . '</td>';
		echo '<td>' . $kihnet . '</td>';
		echo '<td>' . $phoneno . '</td>';
		echo '<td>' . $nearpname . '</td>';
		echo '<td>' . $nearpphone. '</td>';
		echo '<td>' . $email . '</td>';
		?>

</tr>
</tbody>
</table>
</body>
</html>
	
	