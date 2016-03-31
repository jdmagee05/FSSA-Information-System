<?php
$member_ident = $_POST["member_ident"];

$servername = "localhost";
$dbUsername = "root";
$password = "root";
$dbName = "fssa";

//create connection
$conn = new mysqli($servername, $dbUsername, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql=mysqli_query($conn, "CALL get_member(" . $member_ident . ")");
while($row=mysqli_fetch_array($sql))
{
    $firstname = $row["FIRSTNAME"];
    $lastname= $row["LASTNAME"];
    $middlename = $row["MIDDLENAME"];
    $homephone = $row["HOME_PHONE"];
    $cellphone = $row["CELL_PHONE"];
    $email = $row["EMAIL_ADDRESS"];
    $birthDate = $row["BIRTHDATE"];
    $member_type = $row["MEMBER_TYPE"];
    $birthPlace = $row["BIRTHPLACE"];
    $member_status = $row["MEMBER_STATUS"];
    $address = $row["ADDRESS"];
    $city = $row["CITY"];
    $province = $row["PROVINCE"];
    $country = $row["COUNTRY"];
    $postalcode = $row["POSTALCODE"];
    
    //hidden fields
    $username = $row["USERNAME"];
    $userPassword = $row["PASSWORD"];
    $dateApplied = $row["DATE_APPLIED"];
    $dateApproved = $row["DATE_APPROVED"];
    $dateInducted = $row["DATE_INDUCTED"];
    $userType = $row["USER_TYPE"];
}

$conn = new mysqli($servername, $dbUsername, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql2=mysqli_query($conn, "CALL get_membership_expiry_date(" . $member_ident . ")");
$expiry_date = null;
while($row=mysqli_fetch_array($sql2)){
    $expiry_date = $row["RENEWAL_EXPIRY_DATE"];
}

if(is_null($expiry_date)){
    $expiry_date = "Membership type has not been set.";
}

if($member_type == 4 || $member_type == 5 || $member_type == 6){
    $expiry_date = "N/A";
}
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
	if($_SESSION['user_type'] != 'admin'){
	    header("location: index.php");
	}
	?>
	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="add_member_fields">
     <h3>Edit Member Information</h3>
		<form action="updateMember.php" method="post" id="edit_member">
		<table>
		<tr>
			<td>*First Name:</td>
			<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" required><br></td>
			
			<td>*Home Phone:</td>
			<td><input type="tel" pattern="^\d{11}$" name="homephone" value="<?php echo $homephone; ?>" required><br></td>
			<td>(Format: Country code, Area Code, Phone #. No separators)</td>
		</tr>
		<tr>
			<td>*Last Name:</td>
			<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" required><br></td>
			
			<td>Cell Phone:</td>
			<td><input type="tel" pattern="^\d{11}$" name="cellphone" value="<?php echo $cellphone; ?>"><br></td>
			<td>(Format: Country code, Area Code, Phone #. No separators)</td>
		</tr>
		<tr>
			<td>Middle Name:</td>
			<td><input type="text" name="middlename" value="<?php echo $middlename; ?>"><br></td>
			
			<td>Email:</td>
			<td><input type="email" name="email" value="<?php echo $email; ?>"><br></td>
		</tr>
		<tr>
			<td>*Birth Date:</td>
			<td><input type="date" name="birthDate" value="<?php echo $birthDate; ?>" required><br></td>
			
			<td>*Member Type:</td>
			<td>
				<select name="member_type" required>
					<option value="1" <?php if ($member_type == 1) echo ' selected="selected"'; ?>>Regular</option>
					<option value="2" <?php if ($member_type == 2) echo ' selected="selected"'; ?>>Associate</option>
					<option value="3" <?php if ($member_type == 3) echo ' selected="selected"'; ?>>5-Year</option>
					<option value="4" <?php if ($member_type == 4) echo ' selected="selected"'; ?>>Life</option>
					<option value="5" <?php if ($member_type == 5) echo ' selected="selected"'; ?>>Honourary Life</option>
					<option value="6" <?php if ($member_type == 6) echo ' selected="selected"'; ?>>Historical</option>
				</select><br>
			</td>
		</tr>
		<tr>
			<td>*Birth Place:</td>
			<td><input type="text" name="birthPlace" value="<?php echo $birthPlace; ?>" required><br></td>
			
			<td>*Member Status:</td>
			<td>
				<select name="member_status" required>
					<option value="normal" <?php if ($member_status == "normal") echo ' selected="selected"'; ?>>Normal</option>
					<option value="deceased" <?php if ($member_status == "deceased") echo ' selected="selected"'; ?>>Deceased</option>
					<option value="lapsed" <?php if ($member_status == "lapsed") echo ' selected="selected"'; ?>>Lapsed</option>
					<option value="moved" <?php if ($member_status == "moved") echo ' selected="selected"'; ?>>Moved</option>
				</select><br>
			</td>
		</tr>
		<tr>
			<td>*Address:</td>
			<td><input type="text" name="address" value="<?php echo $address; ?>" required><br></td>
		</tr>
		<tr>
			<td>*City:</td>
			<td><input type="text" name="city" value="<?php echo $city; ?>" required><br></td>
			
			<td>Membership Expiry Date:</td>
			<td><?php echo $expiry_date; ?></td>
		</tr>
		<tr>
			<td>*Province:</td>
			<td>
				<select name="province" required>
					<option value="AB" <?php if ($province == "AB") echo ' selected="selected"'; ?>>Alberta</option>
					<option value="BC" <?php if ($province == "BC") echo ' selected="selected"'; ?>>British Columbia</option>
					<option value="MB" <?php if ($province == "MB") echo ' selected="selected"'; ?>>Manitoba</option>
					<option value="NB" <?php if ($province == "NB") echo ' selected="selected"'; ?>>New Brunswick</option>
					<option value="NL" <?php if ($province == "NL") echo ' selected="selected"'; ?>>Newfoundland and Labrador</option>
					<option value="NT" <?php if ($province == "NT") echo ' selected="selected"'; ?>>Northwest Territories</option>
					<option value="NS" <?php if ($province == "NS") echo ' selected="selected"'; ?>>Nova Scotia</option>
					<option value="NU" <?php if ($province == "NU") echo ' selected="selected"'; ?>>Nunavut</option>
					<option value="ON" <?php if ($province == "ON") echo ' selected="selected"'; ?>>Ontario</option>
					<option value="PE" <?php if ($province == "PE") echo ' selected="selected"'; ?>>Prince Edward Island</option>
					<option value="QC" <?php if ($province == "QC") echo ' selected="selected"'; ?>>Quebec</option>
					<option value="SK" <?php if ($province == "SK") echo ' selected="selected"'; ?>>Saskatchewan</option>
					<option value="YT" <?php if ($province == "YT") echo ' selected="selected"'; ?>>Yukon</option>
				</select><br>
			</td>
		</tr>
		<tr>
			<td>*Country:</td>
			<td><input type="text" name="country" value="<?php echo $country; ?>" required><br></td>
		</tr>
		<tr>
			<td>*Postal Code:</td>
			<td><input type="text" name="postalcode" value="<?php echo $postalcode; ?>" required><br></td>
		</tr>
		
		<tr>
			<td>
				<input type="hidden" name="username" value="<?php echo $username; ?>">
				<input type="hidden" name="password" value="<?php echo $userPassword; ?>">
				<input type="hidden" name="memberId" value="<?php echo $member_ident; ?>">
				<input type="hidden" name="dateApplied" value="<?php echo $dateApplied; ?>">
				<input type="hidden" name="dateApproved" value="<?php echo $dateApproved; ?>">
				<input type="hidden" name="dateInducted" value="<?php echo $dateInducted; ?>">
				<input type="hidden" name="userType" value="<?php echo $userType; ?>">
			</td>
		</tr>
			
		</table>
		
		<input type="submit" value="Submit">
		<input type="reset" value="Clear">
		</form>
	</div>
	
	<div class="footer">
		<?php include("footer.php")?>
	</div>
	
</body>
</html>