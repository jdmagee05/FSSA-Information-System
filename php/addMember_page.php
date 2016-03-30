<?php
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
     <h3>Add a Member to the Society</h3>
		<form action="addMember.php" method="post" id="add_member">
		<table>
		<tr>
			<td>*First Name:</td>
			<td><input type="text" name="firstname" required><br></td>
			
			<td>*Home Phone:</td>
			<td><input type="tel" pattern="^\d{11}$" name="homephone" required><br></td>
			<td>(Format: Country code, Area Code, Phone #. No separators)</td>
		</tr>
		<tr>
			<td>*Last Name:</td>
			<td><input type="text" name="lastname" required><br></td>
			
			<td>Cell Phone:</td>
			<td><input type="tel" pattern="^\d{11}$" name="cellphone"><br></td>
			<td>(Format: Country code, Area Code, Phone #. No separators)</td>
		</tr>
		<tr>
			<td>Middle Name:</td>
			<td><input type="text" name="middlename"><br></td>
			
			<td>Email:</td>
			<td><input type="email" name="email"><br></td>
		</tr>
		<tr>
			<td>*Birth Date:</td>
			<td><input type="date" name="birthDate" required><br></td>
			
			<td>*Member Type:</td>
			<td>
				<select name="member_type" required>
					<option value="1">Regular</option>
					<option value="2">Associate</option>
					<option value="3">5-Year</option>
					<option value="4">Life</option>
					<option value="5">Honourary Life</option>
					<option value="6">Historical</option>
				</select><br>
			</td>
		</tr>
		<tr>
			<td>*Birth Place:</td>
			<td><input type="text" name="birthPlace" required><br></td>
			
			<td>*Member Status:</td>
			<td>
				<select name="member_status" required>
					<option value="normal">Normal</option>
					<option value="deceased">Deceased</option>
					<option value="lapsed">Lapsed</option>
					<option value="moved">Moved</option>
				</select><br>
			</td>
		</tr>
		<tr>
			<td>*Address:</td>
			<td><input type="text" name="address" required><br></td>
			
			<td>*Date Applied:</td>
			<td><input type="date" name="dateApplied" required><br></td>
		</tr>
		<tr>
			<td>*City:</td>
			<td><input type="text" name="city" required><br></td>
			
			<td>*Date Approved:</td>
			<td><input type="date" name="dateApproved" required><br></td>
		</tr>
		<tr>
			<td>*Province:</td>
			<td>
				<select name="province" required>
					<option value="AB">Alberta</option>
					<option value="BC">British Columbia</option>
					<option value="MB">Manitoba</option>
					<option value="NB">New Brunswick</option>
					<option value="NL">Newfoundland and Labrador</option>
					<option value="NT">Northwest Territories</option>
					<option value="NS">Nova Scotia</option>
					<option value="NU">Nunavut</option>
					<option value="ON">Ontario</option>
					<option value="PE">Prince Edward Island</option>
					<option value="QC">Quebec</option>
					<option value="SK">Saskatchewan</option>
					<option value="YT">Yukon</option>
				</select><br>
			</td>
			
			<td>*Date Inducted:</td>
			<td><input type="date" name="dateInducted" required><br></td>
		</tr>
		<tr>
			<td>*Country:</td>
			<td><input type="text" name="country" required><br></td>
		</tr>
		<tr>
			<td>*Postal Code:</td>
			<td><input type="text" name="postalcode" required><br></td>
		</tr>
			
		</table>
		<input type="submit" value="Submit">
		<input type="reset" value="Clear">
		</form>
	</div>
	
</body>
</html>