<?php
session_start();
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
<body style="background-color: #fff;background-image: url('images/bg-3.jpg');" >
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
