<!DOCTYPE html>
<html lang="en">
<head>
  <title>Platipi - Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script async src="js/register.js"></script>
  <link rel="stylesheet" href="static/style.css">
</head>
<body>

<div class="container">
	<img src="graphics/platipi.png" class="logo img-responsive">
	<h1>Create an Account</h1>
	<h2>Get ready to <mark>socialize!</mark></h2>
	<div class="row">
		<form id="register-form" class="form-horizontal">
			<div class="brand form-group" id="register">
				<input class="form-control col-sm-12" name="email" type="email" id="txtEmail" placeholder="Email">
				<input class="form-control col-sm-12" name="first_name" type="text" id="txtName" placeholder="First Name">
				<input class="form-control col-sm-12" name="password" type="password" id="txtPassword" placeholder="Password">
				<p class="error" id="error"></p>
				<button id="btnReg" class="btn btnReg">Register</button>
				<a href="index.php">Return to Login</a>
			</div>
		</form>
	</div>
</div>

</body>
</html>