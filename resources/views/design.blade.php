<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Progress Bars - Выберите дизайн</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
            font-family: 'Roboto', sans-serif;
            color: #fff;
        }

        .header {
            text-align: center;
            padding: 40px 20px;
            background: rgba(0, 0, 0, 0.3);
            margin-bottom: 40px;
        }

        .header h1 {
            font-size: 2.5em;
            margin: 0;
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .header p {
            font-size: 1.2em;
            max-width: 800px;
            margin: 20px auto;
            line-height: 1.6;
            color: #ccc;
        }

        .design-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            padding: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .design-option {
            width: 300px;
            padding: 25px;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .design-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.05);
            z-index: 1;
        }

        .design-option:hover {
            transform: translateY(-10px);
        }

        .design-option h2 {
            margin-top: 0;
            position: relative;
            z-index: 2;
        }

        .design-option p {
            margin-bottom: 25px;
            position: relative;
            z-index: 2;
            color: #ccc;
        }

        .design-option button {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        /* Retro Design */
        .retro {
            background-color: #000;
            border: 2px solid #0f0;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
        }

        .retro:hover {
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.4);
        }

        .retro button {
            background-color: #0f0;
            color: #000;
        }

        .retro button:hover {
            background-color: #00ff00;
            box-shadow: 0 0 15px #0f0;
        }

        /* Modern Design */
        .modern {
            background-color: #fff;
            border: 2px solid #007bff;
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.2);
        }

        .modern:hover {
            box-shadow: 0 0 30px rgba(0, 123, 255, 0.4);
        }

        .modern h2, .modern p {
            color: #333;
        }

        .modern button {
            background-color: #007bff;
            color: #fff;
        }

        .modern button:hover {
            background-color: #0056b3;
            box-shadow: 0 0 15px #007bff;
        }

        /* Minimal Design */
        .minimal {
            background-color: #f8f9fa;
            border: 2px solid #333;
            box-shadow: 0 0 20px rgba(51, 51, 51, 0.2);
        }

        .minimal:hover {
            box-shadow: 0 0 30px rgba(51, 51, 51, 0.4);
        }

        .minimal h2, .minimal p {
            color: #333;
        }

        .minimal button {
            background-color: #333;
            color: #fff;
        }

        .minimal button:hover {
            background-color: #444;
            box-shadow: 0 0 15px #333;
        }

        /* Neon Design */
        .neon {
            background-color: #1a1a1a;
            border: 2px solid #ff00ff;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.2);
        }

        .neon:hover {
            box-shadow: 0 0 30px rgba(255, 0, 255, 0.4);
        }

        .neon button {
            background-color: #ff00ff;
            color: #fff;
            text-shadow: 0 0 5px #fff;
        }

        .neon button:hover {
            background-color: #ff33ff;
            box-shadow: 0 0 15px #ff00ff;
        }

        /* Dark Design */
        .dark {
            background-color: #121212;
            border: 2px solid #333;
            box-shadow: 0 0 20px rgba(51, 51, 51, 0.2);
        }

        .dark:hover {
            box-shadow: 0 0 30px rgba(51, 51, 51, 0.4);
        }

        .dark button {
            background-color: #333;
            color: #fff;
        }

        .dark button:hover {
            background-color: #444;
            box-shadow: 0 0 15px #333;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <h1>Progress Bars</h1>
        <p>Управляйте своими задачами с помощью интерактивных прогресс-баров. Создавайте, отслеживайте и отмечайте выполнение ваших целей. Выберите дизайн, который лучше всего подходит вашему стилю.</p>
    </div>

    <div class="design-container">
        <div class="design-option minimal">
            <h2>Минималистичный</h2>
            <p>Простой и элегантный дизайн с акцентом на функциональность и чистоту</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="minimal">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option retro">
            <h2>Ретро</h2>
            <p>Классический ретро-стиль с зеленым текстом на черном фоне, вдохновленный старыми компьютерными терминалами</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="retro">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option dark">
            <h2>Темный</h2>
            <p>Темная тема с контрастными элементами, идеально подходит для работы в ночное время</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="dark">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option neon">
            <h2>Неон</h2>
            <p>Яркий неоновый стиль с розовыми акцентами и эффектом свечения</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="neon">
                <button type="submit">Выбрать</button>
            </form>
        </div>

        <div class="design-option modern">
            <h2>Современный</h2>
            <p>Современный дизайн с синими акцентами, чистый и профессиональный стиль</p>
            <form action="{{ route('select-design') }}" method="POST">
                @csrf
                <input type="hidden" name="design" value="modern">
                <button type="submit">Выбрать</button>
            </form>
        </div>
    </div>
</body>
</html> 