<div class="quarter" >
	<div class="quarter">
		<img style="display:block;
    margin:auto;" src="{{ $colloquium->user->image or 'http://placekitten.com/540/270'}}" />
	</div>

	<div class="quarter"  style="text-align:center">
		<h4>{{ $colloquium->title }}</h4>
		<h4>{{ $colloquium->user->present()->full_name() }}</h4>
		
		<div class="col-md-6">
			<h4><i class="fa fa-clock-o" aria-hidden="true"></i> Start {{ $colloquium->start_date }}<h4>
			<h4><i class="fa fa-language" aria-hidden="true"></i> {{ $colloquium->language_id }}</h4>
		</div>

		<div class="col-md-6">
			<h4><i class="fa fa-clock-o" aria-hidden="true"></i> End {{ $colloquium->end_date }}<h4>
			<h4><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $colloquium->room->building->name }} {{ $colloquium->room->name }}</h4>
		</div>
	</div>

	<div class="quarter">
		<div class="shitz">
			{{ $colloquium->description }}
		</div>
	</div>
	
	<div class="quarter">
		<img src="{{ $colloquium->company_image or 'http://logodatabases.com/wp-content/uploads/2012/04/atos-logo.jpg'}}" width="100%" height="100%" />

	</div>
</div>