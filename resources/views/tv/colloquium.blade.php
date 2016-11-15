<div class="quarter" >
<!-- 	<div class="quarter">
		<img style="display:block;
    margin:auto;" class="img-responsive" src="{{ $colloquium->user->imagez or '/images/realtime.jpg'}}" />
	</div> -->

	<!-- <div class="quarter"  style="text-align:center"> -->
<!-- 		<div style="margin: 15px;" class="table-holder">
			<table style="margin-bottom:-1px;" class="table table-bordered">
					<tr style="background: #ff5600; color:white;">
						<td>
							<h4><b>{{ $colloquium->title }}</b></h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4><b>Speaker:</b> {{ $colloquium->user->present()->full_name() }}</h4>
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
		</div> -->
		<div class="title-bar">
			<h1>{{ $colloquium->title }}</h1>
		</div>
		<br>
		<div class="row">
			<div class="col-md-4">
				<!-- <img style="width: 100%; height: auto" src="http://placehold.it/600x800" alt="" class="img-responsive"> -->
				<img style="display:block; margin:auto; width: 100%;" class="img-responsive" src="{{ $colloquium->user->imagez or '/images/realtime.jpg'}}" />
			</div>
			<div class="col-md-8">
				<div style="margin: 15px;" class="table-holder panel">
<!-- 					<table class="table table-bordered">
							<tr>
								<td>
									<h4><b>Speaker:</b> edederfetetetet</h4>
								</td>
							</tr>
					</table> -->
				<div class="panel-body">
					<table class="table ">
						<tr>
							<td>
								<h4><i class="fa fa-user" aria-hidden="true"></i><b> Speaker: </b><h4>
							</td>
							<td>
								{{ $colloquium->user->present()->full_name() }}
							</td>
						<tr>
							<td>
								<h4><i class="fa fa-clock-o" aria-hidden="true"></i><b> Start Time</b><h4>
							</td>
							<td>
								{{ $colloquium->start_date->format('H:i, d F') }}	
							</td>
						</tr>
						<tr>
							<td>
								<h4><i class="fa fa-clock-o" aria-hidden="true"></i><b> End Time</b><h4>
							</td>
							<td>
								{{ $colloquium->end_date->format('H:i, d F') }}	
							</td>
						</tr>
						<tr>
							<td>
								<h4><i class="fa fa-map-marker" aria-hidden="true"></i><b> Location</b><h4>
							</td>
							<td>
								{{ $colloquium->room->building->name }} {{ $colloquium->room->name }}
							</td>
						</tr>
						<tr>
							<td>
								<h4><i class="fa fa-language" aria-hidden="true"></i><b> Language</b><h4>
							</td>
							<td>
								English
							</td>
						</tr>	
						<tr>
							<td>
								<h4><i class="fa fa-info" aria-hidden="true"></i><b> Themes</b><h4>
							</td>
							<td>
								@foreach($colloquium->themes as $theme)
									{!! $theme->render(30) !!}
								@endforeach
							</td>
						</tr>	
<!-- 							<tr>
							<td>
								<h4><i class="fa fa-clock-o" aria-hidden="true"></i><b> End Time</b><h4>
							</td>
							<td>
								<h4><i class="fa fa-map-marker" aria-hidden="true"></i>rerereeuirerer</h4>
							</td>
						</tr>	 -->		
					</table>
				</div>
				</div>
				<div class="company-image">
					<!-- <img src="http://placehold.it/700x200" alt=""> -->
					<!-- <img src="{{ $colloquium->company_image }}" alt=""> -->
					@if ( strlen($colloquium->company_image) > 0 )
						<img style="max-height: 252px" class="img-responsive" src="{{ $colloquium->company_image }}" width="auto" />
					@else
						<img  class="img-responsive" src="http://i.imgur.com/qByJVMB.png" width="1000px" />
					@endif
				</div>
			</div>
		</div>
		<div class="row">
				<!-- <div style="padding: -10px 20px 40px 30px" class="col-md-2">
					<img src="https://raw.githubusercontent.com/zpao/qrcode.react/master/qrcode.png" alt="" class="img-responsive">		
				</div> -->
		</div>
	</div>

<!-- 	<div class="quarter">
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
	</div> -->
</div>