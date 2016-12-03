<?php

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'start':
            start_queue($_SESSION['userid']);
            break;
        case 'stop':
            stop_queue($_SESSION['userid']);
            break;
    }
}

function start_queue($userid) {
    $con = mysqli_connect("localhost", "platypus", "password") or die(mysqli_error($con));
    mysqli_select_db($con, "platipi") or die(mysqli_error($con));

    $qq = mysqli_query($con, "UPDATE users SET users.queing=1 WHERE users.userid=".$userid);

    if (!$qq) {
        $message  = 'Invalid query 1: ' . mysqli_error($con) . "\n";
        die($message);
    }
}

function stop_queue($userid) {
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
}

?>
