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

$member_type = $_POST["member_type"];
$member_id = $_POST["member_ident"];
$payment_amount = $_POST["payment_amount"];
$date_renewed = date("Y-m-d H:i:s");

if($member_type == 1 || $member_type == 2){
    $expiry_date = date("Y-m-d", strtotime('+1 year', strtotime($date_renewed)));
}
elseif ($member_type == 3){
    $expiry_date = date("Y-m-d,", strtotime('+5 years', strtotime($date_renewed)));
}
else{
    $expiry_date = null;
}

$stmt = $conn->prepare("CALL renew_membership(?,?,?,?,?)");
if($stmt == FALSE){
    die($conn->error);
}
$stmt->bind_param('iidss', $member_id, $member_type, $payment_amount, $date_renewed, $expiry_date);

$stmt->execute();

?>

<html>
	<head>
		<title>Fredericton Society of Saint Andrew</title>
		<link rel="stylesheet" type="text/css" href="../css/header_menu_footer_formatter.css"/>
	</head>
<body>
	<div class="header">
		<?php include("../php/header.php")?>
	</div>
	
	<?php 
	if($_SESSION['user_type'] != 'admin'){
	    header("location: index.php");
	}
	?>

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="index_content">
     	Member has been successfully renewed!
		<br><br>
		<a href="index.php">Return home</a> or <a href="member_renewal_page.php">Renew another membership</a>
     </div>
</body>
</html>