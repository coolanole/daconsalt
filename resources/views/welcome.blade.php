<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>URL Shortener</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <h1>URL Shortener</h1>

            <div class="card">
                <div class="card-body">
                    <links-creating-form link-create-url="{{ route('api.links.store') }}" base-url="{{ url('') }}"></links-creating-form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
