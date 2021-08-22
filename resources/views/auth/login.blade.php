@extends('layouts.app')

@section('content')
    <div id="app">
        <Login postUrl="{{ route('login_post') }}" token='{{  csrf_token() }}'></Login>
    </div>
@endsection
