<!DOCTYPE html>
<html>
<head>
    <title>Teacher Mail</title>
</head>
<body>
   
    <p>Email: {{$Mail_data['first_name'] }}</p>
     <h1>Welcome, {{ $Mail_data['last_name'] }}</h1>
     <h1>Welcome, {{ $Mail_data['email'] }}</h1>
    <p>Message: {{ $Mail_data['password'] }}</p>
</body>
</html>
