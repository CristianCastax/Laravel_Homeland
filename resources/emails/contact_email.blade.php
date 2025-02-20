<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }
        .header {
            background-color: #007BFF;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #007BFF;
        }
        .footer {
            background-color: #f4f4f4;
            color: #777777;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Hola, {{ $contact->name }}!</h1>
        </div>
        <div class="content">
            <h2>Has recibido un nuevo mensaje</h2>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Asunto:</strong> {{ $contact->subject }}</p>
            <p><strong>Mensaje:</strong></p>
            <p>{{ $contact->message }}</p>
        </div>
        <div class="footer">
            <p>Este correo electrónico fue generado automáticamente. Por favor, no respondas a este mensaje.</p>
        </div>
    </div>
</body>
</html>
