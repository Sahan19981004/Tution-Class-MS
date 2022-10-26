<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["teacher_id"]))
  {
    echo"<script>window.open('teacher_login.php?mes=Access Denied..','_self');</script>";
    
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

      <img src="tea.jpg" alt="head" width="100%" height="400px">

<div class="container-fluid text-center">    
  <div class="row content">
  	<?php
  	  include 'teacher_sidebar.php';
  	  ?>

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Teacher</h1>
      <hr>
      <br>
      <?php
          

          if(isset($_POST["submit"]))
              
              
              {
                $sq="insert into result(student_id,subject_id,subject_name,academic_year,grade) values('{$_POST["student_id"]}','{$_POST["subject_id"]}','{$_POST["subject_name"]}','{$_POST["academic_year"]}','{$_POST["grade"]}')";
                
                if($db->query($sq))
                {
                  echo '<script>alert("Record inserted Successfully");
                  window.location ="2add_result.php";</script>';
                }
                else
                {
                  echo '<script>alert("Something went wrong, try again....");
                  </script>';
                }
              }
                                 
          
          ?>


   <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">     
<label> Student ID</label><br>
<input type="text" name="student_id" required class="input"><br><br>
<label> Subject ID</label><br>
<input type="text" name="subject_id" required class="input"><br><br>
<label> Subject Name</label><br>
<input type="text" name="subject name" required class="input"><br><br>
<label>  Academic Year</label><br>
<input type="text" name="academic_year" required class="input"><br><br>
<label>  Grade</label><br>
<input type="text" name="grade" required class="input"><br><br>
<button type="submit" name="submit" class="btn">Add Result</button>


      </form>
     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>