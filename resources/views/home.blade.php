<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-image: url('{{ asset('images/lease.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    @include('partials.nav')
    <div class="container mt-5">
        <h1>Welcome to the Leasing App</h1>
        <p>Select an option from the menu.</p>
    </div>
</body>
</html>
