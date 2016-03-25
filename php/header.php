<?php
session_start();
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/header.css"/>
</head>
<body>
	<div class="header">
		<a href="index.php"><img src="../images/FSSA_Crest_with_text.jpg" alt="FSSA Crest"/></a>
	</div>
	
     <div class="corner_login">
     <?php if(isset($_SESSION['username'])){
         echo 'Welcome ' . $_SESSION['username'] . '!';
         echo '<br>';
         echo '<a href="logout.php">Logout</a>';
        }?>
	</div>
</body>
</html>