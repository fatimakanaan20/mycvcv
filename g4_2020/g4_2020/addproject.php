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
  <div class="well">


    <?php
    include'conn.php';

    $name=isset($_POST['n'])?$_POST['n']:'';
    $des=isset($_POST['des'])?$_POST['des']:'';
    $un=isset($_POST['un'])?$_POST['un']:'';
   

    $imagename=isset($_FILES['img']['name'])?$_FILES['img']['name']:'';
    $image=isset($_FILES['img']['tmp_name'])?$_FILES['img']['tmp_name']:'';


$dd=date("Y-m-d"
);

 $proname=isset($_FILES['pro']['name'])?$_FILES['pro']['name']:'';
    $pro=isset($_FILES['pro']['tmp_name'])?$_FILES['pro']['tmp_name']:'';



    $sec=isset($_POST['sec'])?$_POST['sec']:'';
    $dt=isset($_POST['dt'])?$_POST['dt']:'';
    $uid=isset($_POST['ide'])?$_POST['ide']:'';


        $im=$uid.'_'.$dd.'_'.$imagename;
    if(isset($_POST['btn']))
    {
    	

    



    	move_uploaded_file($image, "uploadimages/$im");
    	move_uploaded_file($pro, "projects/$proname");


$res=mysqli_query($con,"insert into
 projects(name,description,uname,image,section,profile,dt,uid)
    		values('$name','$des','$un','$im','$sec','$proname','$dt','$uid')");
      
if(isset($res))
{
	echo'
<div class="alert alert-success"> <h3>add project done</h3></div>
	';
}

else{
	echo'
<div class="alert alert-danger"> <h3>add project failed</h3></div>
	';
}


    }



    ?>
   
   <form action="addproject.php" method="POST"
    enctype="multipart/form-data">
   	<input placeholder="enter project name" type="text" name="n" class="form-control"><br>
   <label>enter project description</label>
   <textarea placeholder="enter project description" class="form-control" name="des"></textarea><br>
   <input placeholder="enter student name" type="text" name="un" class="form-control"><br>
   <label>selecty project image</label>
   <input type="file" name="img" class="form-control"><br>
   <input placeholder="enter section " type="text" name="sec" class="form-control"><br>
   <label>select projet</label>
   <input type="file" name="pro" class="form-control"><br>
   <input placeholder="choose date" type="date" name="dt" class="form-control"><br>
   <input placeholder="enter student ID" type="number" name="ide" class="form-control"><br>
   <input type="submit" name="btn" class="btn btn-warning btn-lg"><br>


   </form>









  </div>

</div>

