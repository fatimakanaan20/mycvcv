<!DOCTYPE html>
<html>
<head>
	<title>Log In </title>
	<style type="text/css">
		body{
			background-image: url('images/bg-2.jpg');
background-repeat: no-repeat;background-size: cover;
		}

		.fadi{
			width: 400px;
			height: 470px;
		background-image: linear-gradient(#012300,#aecffa);
		margin: 140px auto;
		padding: 15px;
		border-radius: 10px;
		border:2px dashed yellow;
		text-align: center;
		}

		#e1{
			width: 100%;
			height: 33px;
			margin-bottom: 10px;
		}
		#btn{
			width: 200px;
			height: 35px;
			background-image: linear-gradient(#003311,#f8a0ec,red,blue);
			color: blue;
			padding: 10px;
			border-radius: 10px;
		}

		#btn:hover{
			background-color: white;
			color: blue;
			padding: 20px;
			border-radius: 30px;
			border:3px solid red;
			transition: 2s ease
		}
		.fadi h1{
			color: yellow;
			text-align: center;
			font-family: cursive; 
		}

		.fadi a{
			text-decoration: none;
			color: yellow;
			font-size: 19px;
			font-weight: bold;
			font-family: cursive; 
		}

		.fadi:hover{
			background-color: rgba(200,200,200,0.5);
			color: black;
			padding: 29px;
			transition: 1s ease;

		}


	</style>




</head>



<body >

	<div class="fadi">
		<form action="signup.php" method="post">
			<h1>Create Account </h1>
		<hr>
		<label>name : </label>
		<input type="text" id="e1" name="n" placeholder="enter name " ><br>
		<label>phone number : </label>
		<input type="number" name="ph" placeholder="enter phone " id="e1" ><br>
		<label>address : </label>
		<input type="text" 
		placeholder="enter address " name="adr" id="e1" ><br>
		<label>email : </label>
		<input type="email" name="e" placeholder="enter email " id="e1" ><br>
		<label>password : </label>
		<input type="password" name="ps" placeholder="enter password " id="e1" ><br>
		<input type="submit" value="LogIn" name="bb" id="btn" ><br>
		<a href="login.html">Back To Log in  </a>
		</form>

	</div>

</body>
</html>

<?php

include'conn.php';

$name=isset($_POST['n'])?$_POST['n']:'';

$phone=isset($_POST['ph'])?$_POST['ph']:'';

$address=isset($_POST['adr'])?$_POST['adr']:'';

$email=isset($_POST['e'])?$_POST['e']:'';

$pass=isset($_POST['ps'])?$_POST['ps']:'';
$pass=md5($pass);

if(isset($_POST['bb']))
{
	$rrr=mysqli_query($con,"insert into 
		users(name,email,password,section,phone,type)
		values(
		'$name',
		'$email',
		'$pass',
		'student',
		'$phone',
		2
	)");

	if(isset($rrr))
	{
		echo'
<script>alert("create account successfully");</script>
		';
	}

	else{
		echo'
<script>alert("create account failed");</script>
		';
	}
}

?>