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

$result = mysqli_query($conn, "SELECT MEMBER_ID, FIRSTNAME, LASTNAME FROM MEMBER");

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

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>
	
	<div class="index_content">
		<h3>Member Renewal</h3>
		
		<form action="renewMember.php" method="post">
			<table>
				<tr>
					<td>Membership Type:</td>
					<td>
						<select name="member_type">
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
					<td>Select Member being Renewed:</td>
					<td>
						<?php 
			                 echo "<select name='member_ident'>";
			                 echo "<option value=''></option>";
                             while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['MEMBER_ID'] . "'>" . $row['FIRSTNAME'] . " " . $row['LASTNAME'] . "</option>";
                             }
                             echo "</select>";
                        ?>
					</td>
				</tr>
				<tr>
					<td>Payment Amount:</td>
					<td><input type="number" name="payment_amount"></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Renew">
		</form>
	</div>
	
</body>
</html>