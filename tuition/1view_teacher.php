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
      
     <h1 style=text-align:center>View Teacher</h1>
       
<table id="t01">
  <tr>
    <th>Teacher ID</th>
    <th>Firstname</th> 
    <th>Lastname</th>
    <th>Subject</th>
    <th>Gender</th>
    <th>Address</th>
    <th> DOB </th>
    <th>T.P Number</th>
    <th>Email</th>
    
  </tr>
 
 <?php
              $s="select * from teacher";
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
                    <td>{$r["teacher_id"]}</td>
                    <td>{$r["firstname"]}</td>
                    <td>{$r["lastname"]}</td>
                    <td>{$r["subject"]}</td>
                    <td>{$r["gender"]}</td>
                    <td>{$r["address"]}</td>
                    <td>{$r["dob"]}</td>
                    <td>{$r["tp_number"]}</td>
                    <td>{$r["email"]}</td>
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