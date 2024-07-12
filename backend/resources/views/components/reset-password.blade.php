<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .reset-form {
            width: 600px;
            margin: auto;
            padding: 15px;
            background: white;
            border-radius: 5px;
        }
        .reset-input {
            display: flex;
            flex-direction: column;
        }
        .reset-input input {
            border-radius: 5px;
        }
        .reset-input button {
            padding: 5px;
            margin-top: 10px;
            background: rgb(26, 218, 218);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form class="reset-form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <h2>Form Reset Password</h2>
        <!-- Password Reset Token -->
        {{-- <input  type="hidden" name="token" value="{{ $token }}"> --}}
        <!-- Email Address -->
        <div class="reset-input">
            <label for="email">Email</label>
            {{-- <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $email)" required autofocus /> --}}
            <input type="email" name="email" id="email" required>
        </div>
        <div class="reset-input">
            <label for="password">Password</label>
            {{-- <x-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password', $password)" required autofocus /> --}}
            <input type="password" name="password" id="password" required>
        </div>
        <div class="reset-input">
            <label for="password">Confirm Passwrod</label>
            {{-- <x-input id="password" class="block mt-1 w-full" type="email" name="email" :value="old('email', $email)" required autofocus /> --}}
            <input type="password" name="password_confirmation" id="password" required>
        </div>
        <div class="reset-input">
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>