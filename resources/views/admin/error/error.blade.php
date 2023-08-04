<!DOCTYPE html>
<html>
<head>
    <title>Search Error Number</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-right: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding-right: 1px
        }

        button[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Search Error Number</h2>
    <form action="{{ route('errorFind') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="error_number">Error Number:</label>
            <input type="text" id="error_number" name="error_number" placeholder="Enter the error number" required>
        </div>
        <button type="submit">Search</button>
    </form>
</div>
</body>
</html>
