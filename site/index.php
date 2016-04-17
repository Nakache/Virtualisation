<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Cloud Camp</title>
	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/main.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Fractal Land</a>
			<ul class="right hide-on-med-and-down">
				<li>
					<a href="index.php">Fractale</a>
				</li>
				<li>
					<a href="calculatrice.html">Calcula'Thor</a>
				</li>
			</ul>

		</div>
	</nav>
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<br>

			<form class="col s12" action="#" method="post">
				<div class="center-things">
					<div class="row">
						<div class="input-field col s6">
							<input id="input_text" type="text" name="iteration" class="inputvalue">
							<label for="input_text">Entrez le nombre d'itérations pour votre fractale</label>
							<center><input class="btn" type="button" id="btn-send" value="Envoyer"></center>
						</div>
					</div>
				</div>
			</form>

			<center><div class="row">
				<canvas class="graph" id="graph" width="600" height="600" style="border:1px solid #c3c3c3;">
				</canvas>
			</div></center>

		</div>
	</div>

	<!--  Scripts-->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/materialize.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("#btn-send").click(function() {
				var iteration = $(".inputvalue").val();
				var settings = {
					"async": true,
					"crossDomain": true,
					"url": "https://ua3vih6i70.execute-api.eu-west-1.amazonaws.com/prod/question",
					"method": "POST",
					"headers": {
						"content-type": "application/x-www-form-urlencoded",
						"x-amz-date": "20160417T091021Z",
						"authorization": "AWS4-HMAC-SHA256 Credential=AKIAJ335NJBMVH4HYBPQ/20160417/eu-west-1/execute-api/aws4_request, SignedHeaders=content-length;content-type;host;x-amz-date, Signature=a6608dabc3d4b18f1d4f8ae086eb51b51606fdfd055c9dc22928a620d76fe11e",
					},
					data: JSON.stringify({"n" : parseInt(iteration)})
				}

				$.ajax(settings).done(function (response) {
					console.log(response);
					var x = 600;
					var y = 600;

					var gd = document.getElementById("graph");
					var ctx = gd.getContext("2d");

					for (var i = 0; i < x; i++) { 
						for (var j = 0; j < y ; j++) {
							if (response[i][j] == 0) {
								ctx.fillStyle = "#29b5f8";
								ctx.fillRect(i, j, 1, 1);
							}
							else 
								ctx.fillStyle = "white";
							ctx.fillRect(i, j, 1, 1);
						}
					}
				});
			});
		});
	</script>
	<footer class="page-footer light-blue">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Fractal Land</h5>
					<p class="grey-text text-lighten-4">Générateur de fractales simples.</p>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				Copyright 2016 © Fractal Land
			</div>
		</div>
	</footer>
</body>
</html>
