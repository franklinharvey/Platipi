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
  <title>Platipi - Edit Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script async src="js/edit_profile.js"></script>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container">
  <div class="row">
	<form id="profile-form">
	  <input type="text" id="first_name" name="txtFirstName" value="<?php echo $row[0]; ?>" placeholder="Name" class="form-control">
		<div>
		  <div class="form-group">
			<textarea class="form-control" rows="5" id="bio" placeholder="Biography"><?php echo $row[1]; ?></textarea>
		  </div>
		</div>
		<div>
<?php

$all_interests = ["Gaming", "Coding", "Hiking", "Playing Music", "Listening to Music", "Skiing",
	"American Football", "Soccer", "Beer", "Wine", "Coffee",
	"Tea", "Art", "Dancing", "Comedy", "Books", "Cooking", "Start-ups"];
	
$user_interests_weird = mysqli_fetch_all($result, MYSQLI_NUM);
$user_interests_normal = array();
for ($i = 0; $i < sizeof($user_interests_weird); $i++) {
	array_push($user_interests_normal, $user_interests_weird[$i][0]);
}

for ($i = 0; $i < sizeof($all_interests); $i++) {
	$checked =  in_array($all_interests[$i], $user_interests_normal);
	
	echo "<div class='checkbox-inline'><label><input type='checkbox' value='".
		$all_interests[$i]."' ".($checked ? "checked" : "").">".$all_interests[$i]."</label></div>";
}

?>
		</div>
		
		<p class="error" id="error"></p>
		<button id="save" class="btn btnEdit">Save Changes</button>
	</form>
  </div>
</div>

</body>
</html>