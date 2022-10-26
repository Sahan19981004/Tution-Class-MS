<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["student_id"]))
  {
    echo"<script>window.open('student_login.php?mes=Access Denied..','_self');</script>";
    
  }   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="one.css">
</head>
<body>

<?php       
      include 'navbar.php';
      ?>

     <img src="stu.jpg" alt="head" width="100%" height="400px">

<div class="container-fluid text-center">    
  <div class="row content">
  	<?php
  	  include 'student_sidebar.php';
  	  ?>
s
  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Student</h1>
      <hr>
      <br>
      <h3>Education is the backbone of a nation</h3>
     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>