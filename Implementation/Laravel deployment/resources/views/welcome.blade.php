<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SchoolERP</title>

    <!-- Bootstrap & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo {
            width: 100px;
            filter: brightness(0) invert(1);
        }
        .hero {
            text-align: center;
            padding: 50px 20px;
        }
        .btn-custom {
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background-color: #fff;
            color: #2575fc;
            font-weight: 600;
        }
        footer {
            margin-top: auto;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
            color: #dcdcdc;
        }
    </style>
</head>
<body>

    <div class="container hero">
        <img src="https://img.icons8.com/ios-filled/100/ffffff/school.png" alt="SchoolERP Logo" class="logo mb-3">
        <h1 class="display-4 fw-bold">Welcome to <span style="color: #ffd700;">SchoolERP</span></h1>
        <p class="lead mb-4">Your smart, all-in-one school management platform</p>

        <div>
            <a href="{{ route('login') }}" class="btn btn-light btn-custom me-3">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-custom">Register</a>
        </div>
    </div>

    <footer>
        &copy; {{ date('Y') }} SchoolERP by Muchiri. All rights reserved.
    </footer>

</body>
</html>
