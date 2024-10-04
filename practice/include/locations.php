<?php
  
  include("header.html")

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - My Website</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
:root {
    --color1: #ee7752;
    --color2: #e73c7e;
    --color3: #23a6d5;
    --color4: #23d5ab;
}

@keyframes gradientBG {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

body {
    background: linear-gradient(-45deg, var(--color1), var(--color2), var(--color3), var(--color4));
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.content {
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    background-color: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
}

.navbar {
    background-color: rgba(255, 255, 255, 0.8) !important;
    backdrop-filter: blur(10px);
}

  </style>
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand mx-auto" href="#">My Website</a>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow">
            <div class="card-body text-center">
              <h1 class="card-title mb-4">Welcome to Our Home Page</h1>
              <p class="card-text">This is the Home page. Explore our website to learn more about our services and locations.</p>
              <a href="#" class="btn btn-primary mt-3">Explore Locations</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-light py-3 mt-auto">
    <div class="container text-center">
      <p class="mb-0">&copy; 2023 My Website. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script></script>
<?php
  
  include("footer.html")

?>