@extends('layouts.guest')

@section('content')
    {{ Form::open(['url' => 'register', 'method' => 'post']) }}

    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}

    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

    {{ Form::label('repeatPassword', 'Repeat Password') }}
    {{ Form::password('repeatPassword', ['class' => 'form-control', 'placeholder' => 'Repeat Password']) }}

    {{ Form::submit('Register', ['class' => 'btn btn-lg btn-primary mt-3']) }}

    {{ Form::close() }}

    <p>or <a href="/login">Login</a></p>
@stop
