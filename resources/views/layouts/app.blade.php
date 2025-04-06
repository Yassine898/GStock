<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom CSS for Modern Styling (Minimal) -->
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa; /* Light gray background */
        }

        /* Navbar - Custom color override */
        .navbar-brand {
            font-weight: 700;
            color: #007bff !important; /* Primary accent color */
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #007bff !important; /* Primary accent color on hover/active */
        }

        /* Hero Section */
        .hero-section {
            padding: 5rem 0;
            text-align: center;
        }
    </style>

    

</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">  <!-- bg-white and shadow-sm -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MonSite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section bg-light"> <!-- bg-light -->
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenue sur MonSite</h1> <!-- display-4 and fw-bold -->
            <p class="lead">Votre destination pour des solutions innovantes.</p> <!-- lead -->
            <a href="#" class="btn btn-primary btn-lg">En savoir plus</a> <!-- btn-lg -->
        </div>
    </section>

    <div class="container py-5"> <!-- py-5 for padding top and bottom -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-white text-center py-3 shadow-sm"> <!-- bg-white, py-3, shadow-sm -->
        <p>© 2025 MonSite. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>