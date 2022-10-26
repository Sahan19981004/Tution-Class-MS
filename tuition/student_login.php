<?php
  include"database.php";
  session_start();
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
  <link rel="stylesheet" type="text/css" href="two.css">
</head>
<body style="background-color: #dbf9db;">

<?php       
      include 'navbar.php';
      ?>
      <br>
      <div id="center">
      <img src="student.png" alt="student" class="avatar" width="200px" height="300px">
      </div>
        

  	 
      
      <div class="login">
      <h1 class="heading">Student Login</h1><br>
      <div class="log">
      <?php
        if(isset($_POST["login"]))
        {
          $sql="select * from student where s_username ='{$_POST["s_username"]}' and s_password='{$_POST["s_password"]}'";
          $res=$db->query($sql);
          if($res->num_rows>0)
          {
            $ro=$res->fetch_assoc();
            $_SESSION["student_id"]=$ro["student_id"];
            $_SESSION["s_username"]=$ro["s_username"];
            echo "<script>window.open('student_home.php','_self');</script>";
          }
          else
          {
            echo "<div class='error'>Invalid Username or Password</div>";
          }
          
        }
        if(isset($_GET["mes"]))
        {
          echo "<div class='error'>{$_GET["mes"]}</div>";
        }
        
      ?>
    
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
          <label>User Name</label><br>
          <input type="text" name="s_username" required class="input"><br><br>
          <label>Password </label><br>
          <input type="password" name="s_password" required class="input"><br><br>
          <button type="submit" class="btn" name="login">Login Here</button>
        </form>
      </div>
    </div>
     <br>
    
  
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