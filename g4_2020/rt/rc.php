<?php
session_start();


include'../conn.php';
$x1='';
$x2='';
if (isset($_GET['id']) && isset($_GET['c'])) 
  {$x1=$_GET['id'];
$x2=$_GET['c'];
  } 

$r1=mysqli_query($con,"select * from course where id='$x1' and cid='$x2'");
$dd=mysqli_fetch_array($r1);
#if(isset($_GET['course']))
   # $co=$_GET['course'];


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
            <h1 class="text-center text-info">Course and Teacher Rating    </h1>

<form action="rc.php?c=<?php echo $x2; ?>&id=<?php echo $x1; ?>" method="post">
        <div style="margin: 100px auto;width: 500px;height: 300px;background-color: #fafafa; border-radius: 20px;padding: 20px;border:2px solid #000;">
        <h1 class="text-center text-info">rate Course : <?php echo $dd['cid'] .'  '.$dd['cname'];  ?> </h1>
        <hr>
    <div class="rateyo"
         data-rateyo-rating="0"
         data-rateyo-num-stars="5"
         data-rateyo-score="4"></div>
         
         <span class='result'>0</span>
         <input id="s" type="hidden" class="r" name="r">
         <hr>

         <input type="submit" name="rate" class="btn btn-primary btn-block" value="rate Course">

         <a href="../student/EvaluationTeacher.php">go back</a>
</div> 
</form>

</div>
<?php
$x=isset($_POST['r'])?$_POST['r']:'';
#$sname=$dd['name'];
#$sid=$dd['uid'];
#$un=$dd['uname'];
#$tname=$_SESSION['name'];
#$tuid=$_SESSION['uid'];
#$tuname=$_SESSION['uname'];
$cid=$dd['cid'];
$cname=$dd['cname'];

$sname=$_SESSION['name'];
$suname=$_SESSION['uname'];
$sid=$_SESSION['uid'];
$x=floatval(str_replace(',', '.', $x));



if(isset($_POST['rate']))
{

$t=mysqli_query($con,"select * from pr where suid='$sid' and course='$cid'");
if(mysqli_num_rows($t)>0)
{

$t=mysqli_query($con,"select * from ratecourse where cid='$x2' and sid='$sid'");
if(mysqli_num_rows($t)>0)
{
echo'<script> alert("you have rated the course befor");</script>';
}
else{
  $f=mysqli_num_rows($t);
  echo $f;
       $z=mysqli_query($con,"insert into ratecourse(cid,cname,sname,sid,suname,rate)values
    ('$cid','$cname','$sname','$sid','$suname','$x')");

if (isset($z)) {
   echo'<script> alert("rate course done...!");</script>';
}
 
}

}

else{
  echo'<script> alert("you can not rate this course because you are not Join it");</script>';
}





}

?>


<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="jquery.rateyo.js"></script>

<script type="text/javascript">
	

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