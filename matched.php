<!DOCTYPE html>
<html lang="en">
<head>
  <title>It's A Match!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container">
	<h1>You've Been Matched!</h1>
	<h2>We've found you some <mark>	FRIENDS!!</mark></h2>
	<div class="row">
			<div class="brand form-group" id="MatchMade">
				<button id="btnLink" class="btn btnLink"> Proceed to Chat </button>
				<button id="btnLeave" class="btn btnLeave">I Hate These Friends!</button>
			</div>
	</div>
</div>

<script>
	document.getElementById("btnLeave").onclick = function(){
		$.post("queue_stop.php", "", function(response) {
			location.href = "profile.php";
		});
	}
	$(document).ready(function() {
		$.post("get_user_link.php","",function(response) {
			document.getElementById("btnLink").onclick = function() {
				window.open(response);
			}});
	});
</script>

</body>
</html>
