<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Chatbot with Graph</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       body {
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.8), rgba(255, 182, 193, 0.8));
        }

        #chat-box {
            height: 300px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        #chart-container {
            width: 100%;
            max-width: 400px;
            height: 200px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div id="chat-box" class="mb-3"></div>
        <div id="input-container" class="d-flex justify-content-center flex-wrap gap-2 mb-3"></div>
        <div id="chart-container">
            <canvas id="chart"></canvas>
        </div>
    </div>

    <script>
        const chatBox = document.getElementById('chat-box');
        const inputContainer = document.getElementById('input-container');
        const ctx = document.getElementById('chart').getContext('2d');

        let currentStep = 'main';
        let choiceCounts = { Music: 0, Art: 0, Science: 0 };

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Music', 'Art', 'Science'],
                datasets: [{
                    label: '# of Choices',
                    data: [0, 0, 0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });

        function updateChat(message) {
            const p = document.createElement('p');
            p.textContent = message;
            chatBox.appendChild(p);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function updateGraph() {
            chart.data.datasets[0].data = [choiceCounts.Music, choiceCounts.Art, choiceCounts.Science];
            chart.update();
        }

        function clearButtons() {
            inputContainer.innerHTML = '';
        }

        function addBackToStartButton() {
            const backButton = document.createElement('button');
            backButton.textContent = 'Back to Start';
            backButton.className = 'btn btn-secondary';
            backButton.addEventListener('click', backToStart);
            inputContainer.appendChild(backButton);
        }

        function handleChoice(category) {
            choiceCounts[category]++;
            updateChat(`You chose ${category}.`);
            updateGraph();
            clearButtons();
            currentStep = category.toLowerCase();
            showSubCategories(category);
            addBackToStartButton();
        }

        function handleSubChoice(subCategory) {
            updateChat(`You chose ${subCategory}.`);
            clearButtons();
            currentStep = 'end';
            showEndButtons();
        }

        function showMainMenu() {
            clearButtons();
            const categories = ['Music', 'Art', 'Science'];
            categories.forEach(category => {
                const button = document.createElement('button');
                button.textContent = category;
                button.className = 'btn btn-primary';
                button.addEventListener('click', () => handleChoice(category));
                inputContainer.appendChild(button);
            });
        }

        function showSubCategories(category) {
            const subCategories = {
                Music: ['Rap', 'Classical', 'Rock'],
                Art: ['Painting', 'Sculpture', 'Photography'],
                Science: ['Physics', 'Biology', 'Chemistry']
            };
            subCategories[category].forEach(subCategory => {
                const button = document.createElement('button');
                button.textContent = subCategory;
                button.className = 'btn btn-info';
                button.addEventListener('click', () => handleSubChoice(subCategory));
                inputContainer.appendChild(button);
            });
        }

        function showEndButtons() {
            const resetButton = document.createElement('button');
            resetButton.textContent = 'Start Over';
            resetButton.className = 'btn btn-danger';
            resetButton.addEventListener('click', resetChat);
            inputContainer.appendChild(resetButton);

            addBackToStartButton();
        }

        function resetChat() {
            chatBox.innerHTML = '';
            choiceCounts = { Music: 0, Art: 0, Science: 0 };
            updateGraph();
            updateChat('Welcome! Choose a category to start: Music, Art, or Science.');
            showMainMenu();
            currentStep = 'main';
        }

        function backToStart() {
            updateChat('Returning to main menu.');
            showMainMenu();
            currentStep = 'main';
        }

        // Initialize the chat
        resetChat();
    </script>
</body>
</html>