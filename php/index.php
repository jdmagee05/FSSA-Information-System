<?php

if(isset($_POST['username'])){
    session_start();
    $_SESSION['name']=$_POST['username'];
    
}
include("../php/header.php");
?>
    
<html>
	<head>
		<title>Fredericton Society of Saint Andrew</title>
	</head>
</html>
