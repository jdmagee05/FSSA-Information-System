<?php

session_start();
$servername = "localhost";
$dbUsername = "root";
$password = "root";
$dbName = "fssa";

//create connection
$conn = new mysqli($servername, $dbUsername, $password, $dbName);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
if($_POST["list_type"] == 'all'){
    $list_type = 1;
}
elseif($_POST["list_type"] == 'paid'){
    $list_type = 2;
}
elseif($_POST["list_type"] == 'unpaid'){
    $list_type = 3;
}
$result = mysqli_query($conn, "CALL get_member_list(" . $list_type . ")");
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


?>

<html>
	<head>
		<title>Fredericton Society of Saint Andrew</title>
		<link rel="stylesheet" type="text/css" href="../css/header_menu_footer_formatter.css"/>
	</head>
	<body>
	<?php if($list_type == 1){
	      echo "<h3>All Members</h3>";
        }
        elseif($list_type == 2){
            echo "<h3>Paid Memberships</h3>";
        }
        elseif($list_type == 3){
            echo "<h3>Unpaid Memberships</h3>";
        }
	    ?>
	<table class="generated_table">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Home Phone</th>
			<th>Cell Phone</th>
			<th>Email Address</th>
			<th>Membership Expiry Date</th>
		</tr>
		<?php 
		  while($row = mysqli_fetch_array($result)){
		      echo "<tr>";
              echo "<td>" . $row["FIRSTNAME"] . "</td>";
              echo "<td>" . $row["LASTNAME"] . "</td>";
              echo "<td>" . $row["HOME_PHONE"] . "</td>";
              echo "<td>" . $row["CELL_PHONE"] . "</td>";
              echo "<td>" . $row["EMAIL_ADDRESS"] . "</td>";
              if($row["EXPIRY_DATE"] == null){
                  if($row["MEMBER_TYPE"] == 4){
                    echo "<td>N/A (Lifetime membership)</td>";
                  }
                  elseif($row["MEMBER_TYPE"] == 5){
                      echo "<td>N/A (Honourary Lifetime membership)</td>";
                  }
                  elseif($row["MEMBER_TYPE"] == 6){
                      echo "<td>N/A (Historical)</td>";
                  }
              }
              else{
                echo "<td>" . $row["EXPIRY_DATE"] . "</td>";
              }
              echo "</tr>";
		  }
		
		?>
	</table>
		
	</body>
</html>