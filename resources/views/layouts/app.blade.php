<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const forms = document.querySelectorAll('form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    if (!form.querySelector('input[name="_token"]')) {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = '_token';
                        input.value = token;
                        form.appendChild(input);
                    }

                    const formData = new FormData(form);
                    const url = form.getAttribute('action');
                    const method = form.querySelector('input[name="_method"]')?.value || 'POST';

                    // Для PUT и DELETE запросов используем POST с _method
                    const actualMethod = method === 'PUT' || method === 'DELETE' ? 'POST' : method;
                    if (method === 'PUT' || method === 'DELETE') {
                        formData.append('_method', method);
                    }

                    // Обрабатываем увеличение/уменьшение значения
                    if (method === 'PUT') {
                        const currentValue = parseInt(form.querySelector('input[name="value"]').value);
                        const buttonText = form.querySelector('button[type="submit"]').textContent;
                        const newValue = buttonText === '+10' ? currentValue + 10 : currentValue - 10;
                        formData.set('value', newValue);
                    }

                    fetch(url, {
                        method: actualMethod,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': token
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const progressBar = form.closest('.progress-bar');
                            if (progressBar) {
                                if (method === 'DELETE') {
                                    progressBar.remove();
                                } else {
                                    const progressElement = progressBar.querySelector('.progress');
                                    if (progressElement && data.value !== undefined) {
                                        progressElement.style.width = data.value + '%';
                                        
                                        // Обновляем значения во всех формах прогресс-бара
                                        const valueInputs = progressBar.querySelectorAll('input[name="value"]');
                                        valueInputs.forEach(input => {
                                            input.value = data.value;
                                        });
                                        
                                        // Обновляем состояние кнопок
                                        const plusButton = progressBar.querySelector('button[type="submit"]:not([disabled])');
                                        const minusButton = progressBar.querySelector('button[type="submit"]:not([disabled]) + button');
                                        
                                        if (plusButton) plusButton.disabled = data.value >= 100;
                                        if (minusButton) minusButton.disabled = data.value <= 0;
                                    }
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
</body>
</html> 