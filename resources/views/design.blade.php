<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Выберите дизайн</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .design-container {
            display: flex;
            gap: 20px;
            padding: 20px;
        }

        .design-option {
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
            text-align: center;
        }

        .design-option:hover {
            transform: scale(1.05);
        }

        .design-option h2 {
            margin-top: 0;
        }

        .design-option p {
            margin-bottom: 20px;
        }

        .design-option button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Retro Design */
        .retro {
            background-color: #000;
            color: #0f0;
            border: 2px solid #0f0;
        }

        .retro button {
            background-color: #0f0;
            color: #000;
        }

        /* Modern Design */
        .modern {
            background-color: #fff;
            color: #333;
            border: 2px solid #007bff;
        }

        .modern button {
            background-color: #007bff;
            color: #fff;
        }

        /* Minimal Design */
        .minimal {
            background-color: #f8f9fa;
            color: #333;
            border: 2px solid #333;
        }

        .minimal button {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="design-container">
        <div class="design-option retro">
            <h2>Ретро</h2>
            <p>Классический ретро-стиль с зеленым текстом на черном фоне</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="retro">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option modern">
            <h2>Современный</h2>
            <p>Современный дизайн с синими акцентами</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="modern">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option minimal">
            <h2>Минималистичный</h2>
            <p>Простой и элегантный дизайн</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="minimal">
                <button type="submit">Выбрать</button>
            </form>
        </div>
    </div>
</body>
</html> 