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
      <li><a href="mp.php" style="color: #ff4e00"> <i class="glyphicon glyphicon-star"></i> View Projects</a></li>
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
if(isset($_GET['id']))
{
  $x=$_GET['id'];
  $tt=mysqli_query($con,"select * from projects where id='$x'");
  $row=mysqli_fetch_array($tt);
}


  ?>
  
  <div class="row">
<div class="col-md-3"></div>
                  <div class="col-md-6">
                    
          <div class="panel panel-warning">
                 <div class="panel-heading">
           <h1 class="text-center"><?php echo $row['name'];  ?> </h1>
                 </div>

      <div class="panel-body">
 <img src="uploadimages/<?php echo $row['image'];  ?>" style="width: 90%"> <br>
 <p>Descripe : <?php echo $row['description'];  ?></p>
 <h3>Student name :<?php echo $row['uname'];  ?></h3>
 <h4>Section : <?php echo $row['section'];  ?></h4>

 <p>Finish Date :<?php echo $row['dt'];  ?> </p>



        </div>

  <div class="panel-footer">
    <a href="projects/<?php echo $row['profile'];  ?>" download="projects/<?php echo $row['profile'];  ?>" class="btn btn-warning btn-lg">Download </a>
  </div>
             </div>
                    
              <div>






  
</div>
</div>
























<script type="text/javascript" src="js/jQuery.js"></script>

<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>