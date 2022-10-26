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

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Student</h1>
      <hr>
      <br>
      <h3>Post Complaint and Recommendation</h3>
      <form>
        <br>
      <div class="content1">
          
          
           <?php
          

          if(isset($_POST["submit"]))
              {
      
               /*
              $target="complaint_recom/";
              $textareaValue=$_POST["complaint"];
             */
              {
                $sq="insert into complaint_recom(title,complaint) values('{$_POST["title"]}','{$_POST["complaint"]}')";
                
                if($db->query($sq))
                {
                  echo '<script>alert("Record inserted Successfully");
                  window.location ="3post_complaint.php";</script>';
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
               
               <label>Title</label><br>
               <input type="text" name="title" required class="input">
               <br><br>
               <label>Complaint and recommendation</label><br>
               <textarea rows="5" cols="15" placeholder="Enter your complaint and recommendation"  name="complaint" required></textarea>
               <br><br>
               
               <input type="reset" value="Reset">
               <button type="submit" class="btn" name="submit">Submit</button>
          </form>
        
        
        
          </div>
      
   <br><br>
     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>