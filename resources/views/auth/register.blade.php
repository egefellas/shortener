@extends('layouts.app')

@section('content')
    <div id="app">
        <Register postUrl="{{ route('register.post') }}"></Register>
    </div>
@endsection
