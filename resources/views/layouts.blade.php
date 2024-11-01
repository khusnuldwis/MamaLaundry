<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mama Laundry - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #f0f9ff 0%, #e1f0ff 100%);
        }

        .container {
            /* width: 100%; */
            /* max-width: 1200px; */
            margin: auto;
            justify-items: center;
            /* padding: 20px; */
            position: relative;
        }

        .login-section {
            /* max-width: 400px; */
            width: 400px;
            /* margin: 40px 0; */
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        /* .logo img {
            width: 40px;
            height: 40px;
        } */

        .logo span {
            font-size: 24px;
            font-weight: bold;
        }

        h2 {
            color: #004AAD;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: none;
            border-bottom: 1px solid #ccc;
            background: transparent;
            outline: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        input::placeholder {
            color: #c7cbce;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 25px;
            background-color: #1a237e;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #0d1757;
        }

        .phone-number {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            color: #333;
        }

        /* Top-right image styling */
        .corner-image-top-right {
            position: absolute;
            top: 0;
            right: 0;
            width: 450px;
            height: auto;
        }

        /* Bottom-left image styling */
        .corner-image-bottom-left {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 450px;
            height: auto;
        }

        @media (max-width: 768px) {
            .phone-number {
                position: static;
                margin-top: 20px;
                justify-content: center;
            }

            .corner-image-top-right,
            .corner-image-bottom-left {
                width: 330px;
                /* Smaller size for mobile screens */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-section">
            <div class="logo">
                <img src="{{ asset('img/landingPage/logo-mamalaundry.png') }}" style="width: 150px; height: 130px;"
                    alt="Mama Laundry Logo">
                {{-- <span><h5>Mama Laundry</h5></span> --}}
            </div>

            {{-- <h5>Login Untuk Akunmu</h5> --}}

           @yield('content')
        </div>

        <div class="phone-number">
            <i class="fas fa-phone"></i>
            <span>+62 858 7596 1416</span>
        </div>
    </div>

    <div class="decoration">
        <!-- Top Right Image -->
        <img class="corner-image-top-right" src="{{ asset('img/landingPage/ilustrasi1.png') }}" alt="Top Right Image">
        <!-- Bottom Left Image -->
        <img class="corner-image-bottom-left" src="{{ asset('img/landingPage/ilustrasi2.png') }}"
            alt="Bottom Left Image">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
