<?php
    session_start();
    $userid = $_SESSION['userid']; 
    $con = mysqli_connect("localhost", "platypus", "password") or die(mysqli_error($con));
    mysqli_select_db($con, "platipi") or die(mysqli_error($con));

    $qq = mysqli_query($con, "SELECT users.group_link FROM users WHERE users.userid=".$userid);

    if (!$qq) {
        $message  = 'Invalid query: ' . mysqli_error($con) . "\n";
        die($message);
    }
    $qq_row = mysqli_fetch_array($qq);

    echo $qq_row[0]
?>
