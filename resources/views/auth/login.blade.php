@extends('layouts.app')

@section('content')
    <div id="app">
        <Login postUrl="{{ route('login_post') }}"></Login>
    </div>
@endsection
