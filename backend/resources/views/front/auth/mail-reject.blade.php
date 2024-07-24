<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reject the request</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
            font-size: 16px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #999;
        }

        button {
            padding: 12px 25px;
            border-radius: 20px;
            border: none;
            color: white;
            background: tomato;
        }

        a {
            text-decoration: none;
            color: #333;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>LifeLearn App</h1>
        <p>Hi, {{ $recipient }}</p>
        <p>Your application have been rejected!😔</p>
    </div>
</body>

</html>
