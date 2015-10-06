{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('festival_id', 'Festival_id:') !!}
			{!! Form::text('festival_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}