<!DOCTYPE html>
<html lang="en">
<head>
  <title>Platipi - Queue</title>
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
    <h1>Finding you a group<span class="blinking-cursor">|</span></h1>
    <h2>So you won't have to be <mark>alone!</mark></h2>
  </div>
  <div class="loading">
    <!-- <img src="../graphics/box.gif" class="img-responsive"> -->
    <a href="profile.php"><button id="btnStop" class="btn btnStop">Stop Looking</button></a>
  </div>
  </div>
  
  <script>
	document.getElementById("btnStop").onclick = function(){
		$.post("queue_stop.php","", function(response) {
			location.href = "profile.php";
		});
	}
	function worker() {
  		$.ajax({
		type: "POST",
    		url: "get_user_link.php", 
    		success: function(data) {
      			if (data !== 'NULL')
				location.href = "matched.php";
    		},
    		complete: function() {
      			// Schedule the next request when the current one's complete
      			setTimeout(worker, 5000);
    		}
  		});
	}
	$(document).ready(function(){
		$.post("queue_start.php","", function(response){});
		$.post("find_match.php","",function(response){});
		worker()
	});	
</script>
</body>
</html>
