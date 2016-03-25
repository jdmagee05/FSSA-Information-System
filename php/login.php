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

$username = $_POST["username"];
$password = $_POST["password"];


$result = mysqli_query($conn, "SELECT USER_TYPE, MEMBER_ID FROM MEMBER WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($result) > 0){
    while ($row = $result->fetch_assoc()){
        $_SESSION['member_id'] = $row["MEMBER_ID"];
        $_SESSION['user_type'] = $row["USER_TYPE"];
    }
    $_SESSION['username']=$username;
    header("location: index.php");
}
else{
    header("location: login_page.php");
}

?>