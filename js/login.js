$(document).ready(function() {
	$("#btnSignUp").click(function() {
		window.location.href = "register.php";
	});
	
	$("#login-form").submit(function(e) {
		var url = "ajax/accounts/login.php";
		
		if ($("#error").text() != "")
			$("#error").text("...");
		$.ajax({
			type: "POST",
			url: url,
			data: $("#login-form").serialize(),
			success: function(data) {
				if (data == "Login successful.") {
					window.location.href = "../profile.php";
				}
				else {
					$("#error").text(data);
				}
			},
			error: function(data) {
				$("#error").text(data);
			}
		});
		
		e.preventDefault();
	});
});