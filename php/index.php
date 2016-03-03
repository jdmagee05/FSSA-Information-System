<?php

if(isset($_POST['username'])){
    session_start();
    $_SESSION['name']=$_POST['username'];
    
}
include("../php/header.php");
    ?>
    
<html>
	<head>
		<link rel="stylesheet" href="../js/jquery-ui-1.11.4.custom/jquery-ui.min.css">
    	<script src="../js/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
		<script src="../js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
		<title>Fredericton Society of Saint Andrew</title>
	</head>
</html>
