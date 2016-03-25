<?php

function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

session_start();
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
$dateApplied = $_POST["dateApplied"];
$city = $_POST["city"];
$dateApproved = $_POST["dateApproved"];
$province = $_POST["province"];
$dateInducted = $_POST["dateInducted"];
$country = $_POST["country"];
$postalcode = $_POST["postalcode"];
$user_type = 'member';

$username = generateRandomString();
$password = generateRandomString();

$stmt = $conn->prepare("CALL add_member(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
if($stmt == FALSE){
    die($conn->error);
}
$stmt->bind_param('sssssssssssssisssssss', $firstname, $lastname, $middlename, $birthDate, $birthPlace, $address, $city, $province, $country, $postalcode, $homephone, $cellphone,
    $email, $member_type, $dateApplied, $dateApproved, $dateInducted, $user_type, $member_status, $username, $password);

if($stmt->execute()){
//     // the message
//     $msg = "Test Message!\nHere is your new account information:\nUsername: " . $username . "\nPassword: " . $password;
//     $msg = wordwrap($msg,70);
//     $headers = "From: jdmagee93@gmail.com";
    
//     // send email
//     mail($email,"Fredericton Society of Saint Andrew Membership",$msg, $headers);
}

?>


<html>
	<head>
		<title>Success!</title>
	</head>
	<body>
		<p>You have successfully added <?php echo $firstname . " " .  $lastname . "!"?></p>
		<br>
		<a href="index.php">Return home</a>
		or
		<a href="addMember_page.php">Add another member</a>
	</body>
</html>

