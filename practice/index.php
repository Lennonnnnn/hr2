<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(#ff0000 9%, #000000 12%, #a54a4a 32%, #030303 66%, #41289a 100%);
            font-family: Arial, sans-serif;
        }

        .container {
            color: white;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.7);
        }

        .hand-icon {
            font-size: 5rem;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .hand-icon:hover {
            transform: scale(1.1);
        }

        @keyframes handshake {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            50% { transform: rotate(-5deg); }
            75% { transform: rotate(5deg); }
            100% { transform: rotate(0deg); }
        }

        .handshake {
            animation: handshake 2s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <p class="mb-3 text-light" style="font-weight: bold; font-size: 25px;">
            AI might decide for you</p>
        <h1 class="mb-3 text-light" style="font-weight: bold; font-size: 50px; border: 10px solid #F4A896; padding: 10px; border-radius: 5px; width: 300px; margin: 0 auto;">
             HELPING <br> HAND</h1>
        <p class="mb-4 mt-5 text-light" style="font-weight: bold; font-size: 25px;">
            Can't Decide? <br>Take my hand</p>
        <div id="handContainer" class="mb-4">
            <span id="hand" class="hand-icon"> &#x1F44B;</span>
        </div>
        <p id="message" class="text-light" style="display: none; font-weight: bold; font-size: 25px;">
            AI can might helping you using <strong>HELPING HAND!</strong></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const hand = document.getElementById('hand');
        const handContainer = document.getElementById('handContainer');
        const message = document.getElementById('message');

        hand.addEventListener('click', () => {
            // Hide the first hand
            hand.style.display = 'none';
            const secondHand = document.createElement('span');
            secondHand.className = 'hand-icon';
            secondHand.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 128 128"><path fill="#f9ddbd" d="M105.21 84.82c-2.65-4.12-15.7-18.21-18.5-21.85s-10-24.4-16.93-26.47c-6.93-2.08-13.77-1.54-21.01.6s-14.01 1.94-22.05-.34S10.1 29.1 10.1 29.1c-3.73 2.85-5.65 10.81-6.05 22.07s1.72 17.38 2.46 19.24s6.3 4.61 12.56 9.45c.54.41 44.98 30.77 45.92 31.2c6.79 3.09 11.11-3.16 11.11-3.16s3.6 2.06 7.08 0c4.25-2.52 3.75-5.65 3.75-5.65s4.12.67 6.61-.96c4.75-3.11 3.22-6.7 3.22-6.7s4.24 1.36 6.74-.88s4.35-4.77 1.71-8.89"/><path fill="#f9ddbd" d="M58.4 101.98c-.06-.16-.12-.32-.21-.48c-1.94-3.75-5.63-3.6-5.79-3.73c-.21-.16-.17-2.96-.4-4.05c-1.22-5.71-7.82-5.56-7.99-5.68c-.23-.15.98-4.05-2.84-7.34c-.91-.79-2.29-.71-3.49-.57c-3.37.41-4.91 1.99-5.15 1.94c-.57-.11.07-4.29-4.07-4.43c-3.01-.1-4.98 1.37-6.64 3.65c-1.7 2.34-2.76 4.71-.83 7.48c2.43 3.49 5.09 2.55 5.09 2.55s-.8 4.27 1.65 6.55s7.39 2.14 7.39 2.14s-.41 5.04 3.15 7.44s7.83.22 7.83.22s1.66 4.3 6.51 3.67c4.25-.54 7.4-5.13 5.79-9.36"/><path fill="#ffd29c" d="M105.88 86.12c-.18-.28-.33-.51-.35-.85c-.02-.38-10.16-13.83-14.43-19.24c.86 2.47 2.1 4.82 3.68 6.91c2.55 3.38 6.13 6.55 6.2 10.78c.03 2.08-.89 4.16-2.46 5.53s-3.75 2.01-5.81 1.69c-.66-.1-1.61-.1-1.69.56c-.03.19.05.38.11.57c.66 2.04-.15 4.42-1.82 5.76c-1.67 1.35-4.05 1.66-6.08.96c-.53-.18-1.23-.39-1.56.06c-.26.35-.09.83.03 1.24c.63 2.24-.86 4.72-3 5.64c-2.13.92-4.68.48-6.68-.7c-.44-.26-1.14-.49-1.36-.02c-.07.14-.05.31-.04.46c.08 1.55-.65 3.13-1.89 4.07s-2.95 1.22-4.43.72l-.37.23c.44.26.81.45 1.05.56c6.79 3.09 11.11-3.16 11.11-3.16s3.6 2.06 7.08 0c4.25-2.52 3.75-5.65 3.75-5.65s4.12.67 6.61-.96c4.75-3.11 3.22-6.7 3.22-6.7s4.24 1.36 6.74-.88c.62-.55 1.21-1.13 1.72-1.78c1-1.28 1.51-2.8 1.17-4.42c-.1-.48-.24-.97-.5-1.38"/><path fill="#dba870" d="M73.62 105.86c3.02 1.88 4.24 2.7 4.24 2.7c-1.09.13-3.47.58-9.16-3.82c-1.57-1.21-7.83-6.05-4.93-7.24c2.14-.88 5.6 5.72 9.85 8.36m13.22-3.22c-1.88-.16-9.26-4.45-14.98-10.35c-.6-.62-1.16-1.15-1.63-1.6c-.57-.55-.59-1.46-.04-2.04a1.44 1.44 0 0 1 2.04-.04c.48.46 1.04 1.01 1.66 1.63c1.3 1.29 4.62 5.02 11.17 9.52c1.47 1.01 3.32 2.03 5.02 2.58c.19.06-1.37.46-3.24.3m7.65-8.78c-3.98-1.75-7.86-5.35-14.54-13.92c-.49-.63-.41-1.53.21-2.03s1.53-.41 2.03.21c2.14 2.62 4.34 5.2 6.7 7.63c.93.96 5.26 4.68 5.81 5.07c5.19 3.6 7.32 3.84 7.32 3.84c-.61.25-2.97 1.2-7.53-.8M8.61 72.71c-.45-.33-.04-1.03.46-.8c2.93 1.32 7.05 3.25 10.17 4.84c2.87 1.46 4.63 2.33 4.63 2.33l-2.89 2.81z"/><path fill="#f9ddbd" d="M123.31 46.75c-1.48-9.85-3.43-16.55-4.88-18.17c-1.66-1.84-4.51 1.82-10.54 3.96S91 35.49 91 35.49s-18.99-.04-25.64 1.82c-5.25 1.47-11.75 5.63-17.21 8.93c-4.36 2.64-8.29 4.37-8.62 6.28c-.31 1.82 1.71 5.89 6.73 6.3c8.15.67 16.77-4.48 16.77-4.48c2.79-1.58 3.83-1.77 9.4-1.77s11.31 4.25 11.72 4.93c4.16 6.85 7.9 10.33 11.72 14.97c2.79 3.39 9.35 12.36 9.35 12.36s7.37-8.71 9.25-10.72s8.85-7.1 8.85-7.1s1.54-9.95-.01-20.26"/><path fill="#ffd29c" d="M105.51 76.92c-.61-3.66-2.38-7.25-1.54-10.84c.13-.53.25-1.06.31-1.6c.28-2.86-2.42-1.61-2.82-1.57c-1.03.11-12.87-.33-11.55 1.01l15.3 20.7s.6-.19.74-1.67c.15-1.5-.39-5.72-.44-6.03"/><path fill="#dba870" d="m95.87 64.15l-12.29-4.26c1.62 1.6 2.97 3.33 4.51 4.92c4.68 5.45 11.75 14.71 17.01 19.99c.22.22.57-.06.41-.32c-2.92-4.61-10.42-16.52-10.81-17.69c-.74-2.27 1.17-2.64 1.17-2.64"/><path fill="#dba870" d="M73.43 54.64c4.55.81 5.91 1.9 9.64 4.75c9.16 6.98 17.51 4.33 18.58 4c5.88-1.73-4.81-1.73-6.49-2.38c-13.51-3.16-14.37-13.04-30.74-8.57c-5.53 2.02-14.55 9.29-21.62 4.26c-1.01-.72-2.63-2.17-2.45-3.78c.34-3.12 8.6-4.99 12.17-8.2c4.87-3.77 10.97-6.67 16.94-8.21c-2.93-.33-6.26.3-8.69 1.09c-6.51 2.13-11.02 7.04-17.95 9.78c-5.73 2.26-5.24 4.18-5.23 5.51s1.06 4.81 4.23 6.52c11.96 6.43 20.49-6.76 31.61-4.77m-14.36 52.21c-.36.9-1.88 2.45-2.67 2.71c0 0 2.39-5.22 1.1-7.57c-.79-1.98-3.15-2.71-5.1-2.27c-3.14 1.01-5.1 5.81-5.62 8.77c-.14.77-.98-.62-.86-2.17c.41-5.24 4.43-7.27 4.87-11.88c.28-2.85-2.45-4.91-5.25-4.32c-3.65.41-5.34 3.91-7.09 6.75c-.77 1.36-2.33 3.96-2.49 5.51c-.14 1.35-.47 1.63-.79-.05c-1.39-7.13 7.57-13.28 7.02-17.15c-.58-4.1-3.59-4.84-6.19-3.65c-3.88 1.79-7.68 8.1-9.15 11.08c-.42.6-.75 2.23-.75 2.23c-1.4-3.44 1.61-8.01 3.11-10.18c.65-1.1 2.06-2.42 1.47-3.76c-.91-2.08-2.46-2.03-3.72-1.78c-3.25.65-6.91 5.3-6.91 5.3c-.12-1.18 1.35-3.52 2.49-4.86c2.84-3.42 8.96-4.04 11.1 1.17c5.82-3.98 12-1.6 11.77 5.85c.23.68 2.78-.13 5.87 2.24c3.1 2.37 2.14 7.75 2.14 7.75s3.1.33 4.81 2.48c1.58 1.99 1.83 5.71.84 7.8m44.66-25.22s7.32-7.33 9.95-9.02s6.47-4 6.6-3.35s-6.12 5.05-8.47 7.81c-2.34 2.77-6.28 7.4-6.28 7.4z"/></svg>';
            secondHand.style.marginLeft = '10px';
            handContainer.appendChild(secondHand);

            // Show the message
            message.style.display = 'block';

            // Add handshake animation
            hand.classList.add('handshake');
            secondHand.classList.add('handshake');

            // Wait for animation to complete, then redirect
            setTimeout(() => {
                window.location.href = 'bot.php';
            }, 3000); // Adjusted to 3000 ms to allow time for message visibility
        });
    </script>
</body>
</html>