<?php

if(isset($_POST['username']))
{
    session_start();
    $_SESSION['name']=$_POST['username'];
    //Storing the name of user in SESSION variable.
    header("location: profile.php");
}
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

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>
	
	<div class="index_content">
		<form action="login.php" method="post" id="login_form">
			Username: <input type="text" name="username"><br><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" value="Login">
		</form>
	</div>
	
	<div class="footer">
		<?php include("footer.php")?>
	</div>
	
	
	</body>
</html>