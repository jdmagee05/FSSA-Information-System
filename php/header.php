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
     <div class="corner_login">
		<form action="" method="post" id="corner_login">
			Username: <input type="text" name="username"><br>
			Password: <input type="password" name="password"><br>
			<input type="submit" value="Login">
		</form>
		<h3>Sign up!</h3>
	</div>
	<?php } ?>
	
</body>
</html>