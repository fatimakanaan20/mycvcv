<?php
session_start();

$_SESSION['type']='';

?>

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
			height: 270px;
			background-color: rgba(0,0,0,0.7);
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
			background-color: lightblue;
			color: blue;
			padding: 10px;
			border-radius: 10px;
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


	</style>




</head>



<body >

	<div class="fadi">
		<?php
		include'conn.php';
		$x=isset($_POST['e'])?$_POST['e']:'';
		$y=isset($_POST['p'])?$_POST['p']:'';



		$z=md5($y);
		if(isset($_POST['btn']))
		{
			$rr=mysqli_query($con,"select * from users where email='$x' and password='$z'");
			if(mysqli_num_rows($rr) > 0)
			{
				$t=mysqli_fetch_array($rr);

				$_SESSION['n']=$t['name'];
				if($t['type']==0)
				{
					$_SESSION['type']=$t['type'];

					header("Location: admin.php");


				}

			if($t['type']==2)
				{$_SESSION['type']=$t['type'];
					header("Location: user.php");
		}

			}
			else{
				echo'<h1 style="color: red"> you are not a member</h1>';

		}
		}




		?>
		<h1>Join Us</h1>
		<hr>

	<form action="login.php" method="post">
		<input type="email" name="e" id="e1" ><br>
		<input type="text" name="p" id="e1" ><br>
	
		<input type="submit" name="btn" value="LogIn" id="btn" ><br>
		<a href="signup.html">Not Memeber ? Create new  account </a>
	</form>

	</div>

</body>
</html>