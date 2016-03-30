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
	
	<?php 
	if($_SESSION['user_type'] != 'admin'){
	    header("location: index.php");
	}
	?>

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>
	
	<div class="index_content">
		<form action="editMember.php" method="post" id="member_selection">
			<?php 
			    echo "<select name='member_ident'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['MEMBER_ID'] . "'>" . $row['FIRSTNAME'] . " " . $row['LASTNAME'] . "</option>";
                }
                echo "</select>";
            ?>
			<input type="submit" value="Edit this member">
		</form>
	</div>
		
</body>
</html>