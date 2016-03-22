<?php
if(isset($_POST['username'])){
    session_start();
    $_SESSION['name']=$_POST['username'];

}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/header.css"/>
	<link rel="stylesheet" type="text/css" href="../css/member.css"/>
</head>
<body>
	<?php if(!isset($_POST['username'])){ ?>
	<form action="" method="post" id="edit_member">
     <div id="wrapper">
     <h3 align="center">Edit information for: Member Name</h3>
     	<div id="first">
			<label>First Name:</label><input type="text" name="firstname"><br>
			<label>Last Name:</label><input type="text" name="lastname"><br>
			<label>Middle Name:</label><input type="text" name="middlename"><br>
			<label>Birth Date:</label><input type="date" name="birthdate"><br>
			<label>Birth Place:</label><input type="text" name="birthplace"><br><br>
			<label>Address:</label><input type="text" name="address"><br>
			<label>City:</label><input type="text" name="city"><br>
			<label>Province:</label><input type="text" name="province"><br>
			<label>Country:</label><input type="text" name="country"><br>
			<label>Postal Code:</label><input type="text" name="postalcode"><br>
		</div>
		<div id="second">
			<label>Home Phone:</label><input type="text" name="homephone"><br>
			<label>Cell Phone:</label><input type="text" name="cellphone"><br>
			<label>Email:</label><input type="text" name="email"><br><br>
			<label>Member Type:</label><select name="membertype">
			<option value="regular">Regular</option>
			<option value="associate">Associate</option>
			<option value="5-year">5-Year</option>
			<option value="life">Life</option>
			<option value="honorarylife">Honorary Life</option>
			<option value="historical">Historical</option>
			</select><br>
			<label>Member Status:</label><select name="memberstatus">
			<option value="normal">Normal</option>
			<option value="deceased">Deceased</option>
			<option value="lapsed">Lapsed</option>
			<option value="moved">Moved</option>
			</select><br>
			<label>Membership Expiry Date:</label> dd/mm/yyyy<br>
		</div>
		</div>
		<div align="center">
			<input type="submit" value="Submit">
			<input type="reset" value="Clear">
		</div>
		</form>
	<?php } ?>
	
</body>
</html>