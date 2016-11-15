<tr>
	<td>
		{!! $colloquium->start_date->format('H:i \<\b\r\> d M Y') !!}
	</td>
	<td>
		{!! $colloquium->end_date->format('H:i \<\b\r\> d M Y') !!}
	</td>
	<td>
		{{ $colloquium->title }}
	</td>
	<td>
		{{ $colloquium->user->present()->full_name }}
	</td>
	<td>
		{{ $colloquium->room->building->name }} {{ $colloquium->room->name }}
	</td>
	<td>
		{{ $colloquium->language->name }}
	</td>
	<td>
		@foreach($colloquium->themes as $theme)
			{!! $theme->render(null, 5) !!} <div style="margin-top: 12px;"></div>
		@endforeach
	</td>
</tr>