<?php
session_start();

ob_start();
if($_SESSION['type']!=0)
header("Location: login.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin dashboard </title>
	<link rel="stylesheet" type="text/css"
	 href="css/bootstrap.css">
</head>
<body style="background-color: #fff;" >
	 <nav class="navbar navbar-light" style="background-color: #616f67">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="images/bg-1.jpg" style="width: 80px;height: 60px;">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php" style="color: #ff4e00">Home</a></li>
      <li><a href="mp.php" style="color: #ff4e00"> <i class="glyphicon glyphicon-star"></i> Manage Projects</a></li>
      <li><a href="mu.php" style="color: #ff4e00"><i class="glyphicon glyphicon-print"></i> Manage Users</a></li>

      <li><a href="prorate.php" style="color: #ff4e00"><i class="glyphicon glyphicon-print"></i>project rating</a></li>
      <li><a href="adddoctor.php" style="color: #ff4e00">Add Doctor</a></li>
      <li><a href="admeals.php" style="color: #ff4e00"><i class="glyphicon glyphicon-edit"></i>Project Order</a></li>

 <li><a href="addproject.php" style="color: #ff4e00"><i class="glyphicon glyphicon-plus"></i> add Project </a></li>

    
    </ul>
    <ul class="nav navbar-nav navbar-right">
   
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
    </ul>
  </div>
</nav>


<?php
include'conn.php';

if(isset($_GET['id']))
$x=$_GET['id'];
$result=mysqli_query($con,"select * from users where id='$x'");

$row=mysqli_fetch_array($result);



?>
<div class="container">
  
<div class="well" style="width: 50%; margin: 30px auto;background-color: rgba(255,255,255,0.7);">
  <form action="edituser.php?id=<?php echo $x; ?>" method="post">
      <h1>Edit Account information</h1>
    <hr>
    <label>name : </label>
    <input type="text" class="form-control" id="e1" name="n" placeholder="enter name " 
    value="<?php echo $row['name'] ?>" ><br>
    <label>phone number : </label>
    <input type="number" class="form-control" name="ph" placeholder="enter phone " value="<?php echo $row['phone'] ?>" id="e1" ><br>
    <label>Section : </label>
    <input type="text" 
    placeholder="enter address " value="<?php echo $row['section'] ?>" class="form-control" name="adr" id="e1" ><br>
    <label>email : </label>
    <input type="email" value="<?php echo $row['email'] ?>" name="e" class="form-control" placeholder="enter email " id="e1" ><br>
    <label>password : </label>
    <input type="password" value="<?php echo $row['password'] ?>" class="form-control" name="ps" placeholder="enter password " id="e1" ><br>


     <input type="text" value="<?php echo $row['type'] ?>" class="form-control" name="tt" placeholder="enter password " id="e1" ><br>
    <input type="submit" class="btn btn-warning btn-lg" value="Edit information" name="bb" id="btn" >
    </form>
</div>

</div>


<?php

$na=isset($_POST['n'])?$_POST['n']:'';

$pho=isset($_POST['ph'])?$_POST['ph']:'';


$sec=isset($_POST['adr'])?$_POST['adr']:'';


$email=isset($_POST['e'])?$_POST['e']:'';


$pass=isset($_POST['ps'])?$_POST['ps']:'';


$t=isset($_POST['tt'])?$_POST['tt']:'';


if(isset($_POST['bb']))
{
  $oo=mysqli_query($con,"update users set
   name='$na',
   phone='$pho' ,
   email='$email' ,
   password='$pass',
   section='$sec',
   type='$t'   
  where id='$x'");

  if(isset($oo))
  {
    echo'<script>
alert("edit information successfully");
    </script>';
  }
}


?>