<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Progress Bars</title>
    <style>
        @php
            $design = session('selected_design', 'retro');
        @endphp

        @if($design === 'retro')
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
                position: relative;
            }
            .progress-bar.completed {
                opacity: 0.7;
            }
            .progress-bar.completed h3 {
                text-decoration: line-through;
                color: #0f0;
            }
            .progress-bar.completed .progress {
                background-color: #0f0;
            }
            .progress-bar h3 {
                margin-top: 0;
                color: #0f0;
            }
            .progress-bar .controls {
                display: inline-block;
            }
            .progress-bar .delete-button {
                position: absolute;
                right: 20px;
                top: 20px;
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
        @elseif($design === 'modern')
            body {
                font-family: Arial, sans-serif;
                background-color: #f8f9fa;
                color: #333;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .progress-bar {
                background-color: #fff;
                border: 1px solid #dee2e6;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                position: relative;
            }
            .progress-bar.completed {
                opacity: 0.7;
            }
            .progress-bar.completed h3 {
                text-decoration: line-through;
                color: #28a745;
            }
            .progress-bar.completed .progress {
                background-color: #28a745;
            }
            .progress-bar h3 {
                margin-top: 0;
                color: #333;
            }
            .progress-bar .controls {
                display: inline-block;
            }
            .progress-bar .delete-button {
                position: absolute;
                right: 20px;
                top: 20px;
            }
            .progress-container {
                width: 100%;
                background-color: #e9ecef;
                border-radius: 4px;
                height: 20px;
                margin: 10px 0;
                overflow: hidden;
            }
            .progress {
                height: 100%;
                background-color: #007bff;
                width: 0%;
                transition: width 0.3s ease;
            }
            button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 8px 16px;
                margin: 5px;
                cursor: pointer;
                border-radius: 4px;
                font-size: 14px;
            }
            button:hover {
                background-color: #0056b3;
            }
            .add-form {
                margin-bottom: 30px;
            }
            input[type="text"] {
                padding: 8px 12px;
                border: 1px solid #ced4da;
                border-radius: 4px;
                margin-right: 10px;
            }
        @elseif($design === 'minimal')
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
                background-color: #fff;
                color: #333;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .progress-bar {
                background-color: #fff;
                border: 1px solid #e1e1e1;
                padding: 20px;
                margin-bottom: 20px;
                position: relative;
            }
            .progress-bar .controls {
                display: inline-block;
            }
            .progress-bar .delete-button {
                position: absolute;
                right: 20px;
                top: 20px;
            }
            .progress-bar.completed {
                opacity: 0.7;
            }
            .progress-bar.completed h3 {
                text-decoration: line-through;
                color: #666;
            }
            .progress-bar.completed .progress {
                background-color: #666;
            }
            .progress-bar h3 {
                margin-top: 0;
                color: #333;
                font-weight: 500;
            }
            .progress-container {
                width: 100%;
                background-color: #f5f5f5;
                height: 2px;
                margin: 10px 0;
            }
            .progress {
                height: 100%;
                background-color: #333;
                width: 0%;
                transition: width 0.3s ease;
            }
            button {
                background-color: #333;
                color: #fff;
                border: none;
                padding: 6px 12px;
                margin: 5px;
                cursor: pointer;
                font-size: 13px;
            }
            button:hover {
                background-color: #444;
            }
            .add-form {
                margin-bottom: 30px;
            }
            input[type="text"] {
                padding: 6px 10px;
                border: 1px solid #e1e1e1;
                margin-right: 10px;
            }
        @elseif($design === 'neon')
            body {
                font-family: 'Orbitron', sans-serif;
                background-color: #1a1a1a;
                color: #fff;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .progress-bar {
                background-color: #2a2a2a;
                border: 2px solid #ff00ff;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 5px;
                position: relative;
                box-shadow: 0 0 10px #ff00ff;
            }
            .progress-bar .controls {
                display: inline-block;
            }
            .progress-bar .delete-button {
                position: absolute;
                right: 20px;
                top: 20px;
            }
            .progress-bar.completed {
                opacity: 0.7;
            }
            .progress-bar.completed h3 {
                text-decoration: line-through;
                color: #ff00ff;
            }
            .progress-bar.completed .progress {
                background-color: #ff00ff;
            }
            .progress-bar h3 {
                margin-top: 0;
                color: #fff;
                text-shadow: 0 0 5px #ff00ff;
            }
            .progress-container {
                width: 100%;
                background-color: #333;
                border: 1px solid #ff00ff;
                height: 30px;
                margin: 10px 0;
            }
            .progress {
                height: 100%;
                background-color: #ff00ff;
                width: 0%;
                transition: width 0.3s ease;
                box-shadow: 0 0 10px #ff00ff;
            }
            button {
                background-color: #ff00ff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                margin: 5px;
                cursor: pointer;
                font-family: 'Orbitron', sans-serif;
                text-shadow: 0 0 5px #fff;
            }
            button:hover {
                background-color: #ff33ff;
                box-shadow: 0 0 10px #ff00ff;
            }
            .add-form {
                margin-bottom: 30px;
            }
            input[type="text"] {
                background-color: #2a2a2a;
                border: 2px solid #ff00ff;
                color: #fff;
                padding: 10px;
                font-family: 'Orbitron', sans-serif;
                margin-right: 10px;
            }
        @elseif($design === 'dark')
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #121212;
                color: #fff;
                margin: 0;
                padding: 20px;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .progress-bar {
                background-color: #1e1e1e;
                border: 1px solid #333;
                padding: 20px;
                margin-bottom: 20px;
                border-radius: 5px;
                position: relative;
            }
            .progress-bar .controls {
                display: inline-block;
            }
            .progress-bar .delete-button {
                position: absolute;
                right: 20px;
                top: 20px;
            }
            .progress-bar.completed {
                opacity: 0.7;
            }
            .progress-bar.completed h3 {
                text-decoration: line-through;
                color: #666;
            }
            .progress-bar.completed .progress {
                background-color: #666;
            }
            .progress-bar h3 {
                margin-top: 0;
                color: #fff;
            }
            .progress-container {
                width: 100%;
                background-color: #333;
                height: 20px;
                margin: 10px 0;
                border-radius: 3px;
            }
            .progress {
                height: 100%;
                background-color: #444;
                width: 0%;
                transition: width 0.3s ease;
            }
            button {
                background-color: #333;
                color: #fff;
                border: none;
                padding: 8px 16px;
                margin: 5px;
                cursor: pointer;
                border-radius: 3px;
            }
            button:hover {
                background-color: #444;
            }
            .add-form {
                margin-bottom: 30px;
            }
            input[type="text"] {
                background-color: #1e1e1e;
                border: 1px solid #333;
                color: #fff;
                padding: 8px 12px;
                margin-right: 10px;
                border-radius: 3px;
            }
        @endif
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const forms = document.querySelectorAll('form');

            function createProgressBarHtml(progressBar) {
                const incrementButton = document.createElement('button');
                incrementButton.textContent = '+25';
                incrementButton.disabled = progressBar.value >= 100;

                const decrementButton = document.createElement('button');
                decrementButton.textContent = '-25';
                decrementButton.disabled = progressBar.value <= 0 || progressBar.completed;

                let progressColor;
                if (progressBar.completed) {
                    @if($design === 'retro')
                        progressColor = '#0f0';
                    @elseif($design === 'modern')
                        progressColor = '#28a745';
                    @elseif($design === 'minimal')
                        progressColor = '#666';
                    @elseif($design === 'neon')
                        progressColor = '#ff00ff';
                    @elseif($design === 'dark')
                        progressColor = '#666';
                    @endif
                } else {
                    @if($design === 'retro')
                        progressColor = '#0f0';
                    @elseif($design === 'modern')
                        progressColor = '#007bff';
                    @elseif($design === 'minimal')
                        progressColor = '#333';
                    @elseif($design === 'neon')
                        progressColor = '#ff00ff';
                    @elseif($design === 'dark')
                        progressColor = '#444';
                    @endif
                }

                return `
                    <div class="progress-bar ${progressBar.completed ? 'completed' : ''}" data-id="${progressBar.id}">
                        <h3>${progressBar.name}</h3>
                        <div class="progress-container">
                            <div class="progress" style="width: ${progressBar.value}%; background-color: ${progressColor}"></div>
                        </div>
                        <div style="display: flex; justify-content: space-between">
                            <form action="/progress-bars/${progressBar.id}" method="POST" style="display: inline;">
                                <input type="hidden" name="_token" value="${token}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">Удалить</button>
                            </form>
                            <div>
                                <form action="/progress-bars/${progressBar.id}" method="POST" style="display: inline;">
                                    <input type="hidden" name="_token" value="${token}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="value" value="${progressBar.value}">
                                    <button type="submit" data-action="decrease" ${progressBar.value <= 0 ? 'disabled' : ''}>-25</button>
                                </form>
                                <form action="/progress-bars/${progressBar.id}" method="POST" style="display: inline;">
                                    <input type="hidden" name="_token" value="${token}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="value" value="${progressBar.value}">
                                    <button type="submit" data-action="increase" ${progressBar.value >= 100 ? 'disabled' : ''}>+25</button>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
            }

            function addFormHandlers(form) {
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

                    const actualMethod = method === 'PUT' || method === 'DELETE' ? 'POST' : method;
                    if (method === 'PUT' || method === 'DELETE') {
                        formData.append('_method', method);
                    }

                    if (method === 'PUT') {
                        const currentValue = parseInt(form.querySelector('input[name="value"]').value);
                        const button = form.querySelector('button[type="submit"]');
                        const isIncrease = button.dataset.action === 'increase';
                        const newValue = isIncrease ? currentValue + 25 : currentValue - 25;
                        formData.set('value', newValue);
                    }

                    fetch(url, {
                        method: actualMethod,
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            if (method === 'POST' && !form.closest('.progress-bar')) {
                                const addForm = document.querySelector('.add-form');
                                const newProgressBar = document.createElement('div');
                                newProgressBar.innerHTML = createProgressBarHtml(data.progressBar);
                                addForm.insertAdjacentElement('afterend', newProgressBar.firstElementChild);

                                form.reset();

                                const newForms = newProgressBar.querySelectorAll('form');
                                newForms.forEach(newForm => {
                                    addFormHandlers(newForm);
                                });
                            } else {
                                const progressBar = form.closest('.progress-bar');
                                if (progressBar) {
                                    if (method === 'DELETE') {
                                        progressBar.remove();
                                    } else {
                                        const progressElement = progressBar.querySelector('.progress');
                                        if (progressElement && data.value !== undefined) {
                                            progressElement.style.width = data.value + '%';

                                            const valueInputs = progressBar.querySelectorAll('input[name="value"]');
                                            valueInputs.forEach(input => {
                                                input.value = data.value;
                                            });

                                            const buttons = progressBar.querySelectorAll('button[type="submit"]');
                                            const plusButton = buttons[0];
                                            const minusButton = buttons[1];

                                            if (plusButton) plusButton.disabled = data.value >= 100;
                                            if (minusButton) minusButton.disabled = data.value <= 0 || data.completed;

                                            if (data.completed) {
                                                progressBar.classList.add('completed');
                                            } else {
                                                progressBar.classList.remove('completed');
                                            }

                                            if (progressElement) {
                                                progressElement.style.width = data.value + '%';
                                                if (data.completed) {
                                                    @if($design === 'retro')
                                                        progressElement.style.backgroundColor = '#0f0';
                                                    @elseif($design === 'modern')
                                                        progressElement.style.backgroundColor = '#28a745';
                                                    @elseif($design === 'minimal')
                                                        progressElement.style.backgroundColor = '#666';
                                                    @elseif($design === 'neon')
                                                        progressElement.style.backgroundColor = '#ff00ff';
                                                    @elseif($design === 'dark')
                                                        progressElement.style.backgroundColor = '#666';
                                                    @endif
                                                } else {
                                                    @if($design === 'retro')
                                                        progressElement.style.backgroundColor = '#0f0';
                                                    @elseif($design === 'modern')
                                                        progressElement.style.backgroundColor = '#007bff';
                                                    @elseif($design === 'minimal')
                                                        progressElement.style.backgroundColor = '#333';
                                                    @elseif($design === 'neon')
                                                        progressElement.style.backgroundColor = '#ff00ff';
                                                    @elseif($design === 'dark')
                                                        progressElement.style.backgroundColor = '#444';
                                                    @endif
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
                });
            }

            forms.forEach(form => {
                addFormHandlers(form);
            });
        });
    </script>
</body>
</html>
