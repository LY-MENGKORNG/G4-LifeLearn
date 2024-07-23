<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite</title>
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
            background: rgb(6, 167, 167);
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
        <p>Dear {{ $recipient }}, </p>
        <p> Invitation to join the system</p>
        <p>Best regards,</p>
        <p>{{ $from }}</p>
        <div class="footer">
            <form action="http://localhost:8000/api/accept-invite" method="POST">
                @csrf
                <input type="hidden" name="email" value="{{ $recipient }}">
                <input type="hidden" name="from_mail" value="{{ $from }}">
                <button>Go to site</button>
            </form> 
        </div>
    </div>
</body>

</html>
