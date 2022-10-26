<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["admin_id"]))
  {
    echo"<script>window.open('admin_login.php?mes=Access Denied..','_self');</script>";
    
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

      <img src="head.jpg" alt="head" width="100%" height="400px">

<div class="container-fluid text-center">    
  <div class="row content">
  	<?php
  	  include 'admin_sidebar.php';
  	  ?>

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Admin</h1>
      <hr>
      <br>
      <!--
      <h3>Education is the backbone of a nation</h3>
    -->
     <p>MEC Educational Center a is a complete management software designed to automate tuition center's diverse operations from attendance, exams to tuition events calendar.</p>

<p>This tuition software has a powerful online community to bring teachers and students on a common interactive platform. It is a paperless office automation solution for today's modern tuitions. The MEC Educational Center provides the facility to carry out all day to day activities of the tuition</p>
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>