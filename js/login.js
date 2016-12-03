$(document).ready(function() {
	$("#login").submit(function(e) {
		var url = "http://localhost/ajax/accounts/login.php";
		
		if ($("#error").text() != "")
			$("#error").text("...");
		$.ajax({
			type: "POST",
			url: url,
			data: $("#login").serialize(),
			success: function(data) {
				if (data == "Login successful.") {
					window.location = "profile.php";
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