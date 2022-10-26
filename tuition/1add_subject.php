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
					
						<h3 > Add Subject Details</h3><br>
						<?php
							if(isset($_POST["submit"]))
							{
								$sq="insert into subjects(subject_name,subject_fee) values ('{$_POST["subject_name"]}', '{$_POST["subject_fee"]}' )";
								if($db->query($sq))
								{
									echo '<script>alert("Record inserted Successfully");
									window.location ="1add_subject.php";</script>';
								}
								else
								{
									echo '<script>alert("Something went wrong, try again....");
									</script>';
								}
							}
						?>
						
						<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
							
							 
						   <label>Subject Name</label><br>
						   <input type="text" name="subject_name" required class="input"><br><br>
						   <label>Subject Fee</label><br>
						   <input type="text" name="subject_fee" required class="input"><br><br>
						   <button type="submit" class="btn" name="submit">Add Subject Details</button>
						</form>
				
				
					</div>
				
				
				<div class="tbox" >
					<h3 style="margin-top:30px;"> Subject Details</h3><br>
					<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>Subject ID</th>
							<th>Subject Name</th>
							<th>Subject Fee</th>
							<th>Delete</th>
						</tr>
						<?php
							$s="select * from subjects";
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
										<td>{$r["subject_id"]}</td>
										<td>{$r["subject_name"]}</td>
										<td>{$r["subject_fee"]}</td>
										<td><a href='subject_delete.php?id={$r["subject_id"]}' class='btnr'>Delete</a></td>
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
	</div>	
	<br>
	
				<?php 
					include'footer.php';
				?>
	</body>
</html>