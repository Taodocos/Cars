<!DOCTYPE HTML">
<html>
 <head>
 <link rel="stylesheet" href="styles/slide1.css" type="text/css"/>
 <link rel="stylesheet" href="mystyel2.css">
  <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="fontawsome/fontawesome-free-5.15.4-web/css/all.css">
  <link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
  <script src="bootstrap\js\bootstrap.min.js"></script>
  <script src="bootstrap\js\popper.min.js"></script>

 <?php 
    
    session_start();
    include_once("DBof-Gibi_conn.php");
   include_once("i-head.php");
    if(isset($_GET['logged']))
    {
        Header("location:home.php");
        session_destroy();
        
    }

                    $Today=date('y:m:d');
                    $new=date('l, F d, Y',strtotime($Today));
                    
                ?>


 </head>
 <body style="margin-top:10px; background-color:steelblue;">
 
    

<div class="container-fluid "  >
        <div class="row">
           <div class="col-md-5 mx-auto">
              <div class="card cardback"id="" style="margin-top:50px; background-color:azure;" >
                 <div class="card-body">
                    <div class="row">
                       <div class="col">
                          <center>
                          <img src="images\download.jfif" width="100" height="100" />
                          </center>
                       </div>
                    </div>
                     <div class="row">
                       <div class="col">
                          <center>
                             <h4>መግቢያ ገጽ</h4>
                          </center>
                       </div>
                    </div>
                    <div class="row">
                       <div class="col">
                          <hr>
                       </div>
                    </div>
                <form action="" method="POST">
                        <div class="row">
                         <div class="col">
                         <span class="icon-large icon-question-sign" style="color:green"></span>&nbsp;<label><b>USERNAME</b></label>
                          <div class="form-group">
                          <input  class="form-control" type="text" name="Username" placeholder="Username" required title="The input must be Alpahnumeric only " pattern="[A-Za-z0-9]+"></input>
                          </div>
                          <span class="icon-large icon-question-sign" style="color:" >&nbsp;<label><b>Password</b></label>
                          <div class="form-group">
                            <input type="password"  class="form-control"   id="password1"name="password" placeholder="password" required title="For password format (!@#$%^&*()*+=~`) Not allowed" pattren="[a-zA-Z]+" ></input>

                          </div> <br>
                        <div class="form-group">
                           <input class="btn btn-success btn-block btn-lg form-control" type="submit" name="login"  value="LOGIN NOW">&nbsp;
                           <input class="btn btn-secondary btn-block btn-lg form-control" type="submit" name="clear"  value="CLEAR">
                        </div>
                       </div>
                          
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
                                
                                $qr = mysqli_query($conn,$sql);  
                                $result = mysqli_num_rows($qr);
                                if($result>0)
                                {
                                    $flag=1; 
                                       
                                            $_SESSION["username"]=$username;
                                          
                                            if(isset($_SESSION["username"]))
                                            {       
                                                echo "<script>window.location='home1.php';</script>"; 
                                            }   else
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