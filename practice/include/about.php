<?php
  include("header.html")
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Website - Home</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    .hero {
      background-color: #f8f9fa;
      padding: 4rem 0;
    }
    .content {
      padding: 3rem 0;
    }
  </style>
</head>
<body>
  <!-- Header (Placeholder for PHP include) -->
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">My Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Main Content -->
  <main>
    <!-- Hero Section -->
    <section class="hero">
      <div class="container text-center">
        <h1 class="display-4">Welcome to My Website</h1>
        <p class="lead">This is the Home page</p>
      </div>
    </section>

    <!-- Content Section -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>About Us</h2>
            <p>Stuff about your about page can go here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
          </div>
          <div class="col-md-6">
            <img src="/placeholder.svg?height=300&width=400" alt="About Us" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="bg-light py-4 mt-4">
    <div class="container text-center">
      <p>&copy; 2023 My Website. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>