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

	<link href="css/tv.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

        setTimeout( function() {
        	window.location.reload();
        }, 150000);
    </script>
</head>
<body>

	@for($i = 0; $i < 3; ++$i)
		@if( empty($colloquia[$i]) )
			<div class="quarter"><img src="/images/logoHD.png" width="100%" height="100%" /></div>
		@else
			@include('/tv/colloquium', ['colloquium' => $colloquia[$i] ])
		@endif
	@endfor

	<div class="quarter" style="overflow:hidden">
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
			@foreach( $colloquia as $colloquium )
				@include('/tv/table', ['colloquium' => $colloquium])
			@endforeach
		</table>
</div>
</body>
</html>