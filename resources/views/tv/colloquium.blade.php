<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<div class="quarter" >
	<div class="title-bar box" style="width: 100%;text-align: center; height: 95px;">
		{{ $colloquium->title }}
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-md-4">
			<div style="background-image: url('{{ $colloquium->user->image or '/images/realtime.jpg'}}'); background-size: cover;" class="user-image-holder">
				{!! QrCode::size(150)->generate(url('agenda/show/' . $colloquium->id)); !!}
			</div>
		</div>	
		
		<div class="col-md-8">
			<div style="margin: 15px;" class="table-holder panel">
				<div class="panel-body">
					<table class="table ">
						<tr>
							<td>
								<h4>
									<i class="fa fa-user" aria-hidden="true"></i><b> Speaker: </b>
								<h4>
							</td>
							<td>
								{{ $colloquium->user->present()->full_name() }}
							</td>
						<tr>
							<td>
								<h4>
									<i class="fa fa-clock-o" aria-hidden="true"></i><b> Start Time</b>
								<h4>
							</td>
							<td>
								{{ $colloquium->start_date->format('H:i, d F') }}	
							</td>
						</tr>
						<tr>
							<td>
								<h4>
									<i class="fa fa-clock-o" aria-hidden="true"></i><b> End Time</b>
								<h4>
							</td>
							<td>
								{{ $colloquium->end_date->format('H:i') }}	
							</td>
						</tr>
						<tr>
							<td>
								<h4>
									<i class="fa fa-map-marker" aria-hidden="true"></i><b> Location</b>
								<h4>
							</td>
							<td>
								{{ $colloquium->room->building->name }} {{ $colloquium->room->name }}
							</td>
						</tr>
						<tr>
							<td>
								<h4>
									<i class="fa fa-language" aria-hidden="true"></i><b> Language</b>
								<h4>
							</td>
							<td>
								{{ $colloquium->language->name }}
							</td>
						</tr>	
						<tr>
							<td>
								<h4>
									<i class="fa fa-info" aria-hidden="true"></i><b> Themes</b>
								<h4>
							</td>
							<td>
								@foreach($colloquium->themes as $theme)
									{!! $theme->render(30, 25) !!}
								@endforeach
							</td>
						</tr>			
					</table>
				</div>
			</div>
			<h1 class="desc-title"><b>Description</b></h1>
			<br>
			<div class="table-holder panel">
				<div class="panel-body">
					<div class="description">
						<p>
							{{ $colloquium->description }}
						</p>
					</div>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="spacer"></div>
				<center>
					<div class="img-responsive company-image">
						@if ( strlen($colloquium->company_image) > 0 )
							<img style="max-height: 145px" class="" src="{{ $colloquium->company_image }}" width="auto" />
						@else
							<img style="max-height: 145px" class="" src="/images/logoTransparentNarrow.png" width="auto" />
						@endif
					</div>
				</center>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		$( '.box' ).each(function ( i, box ) {

			    var width = $( box ).width(),
			        html = '<span style="white-space:nowrap"></span>',
			        line = $( box ).wrapInner( html ).children()[ 0 ],
			        n = 74;

			    $( box ).css( 'font-size', n );

			    while ( $( line ).width() > width - 100) {
			        $( box ).css( 'font-size', --n );
			    }

			    $( box ).text( $( line ).text() );

			});
	})
	
</script>