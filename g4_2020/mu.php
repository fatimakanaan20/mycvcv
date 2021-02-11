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






<div class="container">
  <h1 class="text-danger text-center bg-warning">All User Data</h1>
<hr>


<table class="table">
 
<tr>

  <th>name</th>
  <th>phone</th>

  <th>email</th>
  <th>password</th>
  <th>section</th>
  <th>type</th>
  <th>delete</th>
  <th>update</th>
</tr>


<?php

include'conn.php';

$r=mysqli_query($con,"select * from users");
while($row=mysqli_fetch_array($r))
{
echo'
<tr>


<td>'.$row['name'].'</td>

<td>'.$row['phone'].'</td>



<td>'.$row['email'].'</td>

<td>'.$row['password'].'</td>

<td>'.$row['section'].'</td>

<td>'.$row['type'].'</td>


<td><a href="mu.php?fadi='.$row['id'].'" class="btn btn-danger btn-sm"> 
<i class="glyphicon glyphicon-trash "></i> </a> </td>


<td><a href="edituser.php?id='.$row['id'].'" class="btn btn-info btn-sm"> <i class="glyphicon glyphicon-pencil "></i> </a> </td>
</tr>

';
}



if(isset($_GET['fadi']))
{
  $xx=$_GET['fadi'];

  mysqli_query($con,"delete from users where id='$xx'");

  header("Location: mu.php");
}
?>



</table>









</div>

<?php
ob_end_flush();

?>