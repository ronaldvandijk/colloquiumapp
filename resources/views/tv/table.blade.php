<tr>
	<td>
		{!! $colloquium->start_date->format('H:i \<\b\r\> d M Y') !!}
	</td>
	<td>
		{!! $colloquium->end_date->format('H:i') !!}
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
		<img src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(75)->generate(url('agenda/show/' . $colloquium->id))) !!}">
	</td>
</tr>
