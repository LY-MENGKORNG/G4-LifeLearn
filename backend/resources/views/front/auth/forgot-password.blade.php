<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e7ad7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgb(239, 222, 226);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="email"] {
            width: calc(100% - 10px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="email"]:focus {
            border-color: #007BFF;
            outline: none;
            justify-content: center
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="forgot-form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <h2>Form forgot Password</h2>
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="forgot-input">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" :value="old('email', $email)" required autofocus>
            </div>
            <div class="reset-input">
                <button type="submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</body>

</html>
