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
  <link rel="stylesheet" type="text/css" href="p1.css">
</head>
<body>

<?php       
      include 'navbar.php';
      ?>

      <img src="head.jpg" alt="head" width="100%" height="400px"></a>

<div class="container-fluid text-center">    
  <div class="row content">
  	<?php
  	  include 'student_sidebar.php';
  	  ?>

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Student</h1><br><hr><br>
          <div class="content1">
            <div class="col-sm-6 text-left">
      
     

<h3 > Make Payment</h3><br>
            <?php
            if(isset($_POST["PAY NOW"]))
            {
              $edate1=$_POST["Total Fees"];
              $edate2=$_POST["academic_year"];
              $target="payment details/";

              
              {
                $sq="insert into Payment details(Full Name,ID_No,Email Address,Date of Birth,Gender,Subject,Academic Year,Total Fees) values('{$_POST["Full Name"]}','{$_POST["ID_No"]}','{$_POST["Email Address"]}','{$_POST["Date of Birth"]}','{$_POST["Gender"]}','{$_POST["Subject"]}','{$_POST["Academic Year"]}','{$_POST["Total Fees"]}')";
                
                if($db->query($sq))
                {
                  echo '<script>alert("Record inserted Successfully");
                  window.location ="3make_payment.php";</script>';
                }
                else
                {
                  echo '<script>alert("Something went wrong, try again....");
                  </script>';
                }
              }
              
            }
                    
          ?>

          <div class="wrapper">
    <h2>Payment Form</h2>
    <form action="Add_payment.php" method="POST">
      <h4>Student</h4>
      <div class="input-group">
        <div class="input-box">
          <input type="text" placeholder="Full Name" required class="name">
        </div>

        <div class="input-box">
          <input type="text" placeholder="Id_No" required class="name">
        </div>
      </div>



      <div class="input-group">
        <div class="input-box">
          <input type="email" placeholder="Email Address" required clas="name">
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
          <h4>Date of Birth</h4>
          <input type="text" placeholder="DD" class="dob">
          <input type="text" placeholder="MM" class="dob">
          <input type="text" placeholder="YYYY" class="dob">
        </div>
      </div>

        <div class="input-group">
        <div class="input-box">
          <h4>Gender</h4>
          <input type="radio" id="b1" name="gender" checked class="radio">
          <label for="b1">Male</label>
          <input type="radio" id="b2" name="gender" class="radio">
          <label for="b2">Female</label>
        </div>
      </div>

      <h4>Study</h4>
      <div class="input-group">
        <div class="input-box">
          
          <input type="text" placeholder="Subject" required class="name">
        </div>

        <div class="input-box">
          <input type="text" placeholder="Academic Year" required class="name">
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
          <h4>Payment Details</h4>
          
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
          <input type="tel" placeholder="Total Fees" required class="name">
        </div>
      </div>

      <b>
      <label >Attach slip</label></b>
      <p><input type="file" name="file"/></p>

      <div class="input-group">
        <div class="input-box">
        <button type="submit">PAY NOW</button>
        </div>
      </div>

    </form>
  </div>

  <?php       
      include 'includes/footer.php';
      ?>
</body>
</html>
            
  