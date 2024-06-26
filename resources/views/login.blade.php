<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee App</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script>
    $(document).ready(function() {
        $("#show-password").click(function() {
            var passwordField = $("#password");
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                // $(this).html('<i class="fa fa-eye-slash"></i>');
                $(this).html("Hide");
            } else {
                passwordField.attr('type', 'password');
                // $(this).html('<i class="fa fa-eye"></i>');
                $(this).html("Show");
            }
        });
    });
    </script>
</head>

<body>
    <div class="container register-form">
        <h1>Login Here!</h1>
        <img src="data:image/png;base64,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"
            alt="Registration Image">
        <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif -->
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if (Session::has('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="form-group mb-2">
                <label for="email_add" class="label-style">Email Address</label>
                <input type="email" class="form-control" name="email_add" placeholder="Email Address">
            </div>
            <div class="form-group mb-2">
                <label for="password" class="label-style">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <span class="input-group-text" id="show-password">
                        <i class="fa fa-eye" style="color: black;">show</i>
                    </span>

                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
            <div class="float-right mb-3">
                <a href="/register">Create an account!</a>
            </div>
        </form>
    </div>
</body>

</html>