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
		<title>MEC Educational Center </title>
		
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

			<div class="col-sm-8 text-left"> 

					<h1 class="text">Welcome Admin</h1><br><hr><br>
					<div class="content1">
						<div class="col-sm-6 text-left">
					
						<h3 > Add Student Details</h3><br>
						<?php
						if(isset($_POST["submit"]))
						{
							$edate1=$_POST["dob"];
							$edate2=$_POST["academic_year"];
							$target="student/";

							
							{
								$sq="insert into student(firstname,lastname,gender,address,dob,subject,academic_year,tp_number,email,s_username,s_password) values('{$_POST["firstname"]}','{$_POST["lastname"]}','{$_POST["gender"]}','{$_POST["address"]}','{$edate1}','{$_POST["subject"]}','{$edate2}','{$_POST["tp_number"]}','{$_POST["email"]}','{$_POST["s_username"]}','{$_POST["s_password"]}')";
								
								if($db->query($sq))
								{
									echo '<script>alert("Record inserted Successfully");
									window.location ="1add_student.php";</script>';
								}
								else
								{
									echo '<script>alert("Something went wrong, try again....");
									</script>';
								}
							}
							
						}
										
					?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					     <label>First Name</label><br>
					     <input type="text" name="firstname" required class="input">
					     <br><br>
					     <label>Last Name</label><br>
					     <input type="text" name="lastname" required class="input">
					     <br><br>
					     <label>Gender</label><br>
					     <input type="radio" name="gender" value="Male" required="">Male
               <input type="radio" name="gender" value="Female">Female
					     <br><br>
					     <label>Address</label><br>
					     <textarea rows="5" cols="15" placeholder="address"  name="address" required></textarea>
					     <br><br>
					     <label>DOB</label><br>
					     <input type="date" required class="input" name="dob">
					     <br><br>
					     <label>Subject</label><br>
					     <input type="text" name="subject" required class="input">
					     <br><br>
					     <label> Academic Year </label><br>
					     <select name="academic_year" class="input5">
						   <option value="">Select Year</option>
						   <option value="2020">2020</option>
						   <option value="2021">2021</option>
						   <option value="2022">2022</option>
						   <option value="2023">2023</option>
						   <option value="2024">2024</option>
						   <option value="2025">2025</option>
						   <option value="2026">2026</option>
						   <option value="2027">2027</option>
						   <option value="2028">2028</option>
						   <option value="2029">2029</option>
						   <option value="2030">2030</option>
					     </select><br><br>
					     <label>Contact No.</label><br>
					     <input type="phone" name="tp_number" maxlength="10" required class="input">
					     <br><br>
					     <label>E-mail</label><br>
					     <input type="email" name="email" required class="input">
					     <br><br>	
					     	<label>Username</label><br>
					     <input type="text" required class="input" name="s_username">
					     <br><br>
					     <label>Password</label><br>
					     <input type="password" name="s_password" required class="input">
					     <br><br>  					 
					     <input type="reset" value="Reset">
					     <button type="submit" class="btn" name="submit">Add Student Details</button>
					</form>


				

        </div>
        <div class="col-sm-6 text-left">

         <h3>Add Subjects to the Student</h3>


         <?php
						if(isset($_POST["submit"]))
						{
							/*
							$edate1=$_POST["dob"];
							$edate2=$_POST["academic_year"];
							$target="student/";
               */
							
							
								$sq="insert into subject_student(subject_id,student_id) values('{$_POST["subject_id"]}','{$_POST["student_id"]}')";
								
								if($db->query($sq))
								{
									echo '<script>alert("Record inserted Successfully");
									window.location ="1add_student.php";</script>';
								}
								else
								{
									echo '<script>alert("Something went wrong, try again....");
									</script>';
								}
							
							
						}
										
					?>






          <form  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <div class="lbox1"> 
            <label>Student ID</label><br>
            <select name="student_id" required class="input3">
        
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
        
        <div class="lbox1"> 
            <label>Subject ID</label><br>
            <select name="subject_id" required class="input3">
        
            <?php 
               $sl="SELECT DISTINCT(subject_id) FROM subjects";
              $r=$db->query($sl);
                if($r->num_rows>0)
                  {
                    echo"<option value=''>Select</option>";
                    while($ro=$r->fetch_assoc())
                    {
                      echo "<option value='{$ro["subject_id"]}'>{$ro["subject_id"]}</option>";
                    }
                  }
            ?>
          
          </select>
          <br><br>
            
        </div>

        
        </div>

          <button type="submit" class="btn" name="submit"> Submit</button>
        
            
          </form>


       </div>
				</div>

			</div>
		</div>	
	</div>	
	<br>
	
				<?php 
					include'footer.php';
				?>
	</body>
</html>