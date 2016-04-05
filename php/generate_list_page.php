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
	if($_SESSION['user_type'] != 'admin'){
	    header("location: index.php");
	}
	?>

	<div class="nav_menu">
		<?php include("../php/nav_menu.php")?>
	</div>	

     <div class="index_content">
     <form action="generate_list.php" method="post">
     <table>
     	<tr>
     		<td><h3>Please select which type of membership list you would like to generate:</h3></td>
     	</tr>
     	<tr>
     		<td>
     			<input type="radio" name="list_type" value="all">All Members
     			<input type="radio" name="list_type" value="paid">Paid Memberships
     			<input type="radio" name="list_type" value="unpaid">Unpaid/Expired Memberships
     		</td>
     	</tr>
     	<tr style="height:20px;">
     	</tr>
     	<tr>
     		<td><h3>After selecting the type of list, press the generate button to download a PDF of the list</h3></td>
     	</tr>
     </table>
     <input type="submit" value="Generate Membership List">
     </form>
     </div>
     
	<div class="footer">
		<?php include("footer.php")?>
	</div>
     
</body>
</html>