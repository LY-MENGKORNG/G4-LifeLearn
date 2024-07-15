<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request for joining the system</title>
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
    <h1>Hello {{$recipient}}</h1>
    <p>A new student has been added to your classroom:</p>
    <p><strong>Student Email:</strong> {{$recipient}}</p>
    <p>Thank you!</p>
</body>
</html>