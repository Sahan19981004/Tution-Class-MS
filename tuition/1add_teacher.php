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
					<h3 > Add Teacher Details</h3><br>
								
			   <br><br>
																			
					<?php
					

          if(isset($_POST["submit"]))
							{
							$edate=$_POST["dob"];
							$target="teacher/";
							$textareaValue=$_POST["address"];
							$gender=$_POST['gender'];
							/*
							$target_file=$target.basename($_FILES["img"]["name"]);
							if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
							*/
							{
								$sq="insert into teacher(firstname,lastname,subject,gender,address,dob,email,tp_number,t_username,t_password) values('{$_POST["firstname"]}','{$_POST["lastname"]}','{$_POST["subject"]}','{$_POST["gender"]}','{$_POST["address"]}','{$edate}','{$_POST["email"]}','{$_POST["tp_number"]}','{$_POST["t_username"]}','{$_POST["t_password"]}')";
								
								if($db->query($sq))
								{
									echo '<script>alert("Record inserted Successfully");
									window.location ="1add_teacher.php";</script>';
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
					     <label>Subject</label><br>
					     <input type="text" name="subject" required class="input">
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
					     <label>E-mail</label><br>
					     <input type="email" name="email" required class="input">
					     <br><br>
					     <label>Contact No.</label><br>
					     <input type="phone" name="tp_number" maxlength="10" required class="input">
					     <br><br>
					     	<label>Username</label><br>
					     <input type="text" required class="input" name="t_username">
					     <br><br>
					     <label>Password</label><br>
					     <input type="password" name="t_password" required class="input">			 
					     <br><br>			 
					     <input type="reset" value="Reset">
					     <button type="submit" class="btn" name="submit">Add Teacher Details</button>
					</form>
				
				
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





                       