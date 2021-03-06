<?php

session_start();

if (isset($_SESSION["userid"])) {
	header("Location: http://platipi.com/profile.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Platipi - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script async src="js/login.js"></script>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container">
	<img src="graphics/platipi.png" class="logo img-responsive">
	<h1>Welcome to Platipi.</h1>
	<h2>Ready to make some <mark>friends?</mark></h2>
	<div class="row">
		<form action="index.php" id="login-form" method="post" class="form-horizontal">
			<div class="brand form-group" id="login">
				<input class="form-control col-sm-12" type="email" name="email" id="txtEmail" placeholder="Email">
				<input class="form-control col-sm-12" type="password" name="password" id="txtPassword" placeholder="Password">
				<p class="error" id="error"></p>
				
				
				<div class="row omb_row-sm-offset-3">
					<div class="col-xs-12 col-sm-3">
						<label class="checkbox" style= "padding-left: 30px; color: black">
							<input type="checkbox" value="remember-me">Remember Me
						</label>
					</div>
					<div class="col-xs-12 col-sm-3">
						
							<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">Forgot password?</a>
					
					</div>
				</div>
				
				<button id="btnLogin" class="btn btnLogin">Log in</button>
				<button id="btnSignUp" class="btn btnSignUp">Sign Up</button>
			
		</div>
		</form>
	</div>
			
</div>

</body>
</html>