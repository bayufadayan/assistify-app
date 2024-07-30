<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Assistify</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="shortcut icon" href="assets/images/favikon.png" type="image/x-icon">

    <link rel="stylesheet" href="style/login_style.css">
</head>

<body>
    <div class="mylogo">
        <div class="logo">
            <img src="assets/images/Primary-Secondary.png" alt="logo">
        </div>
    </div>
    <div class="mycontainer mt-5 container">
        <div class="container mt-4">
            <h2>Login</h2>
            <hr>

            <!-- Menampilkan Pesan Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach

                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group password-container">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <img src="https://img.icons8.com/ios-filled/20/000000/visible.png" alt="Show Password">
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="mt-3">
                Belum punya akun? <a href="{{ route('register') }}">Register di sini</a>
            </p>
        </div>
    </div>

    <script src="script/register_script.js"></script>
</body>

</html>
