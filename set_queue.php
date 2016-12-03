<?php

$logged_in_user = ????

$con = mysqli_connect("localhost", "platypus", "password") or die(mysqli_error($con));
mysqli_select_db($con, "platipi") or die(mysqli_error($con));

$qq = mysqli_query($con, "UPDATE users SET users.queing=1 WHERE users.userid=".$logged_in_user);

if (!$qq) {
    $message  = 'Invalid query 1: ' . mysqli_error($con) . "\n";
    die($message);
}

?>
