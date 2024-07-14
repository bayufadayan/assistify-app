<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | Assistify</title>
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
            <h2>Register</h2>
            <hr>

            <!-- Menampilkan Pesan Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <span>{{ $error }}</span>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ old('email') }}">
                </div>
                <div class="form-group password-container">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <img src="https://img.icons8.com/ios-filled/20/000000/visible.png" alt="Show Password">
                    </span>
                </div>
                <div class="form-group password-container">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        required>
                    <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                        <img src="https://img.icons8.com/ios-filled/20/000000/visible.png" alt="Show Password">
                    </span>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <p class="mt-3">
                Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </div>
    </div>

    <br><br><br>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="script/register_script.js"></script>
</body>

</html>
