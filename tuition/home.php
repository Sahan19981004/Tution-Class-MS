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
  <link rel="stylesheet" type="text/css" href="new.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div>
   <header>
    
    <p style="font-size: 26px; text-align: left; font-weight: bold;"><img src="logo2.jpg" alt="LOGO" width="100px" height="120px">   MEC Educational Center</p>
  </header>
</div>

<div class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="admin_login.php">Admin</a></li>
        <li><a href="teacher_login.php">Teacher</a></li>
        <li><a href="student_login.php">Student</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
      </ul>
       <!--
      <ul class="nav navbar-nav navbar-right">
        <div class="dropdown">
    <button class="dropbtn">Login 
    
      <i class="fa fa-caret-down"></i>
    
    </button>
    <div class="dropdown-content">
      <a href="#">Admin Login</a>
      <a href="#">Teacher Login</a>
      <a href="#">Student login</a>
    </div>
  </div>
      </ul>
      -->

</div>
</div>
</div>

   <img src="students.png" alt="students" width="100%" height="400px"></a>
<div class="contact">
  <div class="container-fluid text-center">    
  <div class="row content">

<div class="col-sm-4 text-left">
  <br>
  
  <img src="science.jpg" alt="sci" width="100%" height="200px"><br>
  <img src="comm.jpg" alt="com" width="100%" height="200px"><br>
  <img src="ict.jpg" alt="ict" width="100%" height="200px"><br>
</div>
<div class="col-sm-8 text-left">
  <h1>Welcome to MEC Educational Center</h1><br>
  <p style="font-size: 20px;">Welcome to MEC Educational Center. It is one of the most popular Sri Lankan Private Educational Institute which is located in the heart of the city of Badulla, surrounded by leading schools and university and approximately 2km to the city, Badulla, Sri Lanka. MEC Educational Center is based within more than one acre with modern buildings and class room facilities. With over 15 years of excellence, it is regarded as the pioneer tuition institute. MEC Educational Center facilitator is a home to Advanced Level group student population in Sri Lankan Education field.Here we have all 6 stream subjects.We provide our service throughout the year targeting different exams and services.</p>
  <p style="font-size: 20px;">Over the years, MEC Educational Center had the most renowned lecturers tutoring the mass student base who come to Rotary with the hope of excelling well in their Advanced Level exams. Living up to the expectations of the students, many of our lecturers were able to produce the district 1st and island best students.</p>

  <p style="font-size: 20px;" >Students If you want to get register for any subject in MEC Educational Center </p>
  <a style="font-size: 20px;" href="contact_us.php">Contact Us</a>

</div>
   
  </div>


 </div>
 </div>


     <?php       
      include 'footer.php';
      ?>

      <script src="js/jquery.js"></script>
     <script>
    $(document).ready(function(){
      $(".error").fadeTo(1000, 100).slideUp(1000, function(){
          $(".error").slideUp(1000);
      });
      
      $(".success").fadeTo(1000, 100).slideUp(1000, function(){
          $(".success").slideUp(1000);
      });
    });
  </script>
    

</body>
</html>
