<?php
if(isset($_POST['username'])){
    session_start();
    $_SESSION['name']=$_POST['username'];

}
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/header.css"/>
</head>
<body>
	<div class="header">
		<img src="../images/FSSA_Crest_with_text.jpg" alt="FSSA Crest"/>
	</div>
	<?php if(!isset($_POST['username'])){ ?>
	<div class="welcome_member"><h3>Welcome<br>Member Name!</h3></div>
     <div class="add_member">
     <h3>Add a Member to the Society</h3>
		<form action="" method="post" id="add_member">
			First Name: <input type="text" name="firstname"><br>
			Last Name: <input type="text" name="lastname"><br>
			Middle Name: <input type="text" name="middlename"><br>
			Birth Date: <input type="date" name="birthdate"><br>
			Birth Place: <input type="text" name="birthplace"><br>
			Address: <input type="text" name="address"><br>
			City: <input type="text" name="city"><br>
			Province: <input type="text" name="province"><br>
			Country: <input type="text" name="country"><br>
			Postal Code: <input type="text" name="postalcode"><br>
			
			Home Phone: <input type="text" name="homephone"><br>
			Cell Phone: <input type="text" name="cellphone"><br>
			Email: <input type="text" name="email"><br>
			Member Type: <select name="membertype">
			<option value="regular">Regular</option>
			<option value="associate">Associate</option>
			<option value="5-year">5-Year</option>
			<option value="life">Life</option>
			<option value="honorarylife">Honorary Life</option>
			<option value="historical">Historical</option>
			</select><br>
			Member Status: <select name="memberstatus">
			<option value="normal">Normal</option>
			<option value="deceased">Deceased</option>
			<option value="lapsed">Lapsed</option>
			<option value="moved">Moved</option>
			</select><br>
			Date Applied: <input type="date" name="dateapplied"><br>
			Date Approved: <input type="date" name="dateapproved"><br>
			Date Inducted: <input type="date" name="dateinducted"><br>
			<input type="submit" value="Submit">
			<input type="reset" value="Clear">
		</form>
	</div>
	<?php } ?>
	
</body>
</html>