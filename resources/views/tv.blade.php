<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Colloquia - TV Screen</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="{{ url('/') }}/css/font-awesome.css" rel="stylesheet">

	<link href="css/display.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

	<div class="quarter" id="div1">
		<div class="quarter" id="div1">
			<img src="http://placekitten.com/540/270" />
		</div>

		<div class="quarter" id="div2" style="text-align:center">
			<h1 style="font-size: 25;">LARAVEL BASICS</h1>
			<h2 style="font-size: 20;"">Ronald van Dijk</h2>
			
			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> Start 10:00<h3>
				<h2 style="font-size: 20;"><i class="fa fa-language" aria-hidden="true"></i> English </h2>
			</div>

			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> End 10:30<h3>
				<h3 style="font-size: 20;"><i class="fa fa-map-marker" aria-hidden="true"></i> TN A251</h3>
			</div>
		</div>

		<div class="quarter" id="div3">
			<div class="shitz">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>
		
		<div class="quarter" id="div4">
			<img src="http://logodatabases.com/wp-content/uploads/2012/04/atos-logo.jpg" width="100%" height="100%" />

		</div>
	</div>

	<div class="quarter" id="div2">
		<div class="quarter" id="div1">
			<img src="http://placekitten.com/540/270" />
		</div>

		<div class="quarter" id="div2" style="text-align:center">
			<h1 style="font-size: 25;">LARAVEL BASICS</h1>
			<h2 style="font-size: 20;"">Ronald van Dijk</h2>
			
			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> Start 10:00<h3>
				<h2 style="font-size: 20;"><i class="fa fa-language" aria-hidden="true"></i> English </h2>
			</div>

			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> End 10:30<h3>
				<h3 style="font-size: 20;"><i class="fa fa-map-marker" aria-hidden="true"></i> TN A251</h3>
			</div>
		</div>

		<div class="quarter" id="div3">
			<div class="shitz">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		</div>
		
		<div class="quarter" id="div4">
			<img src="http://logodatabases.com/wp-content/uploads/2012/04/atos-logo.jpg" width="100%" height="100%" />

		</div>
	</div>

	<div class="quarter" id="div3">
		<div class="quarter" id="div1">
			<img src="http://placekitten.com/540/270" />
		</div>

		<div class="quarter" id="div2" style="text-align:center">
			<h1 style="font-size: 25;">LARAVEL BASICS</h1>
			<h2 style="font-size: 20;"">Ronald van Dijk</h2>
			
			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> Start 10:00<h3>
				<h2 style="font-size: 20;"><i class="fa fa-language" aria-hidden="true"></i> English </h2>
			</div>

			<div class="col-md-6">
				<h3 style="font-size: 20;"><i class="fa fa-clock-o" aria-hidden="true"></i> End 10:30<h3>
				<h3 style="font-size: 20;"><i class="fa fa-map-marker" aria-hidden="true"></i> TN A251</h3>
			</div>
		</div>

		<div class="quarter" id="div3">
			<div class="shitz">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
		</div>
		
		<div class="quarter" id="div4">
			<img src="http://logodatabases.com/wp-content/uploads/2012/04/atos-logo.jpg" width="100%" height="100%" />

		</div>
	</div>

	<div class="quarter" style="overflow:hidden" id="div4">
		<table class="table table-striped ">
			<tr>
				<th>
					<i class="fa fa-clock-o" aria-hidden="true"></i> Start
				</th>
				<th>
					<i class="fa fa-clock-o" aria-hidden="true"></i> End
				</th>
				<th>
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i> Title
				</th>
				<th>
					<i class="fa fa-address-card" aria-hidden="true"></i> Speaker
				</th>
<!-- 				<th>
					<i class="fa fa-globe" aria-hidden="true"></i> Location
				</th> -->
				<th>
					<i class="fa fa-map-marker" aria-hidden="true"></i> Room
				</th>
				<th>
					<i class="fa fa-language" aria-hidden="true"></i> Language
				</th>
				<th>
				<i class="fa fa-info" aria-hidden="true"></i> Theme
				</th>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					History of Dresses
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					French
				</td>
				<td>
					Fashion
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Vingerhaken voor Beginners
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					Dutch
				</td>
				<td>
					Hobby
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
			<tr>
				<td>
					10:00
				</td>
				<td>
					10:30
				</td>
				<td>
					Laravel Basics
				</td>
				<td>
					Ronald van Dijk
				</td>
				<td>
					TN D254
				</td>
				<td>
					English
				</td>
				<td>
					Computing Sciences
				</td>
			</tr>
		</table>
	</div>

</body>
</html>