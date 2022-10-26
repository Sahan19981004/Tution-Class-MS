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
      <hr>
      <div class="content1">
          
            <h3 > Change Password</h3><br>
            <?php
              if(isset($_POST["submit"]))
              {
                $sql="select * from admin where a_password='{$_POST["o_password"]}' and admin_id='{$_SESSION["admin_id"]}'";
                $result=$db->query($sql);
                if($result->num_rows>0)
                {
                  if($_POST["n_password"]==$_POST["c_password"])
                  {
                    $s="update admin SET a_password='{$_POST["n_password"]}' where admin_id='{$_SESSION["admin_id"]}'";
                    $db->query($s);
                    echo "<div class='success'>Password Changed</div>";
                  }
                  else
                  {
                    echo "<div class='error'>Password Mismatch</div>";
                  }
                }
                else
                {
                  echo "<div class='error'>Invalid Password</div>";
                }
              }
            
            
            ?>
            
              
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <label>Old Password</label><br>
            <input type="text" class="input3" name="o_password"><br><br>
            <label>New Password</label><br>
            <input type="text" class="input3" name="n_password" required=""><br><br>
            <label>Confirm Password</label><br>
            <input type="text" class="input3" name="c_password"><br><br>
            <button type="submit" class="btn" style="float:left" name="submit"> Change Password</button>
          </form>
      
        </div>
     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>