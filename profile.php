<?php

session_start();

if (!isset($_SESSION["userid"])) {
	die("Must be logged in to view profile.");
}

$server_name =  "localhost";
$server_username = "platypus";
$server_password = "password";
$db_name = "platipi";

// create connection
$conn = new mysqli($server_name, $server_username, $server_password, $db_name);
if (!$conn) {
	die("Connection failed.");
}

// get name and bio
$sql = "SELECT first_name, bio FROM users WHERE userid=".$_SESSION["userid"];
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
	die("Could not fetch account.");
}

$row = mysqli_fetch_row($result);

// get interests
$sql = "SELECT interest FROM interests WHERE userid=".$_SESSION["userid"];
$result = mysqli_query($conn, $sql);
if (!$result) {
	die("Could not fetch account interests.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Platipi - Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container">
  <div class="row">
  	<h1 id="loginName">Hello, <mark><?php echo $row[0]; ?></mark></h1>
    <div class="col-sm-6">
      <p><?php echo strlen($row[1]) != 0 ? $row[1] : "No user bio. You should totally add a bio here because it would look really cool."; ?></p>
      <button id="addInterest" class="btn btnEdit">Edit Profile</button>
      <a href="waiting.php"><button id="addInterest" class="btn btnEdit">Find Some Friends</button></a>
      <button id="logOut" class="btn btnLogOut">Log Out</button>
    </div>
  <ul class="list-group col-sm-6">
<?php
if (mysqli_num_rows($result) == 0) {
	echo "<li class='list-group-item'>No interests</li>";
} else {
	while ($row = mysqli_fetch_row($result)) {
		echo "<li class='list-group-item'>".$row[0]."</li>";
	}
}
?>

  </ul>
  </div>
</div>
<script>
$(document).ready(function(){
		$.post("queue_stop.php","", function(response){});
		document.getElementById("logOut").onClick = function(){
			$.post("queue_stop.php","", function(response){});
			$.post("LogOut.php","",function(response){location.href = "index.php";
			});
		}
	});	
</script>
</body>
</html>
