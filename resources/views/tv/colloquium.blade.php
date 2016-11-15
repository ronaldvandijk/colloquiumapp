<div class="quarter" >
	<div class="title-bar">
		<h1>{{ $colloquium->title }}</h1>
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-md-4">
			<img style="display:block; margin:auto; width: 100%;" class="img-responsive" src="{{ $colloquium->user->imagez or '/images/realtime.jpg'}}" />
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
								{{ $colloquium->end_date->format('H:i, d F') }}	
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
								English
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
									{!! $theme->render(30) !!}
								@endforeach
							</td>
						</tr>			
					</table>
				</div>
			</div>
			
			<div class="company-image">
				@if ( strlen($colloquium->company_image) > 0 )
					<img style="max-height: 252px" class="img-responsive" src="{{ $colloquium->company_image }}" width="auto" />
				@else
					<img  class="img-responsive" src="/images/logoTransparentNarrow.png" width="1000px" />
				@endif
			</div>
		</div>
	</div>
	
	<div class="row">
		<!-- QR CODE COMES HERE -->
	</div>
</div>
