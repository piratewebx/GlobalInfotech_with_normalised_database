<?php

$connect = mysqli_connect("localhost", "root", "", "gi_register");

$Firstname = $_POST["Firstname"];
$Lastname = $_POST["Lastname"];
$reciept_no= $_POST["reciept_no"];
$amount = $_POST["amount"];
$reg_no = $_POST["reg_no"];
$date = date("Y-m-d");
$fees_paid = "";

$course_id = "";
$course_fees = "";

$query ="INSERT INTO `payment`(`reg_no`, `reciept_no`, `paid_fees`, `paid_date`) VALUES ('$reg_no','$reciept_no','$amount','$date')";  
    $result = mysqli_query($connect, $query);


$a = "SELECT * FROM `registration` WHERE `reg_no` = '$reg_no'";
$result2 = mysqli_query($connect, $a);
if($result2)
        $row =  mysqli_fetch_array($result2);
            $course_id = $row["course_id"];

$b = "SELECT * FROM `course` WHERE `course_id` = '$course_id'";
$result3 = mysqli_query($connect, $b);
if($result3)
        $row =  mysqli_fetch_array($result3);
            $course_fees = $row["course_fees"];

$c = "SELECT sum(paid_fees) as total FROM `payment` WHERE `reg_no` = '$reg_no'";
$result4 = mysqli_query($connect, $c);
if($result4)
        while($row =  mysqli_fetch_array($result4)){
            $fees_paid = $row["total"];            
        }
$balance = $course_fees - $fees_paid;



?>




<html>
<head>
<title>Payment Status</title>
<!-- Custom Theme files -->
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Colored Contact Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
<!--profile start here-->
<h1>GLOBAL INFOTECH | Payment</h1>
<div class="profile">
	<div class="wrap">
		<div class="content-main">
			<div class="content-form">
				<form action="back_payment.php" method="post">
					<div class="form-grid">
						<span class="Firstname">Firstname</span>
						<?php echo "$Firstname"; ?>
						<div class="clear"></div>
					</div>
					<div class="form-grid">
						<span class="Lastname">Lastname</span>
						<?php echo "$Lastname"; ?>
						<div class="clear"></div>
					</div>
					<div class="form-grid">
						<span class="Email">Amount paid</span>
						<?php echo "$amount"; ?>
						<div class="clear"></div>
					</div>
					<div class="form-grid">
						<span class="Phone">Balance</span>
						<?php echo "$balance"; ?>
						<div class="clear"></div>
					</div>
					<div class="clear"> </div>
				</form>
			</div>
		</div>
		<div class="wthree_footer_copy">
			<p>© 2017 GLOBAL INFOTECH. All rights reserved | Design by <a href="#">Kashyap | Divya</a></p>
		</div>
	</div>
</div>
<!--profile end here-->

</body>
</html>
