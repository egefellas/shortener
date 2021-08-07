@extends('layouts.app')

@section('content')
    @include('layouts.errors')
    <form action="{{ route('url.set') }}" method="post">
        @csrf
        <div style="margin: 10px;padding: 20px;display: flex;justify-content: center">
            <input type="text" name="link" placeholder="https://mydomain.com/my-product" style="padding: 20px 15px;width: 70%;border: 2px solid #ccc;border-radius: 10px;box-sizing: border-box;">
            <button style="background-color: #2a9d8f; color:#ffffff;border: #34a0a4;border-radius: 10px;font-weight: 500;padding: 10px 20px; margin-left: 1px">Shorten My Link!</button>
        </div>
    </form>
@endsection
