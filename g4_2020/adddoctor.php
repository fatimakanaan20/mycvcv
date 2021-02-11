<?php
include'adminheader.php';

?>



<div class="container">
  
<div class="well" style="width: 50%; margin: 30px auto;background-color: rgba(255,255,255,0.7);">
  <form action="adddoctor.php" method="post">
      <h1>Create Account </h1>
    <hr>
    <label>name : </label>
    <input type="text" class="form-control" id="e1" name="n" placeholder="enter name " ><br>
    <label>phone number : </label>
    <input type="number" class="form-control" name="ph" placeholder="enter phone " id="e1" ><br>
    <label>address : </label>
    <input type="text" 
    placeholder="enter address " class="form-control" name="adr" id="e1" ><br>
    <label>email : </label>
    <input type="email" name="e" class="form-control" placeholder="enter email " id="e1" ><br>
    <label>password : </label>
    <input type="password" class="form-control" name="ps" placeholder="enter password " id="e1" ><br>
    <input type="submit" class="btn btn-warning btn-lg" value="add doctor" name="bb" id="btn" >
    </form>
</div>

</div>






<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

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
    'doctor',
    '$phone',
   1
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


