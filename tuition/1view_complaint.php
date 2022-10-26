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
      <h3>View Complaint and Recommendation</h3>
      

<div class="tbox" >
          
          <?php
            if(isset($_GET["mes"]))
            {
              echo"<div class='error'>{$_GET["mes"]}</div>";  
            }
          
          ?>
          <table border="1px" >
            <tr>
              <th>Complaint ID</th>
              <th>Complaint & Recommendation</th>
            </tr>
            <?php
              $s="select * from complaint_recom";
              $res=$db->query($s);
              if($res->num_rows>0)
              {
                $i=0;
                while($r=$res->fetch_assoc())
                {
                  $i++;
                  echo "
                    <tr>
                    <td>{$i}</td>
                    <td>{$r["complaint"]}</td>
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
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>