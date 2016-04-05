


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

    $member_ident = $_SESSION["member_id"];

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
        $username = $row["USERNAME"];

        //hidden fields
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
    while($row=mysqli_fetch_array($sql2)){
        $expiry_date = $row["EXPIRY_DATE"];
    }
    if($member_type == 4 || $member_type == 5 || $member_type == 6){
        $expiry_date = "N/A";
    }

    ?>
	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="add_member_fields">
     <h3>Edit your Information</h3>
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
		</tr>
		<tr>
			<td>*Birth Place:</td>
			<td><input type="text" name="birthPlace" value="<?php echo $birthPlace; ?>" required><br></td>
			
			<td>*Username:</td>
			<td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
		</tr>
		<tr>
			<td>*Address:</td>
			<td><input type="text" name="address" value="<?php echo $address; ?>" required><br></td>
			
			
		</tr>
		<tr>
			<td>*City:</td>
			<td><input type="text" name="city" value="<?php echo $city; ?>" required><br></td>
			
			<td>Member Type:
				<?php 
				    if ($member_type == 1){
				        echo "Regular";
				    }
				    elseif($member_type == 2){
				        echo "Associate";
				    }
				    elseif($member_type == 3){
				        echo "5-Year";
				    }
				    elseif ($member_type == 4){
				        echo "Life";
				    }
				    elseif ($member_type == 5){
				        echo "Honourary Life";
				    }
				    elseif ($member_type == 6){
				        echo "Historical";
				    }
			     ?>
			     </td>
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
			
			<td>Member Status:
				<?php 
				    if ($member_status == 'normal'){
				        echo "Normal";
				    }
				    elseif($member_type == 'deceased'){
				        echo "Deceased";
				    }
				    elseif($member_type == 'lapsed'){
				        echo "Lapsed";
				    }
				    elseif ($member_type == 'moved'){
				        echo "Moved";
				    }
			     ?>
			     </td>
		</tr>
		<tr>
			<td>*Country:</td>
			<td><input type="text" name="country" value="<?php echo $country; ?>" required><br></td>
			
			<td>Membership Expiry Date:</td>
			<td><?php echo $expiry_date; ?></td>
		</tr>
		<tr>
			<td>*Postal Code:</td>
			<td><input type="text" name="postalcode" value="<?php echo $postalcode; ?>" required><br></td>
		</tr>
		
		<tr>
			<td><a href="change_password_page.php">Click here to change password</a></td>
		</tr>
		
		<tr>
			<td>
				<input type="hidden" name="password" value="<?php echo $userPassword; ?>">
				<input type="hidden" name="memberId" value="<?php echo $member_ident; ?>">
				<input type="hidden" name="dateApplied" value="<?php echo $dateApplied; ?>">
				<input type="hidden" name="dateApproved" value="<?php echo $dateApproved; ?>">
				<input type="hidden" name="dateInducted" value="<?php echo $dateInducted; ?>">
				<input type="hidden" name="userType" value="<?php echo $userType; ?>">
				<input type="hidden" name="member_type" value="<?php echo $member_type; ?>">
				<input type="hidden" name="member_status" value="<?php echo $member_status; ?>">
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