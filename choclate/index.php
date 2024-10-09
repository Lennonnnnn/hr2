<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>THIRDYPARTY</title>
</head>
<body>
    <div class="header">
        <audio id="bg-audio" loop>
            <source src="song.mp3" type="audio/mpeg">    
        </audio>
        <h1 style="color: yellow;">THIRDY</h1>
        <img id="choclate" src="Assets/campers.jpg" alt="">
        <img id="can" src="Assets/doflamingo.jpg" alt="Doflamingo">
        <img id="choclate2" src="Assets/school.jpg" alt="">
        <img id="almod" src="Assets/boracay.jpg" alt="">
        <img id="almod2" src="Assets/boracay.jpg" alt="">
    </div>
    <div class="about">
        <video autoplay muted loop id="bg-video">
            <source src="Judas.mp4" type="video/mp4">
        </video>
        <div class="about-left"></div>
    </div>
    <div class="product">
        <div class="video-container">
            <!-- Background video -->
            <video autoplay muted loop id="bg-video">
                <source src="Assets/gojo vs sukuna domain clash jujutsu kaisen live wallpaper.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" integrity="sha512-16esztaSRplJROstbIIdwX3N97V1+pZvV33ABoG1H2OyTttBxEGkTsoIVsiP1iaTtM8b3+hu2kB6pQ4Clr5yug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" integrity="sha512-Ic9xkERjyZ1xgJ5svx3y0u3xrvfT/uPkV99LBwe68xjy/mGtO+4eURHZBW2xW4SZbFrF1Tf090XqB+EVgXnVjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>

    <script>
        // Play audio when the user scrolls down
        const audio = document.getElementById('bg-audio');

        window.addEventListener('scroll', function() {
            // Check if the audio is not already playing
            if (audio.paused) {
                audio.play();
            }
        });
    </script>
</body>
</html>
