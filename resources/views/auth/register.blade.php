@extends('layouts.app')

@section('content')
    <div id="app">
        <Register postUrl="{{ route('register.post') }}" token='{{  csrf_token() }}' ></Register>
    </div>
@endsection
