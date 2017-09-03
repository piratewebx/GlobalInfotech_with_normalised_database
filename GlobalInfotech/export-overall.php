<?php
$conn = mysqli_connect("localhost", "root", "", "gi_register");  

 
 
$setSql = "SELECT * FROM `registration`, `student`, `course`, `payment` WHERE student.student_id = registration.student_id AND registration.course_id = course.course_id AND registration.reg_no = payment.reg_no";
$setRec = mysqli_query($conn, $setSql);  
  
$columnHeader = '';  
$columnHeader = "Reciept No" . "\t" . "Reg No" . "\t" . "Name" . "\t" . "Phone" . "\t" . "Course" . "\t" . "Total Fees" . "\t" . "Paid" . "\t" . "date" . "\t";  
  
$setData = '';  
  
while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  
  
echo ucwords($columnHeader) . "\n" . $setData . "\n";  
  
?>