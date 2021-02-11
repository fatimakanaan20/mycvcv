<?php
session_start();


include'../conn.php';
$x1='';
if (isset($_GET['id'])) 
   $x1=$_GET['id'];

$r1=mysqli_query($con,"select * from projects where id='$x1'");
$dd=mysqli_fetch_array($r1);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="jquery.rateyo.css">
</head>
<body style="background-color: #cfcfcf;">
<div class="container">
            <h1 class="text-center text-info">Projects Rating System   </h1>

<form action="rs.php?id=<?php echo $x1; ?>" method="post">
        <div style="margin: 100px auto;width: 500px;height: 300px;background-color: #fafafa; border-radius: 10px;padding: 20px;border:2px solid #000;">
 <h1 class="text-center text-info">rate Project : <?php echo $dd['name']; ?> </h1>
        <hr>
    <div class="rateyo"
         data-rateyo-rating="0"
         data-rateyo-num-stars="5"
        ></div>
         
         <span class='result'>0</span>
         <input id="s" type="hidden" class="r" name="r">
         <hr>

         <input type="submit" name="rate" class="btn btn-primary btn-block" value="rate Project">

         <a href="../user.php">go back</a>
</div> 
</form>

</div>
<?php
$x=isset($_POST['r'])?$_POST['r']:'';

$myname=$_SESSION['n'];
$proname=$dd['name'];
$x=floatval(str_replace(',', '.', $x));

if(isset($_POST['rate']))
{
$t=mysqli_query($con,"select * from ratedpro where sname='$myname' and proname='$proname'");
if(mysqli_num_rows($t)>0)
{
echo'<script> alert("project rate is allready taken");</script>';
}
else{
       $z=mysqli_query($con,"insert into ratedpro(sname,proname,rate)values
    ('$myname','$proname','$x')");

if (isset($z)) {
   echo'<script> alert("rate project  done...!");</script>';
}
 
}

}

?>


<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="jquery.rateyo.js"></script>

<script type="text/javascript">
	 $(".rateyo").rateYo({
    ratedFill: "#E74C3C"
  });

	$(function () {
  $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
    var rating = data.rating;


  
    $(this).parent().find('.result').text('rating :'+ rating);
 
     $(this).parent().find('.r').attr('value',rating);
   });
});
</script>
</body>
</html>