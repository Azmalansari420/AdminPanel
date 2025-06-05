<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>500 Not Found</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            overflow: hidden;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .error-container {
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        .error-title {
            font-size: 140px;
            font-weight: bold;
            animation: bounce 1.5s infinite;
            color: #fff;
            text-shadow: 2px 2px #00000020;
        }

        .error-text {
            font-size: 24px;
            margin-top: -20px;
            margin-bottom: 30px;
            animation: fadeInUp 2s ease-in-out;
        }

        a.button {
            padding: 12px 25px;
            background-color: #fff;
            color: #ff416c;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        a.button:hover {
            background-color: #ffe5ec;
            color: #ff4b2b;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-title">500</div>
        <div class="error-text">Internal Server Error.</div>
        <a class="button" href="{{ url('/') }}">Go to Homepage</a>
    </div>
</body>
</html>
