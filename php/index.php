<?php

if(isset($_POST['username'])){
    session_start();
    $_SESSION['name']=$_POST['username'];
    
}

?>

<html>
	<head>
		<title>Fredericton Society of Saint Andrew</title>
		<link rel="stylesheet" type="text/css" href="../css/header_menu_footer_formatter.css"/>
	</head>
</html>

<div class="header">
	<?php include("../php/header.php")?>
</div>

<div class="nav_menu">
	<?php include("../php/nav_menu.php")?>
</div>

<div class="index_content">
	<h2>Fredericton Society of Saint Andrew</h2>
	<p>
	Founded on November 30, 1825, the Society of Saint Andrew is one of the oldest
continuously running societies in the City of Fredericton. The first meeting of the Society
was organized and took place at the Barrister Inn on the grounds of the NB Legislature.
It was incorporated by Chapter 97 of the Acts of the Assembly in 1845.
</p>
<p>
The current purpose of the Society is to promote the activities of Scottish culture in and
around the Fredericton area. It was formed, however, with the ideals of affording relief
to the distressed natives of Scotland, their families, and their descendants; as well as cultivating
a taste for Scotland’s music, literature, dance, and other cultural activities.
</p>
<p>
Membership in the Society is open to all people who support the objects of the Society. 
There are two types of membership: Regular and Associate.
</p>
<p>
A Regular member must be from Scotland or a descendant of a native of Scotland. 
An Associate member supports the objects of the Society, but does not have Scottish descent.
</p>
</div>

