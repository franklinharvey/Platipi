<?php

$interests = $_POST["interests"];

// escape unsecured input
$escaped_first_name = mysqli_real_escape_string($conn, $first_name);

// delete all interests
$sql = "DELETE FROM interests WHERE userid=".$_SESSION["userid"];
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Could not update profile.");
}

// insert all interests
for ($i = 0; $i < count($interests); $i++) {
	// escape unsecure interest
	$escaped_interest = mysqli_real_escape_string($conn, $interests[$i]);
	
	$sql = "INSERT INTO interests (userid,interest) VALUES(".$_SESSION["userid"].", '".$escaped_interest."')";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die("Could not update profile.");
	}
}

?>