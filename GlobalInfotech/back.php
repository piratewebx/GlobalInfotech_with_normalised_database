<?php
$name = $_POST["name"];
$phone_number = $_POST["phone"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$course_selected = $_POST["course"];

//echo $name;
//echo $phone_number;
//echo $dob;
//echo $email;
//echo $course_selected;

$catch1 = " ";
$catch2 = " ";
$catch3 = " ";


//Connection
$con = mysqli_connect("localhost", "root", "", "gi_register");  


//Checking Reduncy and then inserting
$count = 0;

$x = "SELECT * FROM `student`";
$result = mysqli_query($con, $x);
    if($result)
        while($row =  mysqli_fetch_array($result)){
           
            if($row["student_name"] == $name AND $row["student_number"] == $phone_number AND
            $row["student_dob"] ==  $dob AND
            $row["student_email"] == $email ){
                $count = 1;
            }
        }

//If there is no redundant data
if($count == 0){
    $query ="INSERT INTO `student`(`student_name`, `student_number`, `student_email`, `student_dob`) VALUES ('$name','$phone_number','$email','$dob')";  
    $result2 = mysqli_query($con, $query);
}
else
     echo "Student already registered";

 //Catching Student Id
    $q = "SELECT * FROM `student` WHERE `student_name` = '$name' AND `student_number` = '$phone_number' AND
            `student_dob` =  '$dob' AND `student_email` = '$email' ";
            $result4 = mysqli_query($con, $q);
            if($result4)
                $row =  mysqli_fetch_array($result4);
                $catch1 = $row["student_id"];
            
//Catching Course_id of selected course
$y = "SELECT * FROM `course` WHERE `course_name` = '$course_selected'";
$result3 = mysqli_query($con, $y);
if($result3)
        $row =  mysqli_fetch_array($result3);
            $catch2 = $row["course_id"];
            

//Inserting registeration table information
$date = date("Y-m-d");
$z = "INSERT INTO `registration`(`student_id`, `course_id`, `reg_date`) VALUES ('$catch1','$catch2','$date')";
$result5 = mysqli_query($con, $z);

//Catching Reg_id of selected course
$a = "SELECT * FROM `registration` WHERE `student_id` = '$catch1' AND `course_id` = '$catch2'";
$result6 = mysqli_query($con, $a);
if($result6){
        $row =  mysqli_fetch_array($result6);
        $catch3 = $row["reg_no"];
}

        
?>
<html>
    <head>
        <title>
            Registration status
        </title>    
    </head>
    <body>
        <div class="container">
	       <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
                <br><br><center> <h1 style="color:#0fad00">Success</h1></center>
                <img src="http://osmhotels.com//assets/check-true.jpg">
                <center><h3>Dear, <?php echo "$name";?></h3></center>
            <center><table height=100 width=1200 bgcolor="#ecffe6"><td> <p style="font-size:20px;color:#5C5C5C;" align="center">Thank you for Registrating for <?php echo "$course_selected";?>
                    .Please note you registration id for future refrences.
                <br>Your id :<b> <?php echo "$catch3";?></b></p></td></table></center>
                <br><br>
              </div>
            </div>
        </div>
    </body>
</html>