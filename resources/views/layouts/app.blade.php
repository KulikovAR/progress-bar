<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Progress Bars</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Press Start 2P', cursive;
            background-color: #000;
            color: #0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .progress-bar {
            background-color: #333;
            border: 2px solid #0f0;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .progress-bar h3 {
            margin-top: 0;
            color: #0f0;
        }
        .progress-container {
            width: 100%;
            background-color: #222;
            border: 1px solid #0f0;
            height: 30px;
            margin: 10px 0;
        }
        .progress {
            height: 100%;
            background-color: #0f0;
            width: 0%;
            transition: width 0.3s ease;
        }
        button {
            background-color: #0f0;
            color: #000;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
        }
        button:hover {
            background-color: #00ff00;
        }
        .add-form {
            margin-bottom: 30px;
        }
        input[type="text"] {
            background-color: #222;
            border: 2px solid #0f0;
            color: #0f0;
            padding: 10px;
            font-family: 'Press Start 2P', cursive;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html> 