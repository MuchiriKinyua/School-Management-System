<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SchoolERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: blue;">

    <div class="container text-center mt-5">
        <img src="https://img.icons8.com/ios-filled/100/000000/school.png" alt="SchoolERP Logo">
        <h1 class="display-4 mt-3">Welcome to SchoolERP</h1>
        <p class="lead">Your all-in-one platform for school management</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Register</a>
        </div>

        <footer class="mt-5 text-muted">
            &copy; {{ date('Y') }} SchoolERP by Muchiri. All rights reserved.
        </footer>
    </div>

</body>
</html>
