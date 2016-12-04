<?php
session_start();
$userid = $_SESSION['userid'];
    $con = mysqli_connect("localhost", "platypus", "password") or die(mysqli_error($con));
    mysqli_select_db($con, "platipi") or die(mysqli_error($con));
    $qq = mysqli_query($con, "UPDATE users SET users.queing=0 WHERE users.userid=".$userid);
    if (!$qq) {
        $message  = 'Invalid query 1: ' . mysqli_error($con) . "\n";
        die($message);
    }
    
    $qq2 = mysqli_query($con, "UPDATE users SET users.group_link=\"NULL\" WHERE users.userid=".$userid);
    if (!$qq2) {
        $message  = 'Invalid query 1: ' . mysqli_error($con) . "\n";
        die($message);
    }
    echo "Stopped Queueing";
?>
