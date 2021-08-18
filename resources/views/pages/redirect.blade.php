@extends('layouts/app')

@section('content')
    <div id="app">
        <redirect :variables="variables"></redirect>
    </div>
@endsection

@push('scripts')
    <script>
        variables = @json($variables)
    </script>
@endpush
