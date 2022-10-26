<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["admin_id"]))
  {
    echo"<script>window.open('admin_login.php?mes=Access Denied...','_self');</script>";
    
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

      <img src="head.jpg" alt="head" width="100%" height="400px"></a>

<div class="container-fluid text-center">    
  <div class="row content">
  	<?php
  	  include 'admin_sidebar.php';
  	  ?>

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Admin</h1>
      
     <h1 style=text-align:center>Delete Student</h1>

<div class="content">
        <h3 >View Student Details</h3><br>
          <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <div class="lbox1"> 
            <label>Student ID</label><br>
          <select name="stu_id" required class="input3">
        
            <?php 
               $sl="SELECT DISTINCT(student_id) FROM student";
              $r=$db->query($sl);
                if($r->num_rows>0)
                  {
                    echo"<option value=''>Select</option>";
                    while($ro=$r->fetch_assoc())
                    {
                      echo "<option value='{$ro["student_id"]}'>{$ro["student_id"]}</option>";
                    }
                  }
            ?>
          
          </select>
          <br><br>
            
        </div>
        
          <button type="submit" class="btn" name="view"> View Details</button>
        
            
          </form>
          <br>
          <div class="Output">
            <?php
              if(isset($_POST["view"]))
              {
                echo "<h3>Student Details</h3><br>";
                $sql="select * from student where student_id='{$_POST["stu_id"]}'";
                $re=$db->query($sql);
                if($re->num_rows>0)
                {
                  echo '
                    <table border="1px">
                     <tr>
                        <th>Student ID</th>
                        <th>Firstname</th> 
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th> DOB </th>
                        <th>Subject</th>
                        <th>Academic Year</th>
                        <th>T.P Number</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Delete</th>
    
                     </tr>
                  
                  
                  ';



                  /*
                  $i=0;
                  */
                  while($r=$re->fetch_assoc())
                  {
                    /*
                    $i++;
                    */
                    echo "
                    
                    <tr>
                    <td>{$r["student_id"]}</td>
                    <td>{$r["firstname"]}</td>
                    <td>{$r["lastname"]}</td>
                    <td>{$r["gender"]}</td>
                    <td>{$r["address"]}</td>
                    <td>{$r["dob"]}</td>
                    <td>{$r["subject"]}</td>
                    <td>{$r["academic_year"]}</td>
                    <td>{$r["tp_number"]}</td>
                    <td>{$r["email"]}</td>
                    <td>{$r["s_username"]}</td>
                    <td>{$r["s_password"]}</td>

                    <td><a href='student_delete.php?id={$r["student_id"]}' class='btnr'>Delete</a></td>

                    </tr>


                    ";
                    
                  }
                }
              else
              {
                echo "No record Found";
              }
                echo "</table>";
              }
            
            
            ?>
          
          </div>
        </div>

    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>