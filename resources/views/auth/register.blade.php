<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section class="login d-flex align-items-center" style="width: 100%; height: 100vh;">
        <div class="container card" style="width: 30%;">
            <h1>Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                        name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation">
                </div>
                <div class="mb-3 d-flex flex-column text-center gap-4">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{ route('login') }}">Already have an account? Login here.</a>
                </div>
            </form>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
