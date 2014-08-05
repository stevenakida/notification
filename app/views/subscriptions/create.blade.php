<div>
{{ Form::open(array('action' => array('SubscriptionsController@store'))) }}
<div>
	{{ Form::label('client_name', 'Client Name') }}
	{{ Form::text('client_name') }}
</div>

<div>
	{{ Form::label('service_name', 'Service Name') }}
	{{-- Form::text('service_name') --}}
		{{ Form::select('service_name', $services) }}

</div>

<div>
	{{ Form::label('period', 'Subscription Period') }}
	{{ Form::select('period', array('12' => '12 Month', '6' => '6 Month', '1' => '1 Month' )) }}

</div>

{{ form::submit('Subscribe!') }}


{{ Form::close() }}
</div>
