$(document).ready(function() {	
	$("#register-form").submit(function(e) {
		var url = "ajax/accounts/register.php";
		
		if ($("#error").text() != "")
			$("#error").text("...");
		$.ajax({
			type: "POST",
			url: url,
			data: $("#register-form").serialize(),
			success: function(data) {
				if (data == "Registration successful.") {
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