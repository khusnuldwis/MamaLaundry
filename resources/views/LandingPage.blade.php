<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mama Laundry - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            width: 100%;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            position: relative;
        }

        .login-section {
            max-width: 400px;
            margin: 40px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .logo img {
            width: 40px;
            height: 40px;
        }

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
            font-size: 16px;
            outline: none;
        }

        input::placeholder {
            color: #999;
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

        .decoration {
            position: fixed;
            right: 0;
            top: 0;
            width: 50%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
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

        .illustration {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
        }

        /* New styles for additional images */
        .corner-image-top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 80px; /* Adjust the size as needed */
        }

        .corner-image-bottom-left {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 80px; /* Adjust the size as needed */
        }

        @media (max-width: 768px) {
            .decoration {
                display: none;
            }
            
            .phone-number {
                position: static;
                margin-top: 20px;
                justify-content: center;
            }
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="login-section">
            <div class="logo">
                <img src="{{ asset('img/logo-mamalaundry.png') }}" alt="Mama Laundry Logo">
                <span>Mama Laundry</span>
            </div>
            
            <h2>Login Untuk Akunmu</h2>
            
            <form>
                <div class="input-group">
                    <input type="text" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
        </div>

        <div class="phone-number">
            <img src="/api/placeholder/24/24" alt="Phone Icon">
            <span>+62 858 7596 1416</span>
        </div>
    </div>

    <div class="decoration">
        {{-- <div class="illustration">
            <img src="/api/placeholder/300/300" alt="Laundry Illustration">
        </div> --}}
        <!-- Top Right Image -->
        <img class="corner-image-top-right" src="{{ asset('img/logo-ilustrasi1.png') }}" alt="Top Right Image">
        <!-- Bottom Left Image -->
        <img class="corner-image-bottom-left" src="{{ asset('img/logo-ilustrasi2.png') }}" alt="Bottom Left Image">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
