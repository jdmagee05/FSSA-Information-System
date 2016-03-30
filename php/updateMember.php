<?php
$servername = "localhost";
$dbUsername = "root";
$password = "root";
$dbName = "fssa";

//create connection
$conn = new mysqli($servername, $dbUsername, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST["firstname"];
$lastname= $_POST["lastname"];
$middlename = $_POST["middlename"];
$homephone = $_POST["homephone"];
$cellphone = $_POST["cellphone"];
$email = $_POST["email"];
$birthDate = $_POST["birthDate"];
$member_type = $_POST["member_type"];
$birthPlace = $_POST["birthPlace"];
$member_status = $_POST["member_status"];
$address = $_POST["address"];
$city = $_POST["city"];
$province = $_POST["province"];
$country = $_POST["country"];
$postalcode = $_POST["postalcode"];

$username = $_POST["username"];
$password = $_POST["password"];
$memberId = $_POST["memberId"];
$dateApplied = $_POST["dateApplied"];
$dateApproved = $_POST["dateApproved"];
$dateInducted = $_POST["dateInducted"];
$user_type = $_POST["userType"];

$stmt = $conn->prepare("CALL update_member(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
if($stmt == FALSE){
    die($conn->error);
}
$stmt->bind_param('isssssssssssssisssssss', $memberId, $firstname, $lastname, $middlename, $birthDate, $birthPlace, $address, $city, $province, $country, $postalcode, $homephone, $cellphone,
    $email, $member_type, $dateApplied, $dateApproved, $dateInducted, $user_type, $member_status, $username, $password);

$stmt->execute();

?>

<html>
<head>
	<head>
		<title>Fredericton Society of Saint Andrew</title>
		<link rel="stylesheet" type="text/css" href="../css/header_menu_footer_formatter.css"/>
	</head>
</head>
<body>
	<div class="header">
		<?php include("../php/header.php")?>
	</div>
	
	<?php 
	if($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'member'){
	    header("location: index.php");
	}
	?>

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="index_content">
     	<h3>Successfully updated member, <?php echo $firstname . " " . $lastname?></h3><br>
     	<a href="index.php">Return home</a>
     </div>
</body>
</html>