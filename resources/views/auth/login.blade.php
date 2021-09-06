@extends('layouts.app')

@section('content')
    <div id="app">
        <Login
            postUrl="{{ route('login.post') }}">
        </Login>
    </div>
@endsection
