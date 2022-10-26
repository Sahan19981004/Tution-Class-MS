<?php
  include"database.php";
  session_start();
  if(!isset($_SESSION["teacher_id"]))
  {
    echo"<script>window.open('teacher_login.php?mes=Access Denied..','_self');</script>";
    
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

  	 <div class="col-sm-9 text-left"> 
      <h1>Welcome Teacher</h1>
      <hr>
      <br>
      

<div class="col-md-12 col-lg-12">
      <form action="index.php" method="get" class="form-inline" id="subjectForm" data-toggle="validator">
        <div class="form-group">
          <label for="select" class="control-label">Subject:</label>
          <?php
                      
            $query_subjects = "SELECT subjects.subject_name, subjects.subject_id from subjects 
            INNER JOIN subject_teacher WHERE subject_teacher.subject_id = subjects.subject_id AND subject_teacher.teacher_id = {$_SESSION['teacher_id']}  ORDER BY subjects.subject_name";
            $sub=$conn->query($query_subjects);
            $rsub=$sub->fetchAll(PDO::FETCH_ASSOC);
            echo "<select subject_name='subjects' class='form-control' required='required'>";
            for($i = 0; $i<count($rsub); $i++)
            {
              if ($_GET['subjects'] == $rsub[$i]['id']) {
                echo"<option value='". $rsub[$i]['id']."' selected='selected'>".$rsub[$i]['subject_name']."</option>";
              }
              else {
                echo"<option value='". $rsub[$i]['id']."'>".$rsub[$i]['subject_name']."</option>";
              }
            }
            echo"</select>";
          ?>                  
        </div>

        <div class="form-group" data-provide="datepicker">
          <label for="select" class="control-label">Date:</label>
          <input type="date" class="form-control" name="date" value="<?php print isset($_GET['date']) ? $_GET['date'] : ''; ?>" required>
        </div>

        <button type="submit" class="btn btn-danger" style='border-radius:0%;' name="sbt_stn"><i class="glyphicon glyphicon-filter"></i> Load</button>
      </form>
        


      <?php
        if(isset($_GET['date']) && isset($_GET['subjects'])) :
      ?>
      
      <?php 
        $todayTime = time();
        $submittedDate = strtotime($_GET['date']);
        if ($submittedDate <= $todayTime) :
      ?>
      <form action="index.php" method="post">
      
      <div class="margin-top-bottom-medium">
        <button type="submit" class="btn btn-success btn-block" style='border-radius:0%;' name="sbt_top"><i class="glyphicon glyphicon-ok-sign"></i> Save Attendance</button>
      </div>
      
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">Roll</th>
            <th class="text-center">Student's Name</th>
            <th class="text-center"><input type="checkbox" class="chk-head" /> All Present</th>
          </tr>
        </thead>

        <?php
           $dat = $_GET['date'];
           $ddate = strtotime($dat);
           $sub=$_GET['subjects'];
          $que= "SELECT student_id, att_id, present  from attendance  WHERE date  =$ddate
          AND id=$sub ORDER BY student_id";
          $ret=$conn->query($que);
          $attData=$ret->fetchAll(PDO::FETCH_ASSOC);
          
          if(count($attData))
          {
            $updateFlag=1;
          }
          else{
            $updateFlag=0;

          }

          $qu = "SELECT student.student_id, student.firstname from student INNER JOIN subject_student WHERE student.student_id = subject_student.student_id AND subject_student.subject_id  = {$_GET['subjects']}  ORDER BY student.student_id";
          $stu=$conn->query($qu);
          $rstu=$stu->fetchAll(PDO::FETCH_ASSOC);

          
          echo"<tbody>";
          for($i = 0; $i<count($rstu); $i++)
          {
            echo"<tr>";

            if($updateFlag) {
              /*
              echo"<td>".$rstu[$i]['rollno']."<input type='hidden' name='st_sid[]' value='" . $rstu[$i]['sid'] . "'>" ."<input type='hidden' name='att_id[]' value='" . $attData[$i]['aid'] . "'>".  "</td>";
              */
              echo"<td>".$rstu[$i]['student_name']."</td>";

              
                if(($rstu[$i]['student_id'] ==  $attData[$i]['student_id']) && ($attData[$i]['present']))
                {

                  echo "<td><input class='chk-present' checked type='checkbox' name='chbox[]' value='" . $rstu[$i]['student_id'] . "'></td>";
                }
                else
                {
                  echo "<td><input class='chk-present' type='checkbox' name='chbox[]' value='" . $rstu[$i]['student_id'] . "'></td>";
                }
              }
              else {
                
                echo"<td>".$rstu[$i]['student_id']."<input type='hidden' name='st_student_id[]' value='" . $rstu[$i]['student_id'] . "'></td>";

                echo"<td>".$rstu[$i]['student_name']."</td>";
                echo"<td><input class='chk-present' type='checkbox' name='chbox[]' value='" . $rstu[$i]['student_id'] . "'></td>"; 
              }
              
              
            echo"</tr>";
          }
          echo"</tbody>";
        
        ?>
      </table> 

      <?php if($updateFlag) : ?>
        <input type="hidden" name="updateData" value="1">
      <?php else: ?>
        <input type="hidden" name="updateData" value="0">
      <?php endif; ?>

      <input type="hidden" name="date" value="<?php print isset($_GET['date']) ? $_GET['date'] : ''; ?>">
      <input type="hidden" name="subjects" value="<?php print isset($_GET['subjects']) ? $_GET['subjects'] : ''; ?>">
      <button type="submit" class="btn btn-success btn-block" style='border-radius:0%;' name="sbt_top"><i class="glyphicon glyphicon-ok-sign"></i> Save Attendance</button>
      
      </form>
      
      <?php
        else :
      ?>
      
      <p>&nbsp;</p>
      <div class="alert alert-dismissible alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Sorry!</strong> Attendance cannot be recorded for future dates!.
      </div>  
      
      <?php
        endif;
      ?>
      
      <?php endif;?>
      
      <?php

        if (isset($_POST['sbt_top'])) {
          if(isset($_POST['updateData']) && ($_POST['updateData'] == 1) ) {
              
            // prepare sql and bind parameters
          
              $subject_id = $_POST['subjects'];
              $teacher_id = $_SESSION['teacher_id'];
              $p = 0;
              $st_student_id =  $_POST['st_student_id'];
              $attt_att_id =  $_POST['att_id'];
              $present = array();
              if (isset($_POST['chbox'])) {
                $present =  $_POST['chbox'];  
              }
              
              for($j = 0; $j < count($st_student_id); $j++)
              {
                  //echo "hii";
                // UPDATE `attendance` SET `ispresent` = '1' WHERE `attendance`.`aid` = 79;

                  $stmtInsert = $conn->prepare("UPDATE attendance SET present = :isMarked WHERE att_id = :att_id"); 
                            
                  if (count($present)) {
                    $p = (in_array($st_student_id[$j], $present)) ? 1 : 0; 
                  }
                  
                  $stmtInsert->bindParam(':isMarked', $p);
                  $stmtInsert->bindParam(':att_id', $attt_att_id[$j]); 
                  $stmtInsert->execute();
                //echo "data upadted";
              }   
            echo '<p>&nbsp;</p><div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> Attendance Recorded Successfully!.
              </div>';  

          }
          else {
            
            // prepare sql and bind parameters
              $date = $_POST['date'];
            $tstamp = strtotime($date);
              $subject_id = $_POST['subjects'];
              $teacher_id = $_SESSION['teacher_id'];
              $p = 0;
              $st_student_id =  $_POST['st_student_id'];
              $present = array();
              if (isset($_POST['chbox'])) {
                $present =  $_POST['chbox'];  
              }
              
              for($j = 0; $j < count($st_student_id); $j++)
              {
                  //echo "hii";
                  $stmtInsert = $conn->prepare("INSERT INTO attendance (student_id, date, present, teacher_id, subject_id) 
                VALUES (:student_id, :date, :present, :teacher_id, :subject_id)");
                  
                  if (count($present)) {
                    $p = (in_array($st_student_id[$j], $present)) ? 1 : 0; 
                  }
                  

                  $stmtInsert->bindParam(':student_id', $st_student_id[$j]);
                  $stmtInsert->bindParam(':date', $tstamp);
                  $stmtInsert->bindParam(':present', $p);
                  $stmtInsert->bindParam(':teacher_id', $teacher_id);
                  $stmtInsert->bindParam(':subject_id', $subject_id); 
                  $stmtInsert->execute();
              //  echo "data upadted".$j;
            }
            echo '<p>&nbsp;</p><div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> Attendance Recorded Successfully!.
              </div>';  
          }
        }     
      ?>
    </div>





     
    </div>
  </div>
</div> 
  
  <?php       
      include 'footer.php';
      ?>

</body>
</html>