<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .error-message {
            text-align: center;
            font-size: 18px;
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .error-number {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #e74c3c;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Error Page</h1>
    <div class="error-message">{{ $message }}</div>
    <div class="error-number">{{ $number }}</div>
</div>
</body>
</html>

