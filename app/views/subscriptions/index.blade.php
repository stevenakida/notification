

<h1>Clients and Their Respective Services</h1>


<table class="data">
  <tr>
    <th>Client</th>
    <th>Service</th>
    <th>Expires At</th>
  </tr>

@foreach ($clients as $client)
  <tr>

    <td>{{ $client['name'] }}</td>
    <td>
    @if ($client['services'])
		@foreach ($client['services'] as $services)

			{{ $services['name'] }}
	<br>

		@endforeach
	@else
		{{ 'nil' }}
	@endif
	</td>
    <td>
    @if ($client['services'])
		@foreach ($client['services'] as $services)
			{{ $services['pivot']['expires_at'] }}
	<br>

		@endforeach
	@else
		{{ 'N/A' }}
	@endif
<br>
	</td>
</tr>

@endforeach
</table>
