<?php
session_start();
if($_SESSION['type']!=2)
header("Location: login.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>usere home </title>

	<link rel="stylesheet" type="text/css"
	 href="css/bootstrap.css">
</head>
<body style="background-color: #eee">

	<nav class="navbar navbar-light" style="background-color: #616f67">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="images/bg-1.jpg" style="width: 80px;height: 60px;">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php" style="color: #ff4e00">Home</a></li>
      <li><a href="user.php" style="color: #ff4e00"> <i class="glyphicon glyphicon-star"></i> View Projects</a></li>
      <li><a href="mu.php" style="color: #ff4e00"><i class="glyphicon glyphicon-print"></i> Add Project</a></li>

      <li><a href="prorate.php" style="color: #ff4e00"><i class="glyphicon glyphicon-print"></i> Rate project</a></li>
     
      <li><a href="admeals.php" style="color: #ff4e00"><i class="glyphicon glyphicon-edit"></i>Order Project</a></li>



    
    </ul>
    <ul class="nav navbar-nav navbar-right">
   
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
    </ul>
  </div>
</nav> 



<div class="container">
<form action="order.php" method="post">
    <div class="alert alert-warning text-center" >
  <h1>Get Your Owne Project</h1>
<label>Project Description :</label>
  <textarea class="form-control" name="d"></textarea><br>
  <label>Collage Name :</label>
  <input  type="text" class="form-control" name="c"><br>
  <button type="submit" name="btn"  class="btn btn-warning btn-lg"> Get It Now</button>
</form>
</div>









</div>
 

 <?php

include'conn.php';
$des=isset($_POST['d'])?$_POST['d']:'';
$collage=isset($_POST['c'])?$_POST['c']:'';

$dt=date("Y-m-d");

if(isset($_POST['btn']))
{
  $r=mysqli_query($con,"insert into newpro(stuname,description,dt,col)values('".$_SESSION['n']."','$des','$dt','$collage')");

  if(isset($r))
  {
     echo'
<script>alert(" submit done ");</script>
    ';
  }

  else{
     echo'
<script>alert("submit fail");</script>
    ';
  }
}

 ?>























<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>