<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css"rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>
    <?php 
   
   session_start();
   include_once("jcon.php");
   #include_once("1stpage.html");
    if(isset($_GET['logged']))
   {
      Header("location:1stpage.html");
      session_destroy();
      
   }

               $Today=date('y:m:d');
               $new=date('l, F d, Y',strtotime($Today));
               
            ?>


 </head>
    <title>log in</title>

</head>
<body>
<section class="bg-light">
        <div class="container-lg my-5 justify-content-center align-items-center">
            <h3 class="fw-bold display-6 text-center ">LOG IN</h3>
            <div class="row my-12 align-items-center justify-content-center fw-light g-3 ">
                <div class="col-8 col-lg-4 col-xl-3 shadow bg-white">
                    <div class="card-border-0">
                        <div class="card-body text-center py-4">
 
                         <form method="Post" action="">
 
	

<table>
                                <tr>
                                    <td><label  class="form-label "><b>User name</b></label></td>
                                    <td><input type="text" class="form-control" name="Username" id=""></td>
                                </tr>
                                <tr><td><label  class="form-label "><b>Password</b></label></td>
                                    <td><input type="text" class="form-control" name="password" id=""></td></tr>
                                

                                <tr><td><button type="submit" class="btn btn-success width" name="login">Login</button></td>
                                    <td><button type="reset" class="btn btn-danger" name="reset">clear</button></td>
                                  
                                </tr>
                           </table>
                           </form>
					 </div>
                    </div>
                    </div>
                    </div>
                      
      
					<?php 
					
        $flag=0;
        if(isset($_POST['login']))
        {
            $username=$_POST['Username'];
            $password=($_POST['password']);//md5 tetekem mechersha lay
			//echo $password;
            
            $sql = "select * from account where username ='$username' AND password='$password'";
                                
								$qr = mysqli_query($jcon,$sql);  
								$result = mysqli_num_rows($qr);
        		                if($result>0)
                                {
                                    $flag=1; 
                                       
											$_SESSION["username"]=$username;

                                          
											if(isset($_SESSION["username"]))
											{       
												echo "<script>window.location='owner.php';</script>"; 
											}	else
											{
												echo("not exist");
											}	
								            }
                                    else{
                                         
											 ?>
											<div class="alert alert-danger" style="width: 300px margin-bottom: 100px;">
                                            <a href="Login.php" class="close" ></a>
                                            <h4 style="color:red;">Incorrect Username or Password</h4>
                                            </div>
											<?php
													
													
																			
							                        }}
							                    ?> 
												         </div>  

	
 
                                                                         
</body>
</html>