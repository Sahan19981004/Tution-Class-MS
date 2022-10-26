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
      <table id="t01">
  <tr>
    <th>Student ID</th>
    <th>Subject ID</th> 
    <th>Subject name</th>
    <th>Academic Year</th>
    <th>Grade</th>
    
  </tr>
 
 <?php
              $s="select * from result";
              $res=$db->query($s);
              if($res->num_rows>0)
              {
                /*
                $i=0;
                */
                while($r=$res->fetch_assoc())
                {
                  /*
                  $i++;
                  */
                  echo "
                    <tr>
                    <td>{$r["student_id"]}</td>
                    <td>{$r["subject_id"]}</td>
                    <td>{$r["subject_name"]}</td>
                    <td>{$r["academic_year"]}</td>
                    <td>{$r["grade"]}</td>
                    </tr>
                  
                  ";
                  
                }
                
              }
              else
              {
                echo "No Record Found";
              }
            ?>
</table>

     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>