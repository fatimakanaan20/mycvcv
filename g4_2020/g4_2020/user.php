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
     
      <li><a href="orderpro.php" style="color: #ff4e00"><i class="glyphicon glyphicon-edit"></i>Order Project</a></li>



    
    </ul>
    <ul class="nav navbar-nav navbar-right">
   
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
    </ul>
  </div>
</nav> 

<div class="container">

	<?php
	include'conn.php';
	$r=mysqli_query($con,"select * from projects where type='free'");

if(mysqli_num_rows($r) >0 )
{
	while($row=mysqli_fetch_array($r))
	{

$ss=mysqli_query($con,"select * from ratedpro where proname='".$row['name']."'");
$c='';
$sum=0;
while($qr=mysqli_fetch_array($ss))
{

$sum=$sum+$qr['rate'];
$c=$c+1;

}

$finalrate=$sum/$c;



















		echo'
		<div class="col-md-4">


		<div class=" panel-warning" style="background-color:white;border-radius:10px;border:1px solid orange;padding:10xp">
		<div  class="panel-heading">
		<h2> '.$row['name'].'</h2>
		<h2 class="text-danger">'.$finalrate.'</h2>

		</div>
		<div class="panel-body">
		<img src="uploadimages/'.$row['image'].'" style="width:100%;height:200px">

		<h3> '.$row['uname'].'</h3>

		</div>
		<div class="panel-footer">
<a href="details.php?id='.$row['id'].'" class="btn btn-warning"> read more</a>


<a href="rt/rs.php?id='.$row['id'].'" class="btn btn-primary"> Rate</a>

		</div>

		</div>





		</div>








		';


	}







}


	?>
	






</div>

















<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>