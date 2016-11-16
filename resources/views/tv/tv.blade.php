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
	<link rel="stylesheet" href="{{ url('/') }}/css/bootstrap/bootstrap.min.css" >

    <link href="{{ url('/') }}/css/font-awesome.css" rel="stylesheet">

	<link href="{{ url('/') }}/css/tv.css" rel="stylesheet" type="text/css">

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
<body style="background-color: ;">

	@foreach( $colloquia->shuffle() as $colloquium)
		@if($loop->iteration >= 4)
			@continue
		@endif

		@include('/tv/colloquium', ['colloquium' => $colloquium ])
	@endforeach

	@for($i = $colloquia->count(); $i < 3; $i++)
		<div class="quarter">
			<img class="img-responsive" src="/images/logoTransparent.png" width="100%" height="100%" />
		</div>
	@endfor

	<div class="quarter smaller" style="overflow:hidden">
		<div class="title-bar" style="width: 100%;text-align: center; height: 95px">
			<h1>
				Upcoming Public Colloquia
			</h1>
		</div>
		<table class="table table-striped">
			<tr>
				<th>
					<i class="fa fa-clock-o" aria-hidden="true"></i> Start
				</th>
				<th>
					<i class="fa fa-clock-o" aria-hidden="true"></i> End
				</th>
				<th style="width: 700px;">
					<i class="fa fa-lightbulb-o" aria-hidden="true"></i> Title
				</th>
				<th>
					<i class="fa fa-user" aria-hidden="true"></i> Speaker
				</th>
				<th>
					<i class="fa fa-map-marker" aria-hidden="true"></i> Room
				</th>
				<th style="width: 200px;">
					<i class="fa fa-language" aria-hidden="true"></i> Language
				</th>
				<th style="width: 120px;">
				<i class="fa fa-qrcode" aria-hidden="true"></i> QR
				</th>
			</tr>
			@foreach( $colloquia as $colloquium )
				@include('/tv/table', ['colloquium' => $colloquium])
			@endforeach
		</table>
		<div class="advert">
			<img src="/images/logoTransparentNarrow.png" height="100%"/>
			<img src="/images/realtime.jpg" height="100%"/>
			<img src="/images/glitch.jpg" height="100%"/>
			<img src="/images/kic.png" height="100%"/>
		</div>
</div>
</body>
</html>
