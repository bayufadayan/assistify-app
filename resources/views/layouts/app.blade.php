<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style>
        .btn-outline-danger.active, .btn-outline-danger:active, .btn-outline-danger:focus {
            background-color: red;
            color: white;
            border-color: red;
        }
        .btn-outline-warning.active, .btn-outline-warning:active, .btn-outline-warning:focus {
            background-color: yellow;
            color: black;
            border-color: yellow;
        }
        .btn-outline-success.active, .btn-outline-success:active, .btn-outline-success:focus {
            background-color: green;
            color: white;
            border-color: green;
        }
    </style>
</head>
<body class="font-sans antialiased">
    @include('layouts.navigation')

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Tambahkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan script Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Script untuk mengatur warna solid pada kotak yang dipilih -->
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').change(function(){
                $('input[type="radio"][name="' + $(this).attr('name') + '"]').closest('label').removeClass('active');
                $(this).closest('label').addClass('active');
            });
        });
    </script>
</body>
</html>
