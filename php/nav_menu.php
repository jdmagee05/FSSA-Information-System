<?php
//session_start();
?>

<html>
<head>
	<script type="text/javascript" src="jquery-1.12.1.min.js"></script>
</head>
<body>
	<?php if(!isset($_SESSION['username'])){ ?>
	<div class="loggedOutMenu">
		<h3>FSSA Menu</h3>
		<a href="index.php">FSSA Information</a>
		<br>
		<a href="index.php">Research Heritage</a>
		<br>
		<a href="index.php">Upcoming Events</a>
		<br>
		<a href="application_directory.php">Join Us!</a>
		<br>
		<a href="login_page.php">Members Only</a>
	</div>
	<?php } ?>
	
	<?php if(isset($_SESSION['username']) && $_SESSION['user_type'] == 'member'){ ?>
	<div class="memberMenu">
		<h3>FSSA Menu</h3>
		<a href="index.php">FSSA Information</a>
		<br>
		<a href="index.php">Research Heritage</a>
		<br>
		<a href="index.php">Events</a>
		<br>
		<h3 style="margin-bottom: 2px;">Member</h3>
		<a href="index.php">Comments</a>
		<br>
		<!--  <a href="index.php">Surveys</a>-->
		<a href="index.php">Payment Status</a>
		<br>
		<a href="edit_personal_info.php">Edit your Information</a>
	</div>
	<?php }?>
	
	<?php if(isset($_SESSION['username']) && $_SESSION['user_type'] == 'admin'){ ?>
	<div class="adminMenu">
		<h3>FSSA Menu</h3>
		<a href="index.php">FSSA Information</a>
		<br>
		<a href="index.php">Research Heritage</a><br>
		
	    <h3 style="margin-bottom: 2px;">Member</h3>
		<a href="addMember_page.php">Add a Member</a>
		<br>
		<a href="edit_personal_info.php">Edit your Information</a>
		<br>
		<a href="select_member_to_edit.php">Edit Member Information</a>
		<br>
		<a href="generate_list_page.php">Generate Member Lists</a>
		<br>
		<!-- <a href="index.php">Surveys</a> -->
		<a href="index.php">Payment Status</a>
		<br>
		
		<h3 style="margin-bottom: 2px;">Events</h3>
		<a href="index.php">Create an Event</a>
		<br>
		<a href="index.php">Edit Event</a>
		<br>
		<a href="index.php">Event Planning</a>
		<br>
		<a href="index.php">Asset Management</a>
		<br>
		<a href="index.php">View Calendar</a>
		<br>
		
		<h3 style="margin-bottom: 2px;">Financial</h3>
		<a href="member_renewal_page.php">Operating Account</a>
		<br>
		<a href="index.php">Cultural Fund</a>
		
	</div>
	<?php } ?>
</body>
</html>