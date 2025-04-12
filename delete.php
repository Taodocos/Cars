<?php
include 'jcon.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	//$sql= "delete from users where 'deleteid' = '$id' ";
	$sql= "DELETE from `users` where id = $id";
	$result = mysqli_query($jcon,$sql);
	if ($result) {
		// code...
		echo "<script>alert('successfully Deleted')</script>";
		 echo "<script>window.location='carview.php';</script>";
	}
	else{
		die(mysqli_error(jcon));
	}
}
#`buycar`
?>
