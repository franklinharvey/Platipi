$(document).ready(function() {
	$("#profile-form").submit(function(e) {
		var url = "ajax/profiles/update_profile.php";
		
		var interests = [];
		
		$("input[type='checkbox']").each(function() {
			if ($(this).is(":checked"))
				interests.push($(this).val());
		});
		
		if ($("#error").text() != "")
			$("#error").text("...");
		$.ajax({
			type: "POST",
			url: url,
			data: {
				first_name: $("#first_name").val(),
				bio: $("#bio").val(),
				interests: interests
			},
			success: function(data) {
				if (data == "Profile updated successfully.") {
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
