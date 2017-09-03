<?php  
 $connect = mysqli_connect("localhost", "root", "", "gi_register");  
?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>GLOBAL INFOTECH | ADMIN-PANEL</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
          
          
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          
          
      </head>  
      <body>
          
          
          <!-- OVERALL Table -->
          
          
          <?php
            $query5 = "SELECT * FROM `registration`, `student`, `course`, `payment` WHERE student.student_id = registration.student_id AND registration.course_id = course.course_id AND registration.reg_no = payment.reg_no";
            $result5 = mysqli_query($connect, $query5);
          ?>
          
          
          
          <br /><br />  
           <div class="container">  
                <h3 align="center">OVERALL DETAILS</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="overall_details" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                   <td>reciept_no</td>  
                                    <td>reg_no</td>  
                                    <td>student_name</td>  
                                    <td>student_number</td>  
                                    <td>course_name</td>
                                    <td>course_fees</td>  
                                    <td>paid_fees</td>  
                                    <td>paid_date</td>  
				               </tr>  
                          </thead>  
                          <?php
                         if($result5)
                          while($row =  mysqli_fetch_array($result5))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["reciept_no"].'</td> 
                                    <td>'.$row["reg_no"].'</td>     <td>'.$row["student_name"].'</td>                              <td>'.$row["student_number"].'</td>
                                    <td>'.$row["course_name"].'</td> 
                                    <td>'.$row["course_fees"].'</td> 
                                    <td>'.$row["paid_fees"].'</td>  
                                    <td>'.$row["paid_date"].'</td> 
				               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>
                    
                    <a href="export-overall.php">Export To Excel</a>
                    
                </div>  
           </div>  
          
          
          <!-- First Table -->
 
          <?php
            $query ="SELECT * FROM `student`";  
            $result = mysqli_query($connect, $query);  
          ?>  
 
          
          
           <br /><br />  
           <div class="container">  
                <h3 align="center">All Entries Related to Student Details</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="student_details" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>student_id</td>  
                                    <td>Name</td>  
                                    <td>Phone</td>  
                                    <td>Dob</td>  
                                    <td>Email</td>
				               </tr>  
                          </thead>  
                          <?php
                         if($result)
                          while($row =  mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["student_id"].'</td>  
                                    <td>'.$row["student_name"].'</td>  
                                    <td>'.$row["student_number"].'</td>  
                                    <td>'.$row["student_dob"].'</td>  
                                    <td>'.$row["student_email"].'</td>
				               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>
                    
                    <a href="export-book.php">Export To Excel</a>
                    
                </div>  
           </div>  
          
          
          
          
          
          <!-- Second Table -->
          
          <?php
            $query2 = "SELECT * FROM `registration`";
            $result2 = mysqli_query($connect, $query2);
          ?>
          
          
          
          <br /><br />  
           <div class="container">  
                <h3 align="center">All Entries Related to Registration</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="admission_details" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Registration No</td>  
                                    <td>Student_id</td>  
                                    <td>Course_id</td>  
                                    <td>Reg Date</td>  
				               </tr>  
                          </thead>  
                          <?php
                         if($result2)
                          while($row =  mysqli_fetch_array($result2))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["reg_no"].'</td>  
                                    <td>'.$row["student_id"].'</td>  
                                    <td>'.$row["course_id"].'</td>  
                                    <td>'.$row["reg_date"].'</td>  
				               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>
                    
                    <a href="export-registration.php">Export To Excel</a>
                    
                </div>  
           </div>  
          
          
          
          <!-- Third Table -->
          
          
          <?php
            $query3 = "SELECT * FROM `course`";
            $result3 = mysqli_query($connect, $query3);
          ?>
          
          
          
          <br /><br />  
           <div class="container">  
                <h3 align="center">Course Details</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="course_details" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Course id</td>  
                                    <td>course_name</td>  
                                    <td>course_fees</td>  
                                    <td>course_duration</td>  
				               </tr>  
                          </thead>  
                          <?php
                         if($result3)
                          while($row =  mysqli_fetch_array($result3))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["course_id"].'</td>  
                                    <td>'.$row["course_name"].'</td>  
                                    <td>'.$row["course_fees"].'</td>  
                                    <td>'.$row["course_duration"].'</td>  
				               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>
                    
                    
                    
                </div>  
           </div>  
          
          
          
           <!-- Fourth Table -->
          
          
          <?php
            $query4 = "SELECT * FROM `payment`";
            $result4 = mysqli_query($connect, $query4);
          ?>
          
          
          
          <br /><br />  
           <div class="container">  
                <h3 align="center">All Entries Related to PAYMENT</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="payment_details" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>reg_no</td>  
                                    <td>reciept_no</td>  
                                    <td>paid_fees</td>  
                                    <td>paid_date</td>  
				               </tr>  
                          </thead>  
                          <?php
                         if($result4)
                          while($row =  mysqli_fetch_array($result4))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["reg_no"].'</td>  
                                    <td>'.$row["reciept_no"].'</td>  
                                    <td>'.$row["paid_fees"].'</td>  
                                    <td>'.$row["paid_date"].'</td>  
				               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>
                    
                    <a href="export-payment.php">Export To Excel</a>
                    
                </div>  
           </div>  
          
          
          
          
          
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#student_details').DataTable();  
 });  
 </script>  

<script>  
 $(document).ready(function(){  
      $('#admission_details').DataTable();  
 });  
 </script>  

<script>  
 $(document).ready(function(){  
      $('#course_details').DataTable();  
 });  
 </script>  

<script>  
 $(document).ready(function(){  
      $('#payment_details').DataTable();  
 });  
 </script>  
<script>  
 $(document).ready(function(){  
      $('#overall_details').DataTable();  
 });  
 </script>  