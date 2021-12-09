@extends('layouts.guest')

@section('content')
    {{ Form::open(['url' => 'login', 'method' => 'post']) }}
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

    {{ Form::submit('Login', ['class' => 'btn btn-lg btn-primary mt-3']) }}

    {{ Form::close() }}

    <p>or <a href="/register">Register</a></p>
@stop
