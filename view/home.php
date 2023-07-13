
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A28089;
            padding: 20px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            background-color: #FFF;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #A28089;
            color: #FFF;
            text-decoration: none;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #885F6B;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome User </h1>
        <a href="../controller/login.php" class="btn">Login</a>
        <a href="../controller/register.php" class="btn">Register</a>
    </div>
</body>
</html>
