@extends('layout.master')

@section('content')


{!! Form::open(array('route' => 'mm_store', 'method' => 'POST')) !!}
<ul>
    <li>
        {!! Form::label('festival_id', 'Festival_id:') !!}
        {!! Form::text('festival_id') !!}
    </li>
    <li>
        {!! Form::label('file_type', 'File_type:') !!}
        {!! Form::text('file_type') !!}
    </li>
    <li>
        {!! Form::label('filename', 'Filename:') !!}
        {!! Form::text('filename') !!}
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}
@stop