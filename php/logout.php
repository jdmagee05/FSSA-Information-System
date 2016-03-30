<?php
session_start();

if($_SESSION['user_type'] != 'admin' && $_SESSION['user_type'] != 'member'){
    header("location: index.php");
}

if (isset($_SESSION['username'])){
    unset($_SESSION['username']);
    unset($_SESSION['user_type']);
    unset($_SESSION['member_id']);
}
header("location: index.php");

?>
