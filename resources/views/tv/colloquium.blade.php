<div class="quarter" >
	<div class="quarter">
		<img style="display:block;
    margin:auto;" class="img-responsive" src="{{ $colloquium->user->imagez or '/images/realtime.jpg'}}" />
	</div>

	<div class="quarter"  style="text-align:center">
		<div style="margin: 15px;" class="table-holder">
			<table style="margin-bottom:-1px;" class="table table-bordered">
					<tr style="background: #ff5600; color:white;">
						<td>
							<h4><b>{{ $colloquium->title }}</b></h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4>{{ $colloquium->user->present()->full_name() }}</h4>
						</td>
					</tr>
			</table>
				<table class="table table-bordered">
					<tr>
						<td>
							<h4><i class="fa fa-clock-o" aria-hidden="true"></i> Start {{ $colloquium->start_date->format('H:i, d F') }}<h4>
						</td>
						<td>
							
							<h4><i class="fa fa-clock-o" aria-hidden="true"></i> End {{ $colloquium->end_date->format('H:i, d F') }}<h4>
						</td>
					</tr>		
					<tr>
						<td>
							<h4><i class="fa fa-language" aria-hidden="true"></i> {{ $colloquium->language->name }}</h4>
						</td>
						<td>
							<h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $colloquium->room->building->name }} {{ $colloquium->room->name }}</h4>
						</td>
					</tr>			
				</table>
		</div>
	</div>

	<div class="quarter">
		<div class="description">
			{{ $colloquium->description }}
		</div>
	</div>
	
	<div class="quarter">
		@if ( strlen($colloquium->company_image) > 0 )
			<img  class="img-responsive" src="{{ $colloquium->company_image }}" width="100%" height="100%" />
		@else
			<img  class="img-responsive" src="/images/logoHD.png" width="100%" height="100%" />
		@endif
	</div>
</div>