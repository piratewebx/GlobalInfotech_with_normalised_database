<?php
    $connect = mysqli_connect("localhost", "root", "", "gi_register");
    $query2 = "SELECT *,sum(paid_fees) as total FROM `registration`, `student`, `course`, `payment` WHERE student.student_id = registration.student_id AND registration.course_id = course.course_id AND registration.reg_no = payment.reg_no";
    $result = mysqli_query($connect, $query2);  
    if($result)
        while($row =  mysqli_fetch_array($result))  
        {
            echo $row["reg_no"].'<br>';
            echo $row["student_name"].'<br>';
            echo $row["total"].'<br>';
        }  
?>