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
	
	$currentPasswordError = "";
	$newPasswordError = "";
	$successMessage = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $servername = "localhost";
	    $dbUsername = "root";
	    $password = "root";
	    $dbName = "fssa";
	
	    //create connection
	    $conn = new mysqli($servername, $dbUsername, $password, $dbName);
	    if($conn->connect_error){
	        die("Connection failed: " . $conn->connect_error);
	    }
	
	    $sql=mysqli_query($conn, "CALL get_member(" . $_SESSION["member_id"] . ")");
	    while($row=mysqli_fetch_array($sql))
	    {
	        $currentPassword = $row["PASSWORD"];
	    }
	
	    if($_POST["currentPassword"] != $currentPassword){
	        $currentPasswordError = "Password is incorrect.";
	    }
	    else{
	        if($_POST["newPassword"] == $_POST["newPasswordConfirm"]){
	            //create connection
	            $conn = new mysqli($servername, $dbUsername, $password, $dbName);
	            if($conn->connect_error){
	                die("Connection failed: " . $conn->connect_error);
	            }
	            $stmt = $conn->prepare("CALL update_password(?,?)");
	            if($stmt == FALSE){
	                die($conn->error);
	            }
	            $stmt->bind_param('is', $_SESSION["member_id"], $_POST["newPassword"]);
	
	            $stmt->execute();
	            $successMessage = "Password changed successfully!";
	
	        }
	        else{
	            $newPasswordError = "New passwords do not match. Make sure the same is entered for 'New Password' and 'Confirm New Password'.";
	        }
	    }
	}
	
	?>

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="index_content">
     	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
     		<table>
     			<tr>
     				<td>Enter current password:</td>
     				<td><input type="password" name="currentPassword" value=></td>
     				<td><?php echo $currentPasswordError; ?></td>
     			</tr>
     			<tr>
     				<td>Enter new password:</td>
     				<td><input type="password" name="newPassword"></td>
     				<td><?php echo $newPasswordError; ?></td>
     			</tr>
     			<tr>
     				<td>Confirm new password:</td>
     				<td><input type="password" name="newPasswordConfirm"></td>
     			</tr>
     			<tr style="height: 10px;">
     			</tr>
     		</table>
     		<input type="submit" value="Change Password">
     		<input type="reset" value="Clear">
     		<br>
     		<?php echo $successMessage; ?>
     	</form>
     </div>
</body>
</html>