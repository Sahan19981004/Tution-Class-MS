<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["teacher_id"]))
  {
    
    echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
    
  } 
  
  
  $sql="SELECT * FROM teacher WHERE teacher_id={$_SESSION["teacher_id"]}";
    $res=$db->query($sql);

    if($res->num_rows>0)
    {
      $row=$res->fetch_assoc();
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

  	 <div class="col-sm-8 text-left"> 
      <h1>Welcome Teacher</h1>
      <hr>
      <br>
      


        <div class="content">
        
          <h3>Add Profile</h3><br>
          <div class="lbox1">
          <?php
            if(isset($_POST["submit"]))
            {
              
              $target="teacher/";
              /*
              $target_file=$target.basename($_FILES["img"]["name"]);
              
              if(move_uploaded_file($_FILES['img']['tmp_name'],$target_file))
              */
              {
                $sql="update teacher set tp_number='{$_POST["tp_number"]}',email='{$_POST["email"]}',address='{$_POST["address"]}' where teacher_id='{$_SESSION["teacher_id"]}'";
                $db->query($sql);
                echo "<div class='success'>Insert Success</div>";
              }
              
            }
          
          
          ?>
          
          
          
          
            
          <form  enctype="multipart/form-data" role="form"  method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
              <label> Contact No.</label><br>
              <input type="text" maxlength="10" required class="input" name="tp_number"><br><br>
              <label>  E - Mail</label><br>
              <input type="email"  class="input" required name="email"><br><br>
              <label>  Address</label><br>
              <textarea rows="5" name="address"></textarea><br><br>
              <!--
              <label> Image</label><br>
              <input type="file"  class="input" required name="img"><br><br>
            -->
            <button type="submit" class="btn" name="submit">Update Profile Details</button>
            </form>
          </div>
          
          
          
          
          <div class="rbox1">
          <h3> Profile</h3><br>
            <table border="1px">
              <!--
              <tr><td colspan="2"><img src="<?php echo $row["IMG"] ?>" height="100" width="100" alt="upload Pending"></td></tr>
               -->
              <tr><th>Firstname </th> <td><?php echo $row["firstname"] ?> </td></tr>
              <tr><th>Lastname </th> <td><?php echo $row["lastname"] ?> </td></tr>
              <tr><th>Gender </th> <td><?php echo $row["gender"] ?>  </td></tr>
              <tr><th>Address </th> <td> <?php echo $row["address"] ?>  </td></tr>
              <tr><th>DOB </th> <td> <?php echo $row["dob"] ?> </td></tr>
              <tr><th>E - Mail </th> <td> <?php echo $row["email"] ?> </td></tr>
              <tr><th>Contact No. </th> <td> <?php echo $row["tp_number"] ?> </td></tr>
            </table>
          </div>
        </div>
      </div>


    </div>
  </div>
</div> 
  <br>
  <?php       
      include 'footer.php';
      ?>

</body>
</html>