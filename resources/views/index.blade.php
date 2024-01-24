<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css') }}/style.css">
</head>
<body>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="logo" href="#home">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                </ul>
            </div>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-lg download-btn">Dashboard</a>
            @else
                <a href="{{ route('register') }}" class="btn btn-lg download-btn">Register</a>
            @endauth
        </nav>
    </header>

    <!-- Hero Section -->
    <div id="home" class="hero-section">
        <h1>Your Task Application</h1>
        <p>Get organized, stay productive</p>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Log in</a>
    </div>

    <!-- Features Section -->
    <div id="features" class="features-section">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature" data-aos="fade-up">
                        <i class="fas fa-check-circle"></i>
                        <h3>Intuitive Task Creation</h3>
                        <p>Easily create and organize tasks with a user-friendly interface, streamlining your workflow for optimal productivity.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature" data-aos="fade-up">
                        <i class="fas fa-check-circle"></i>
                        <h3>Effortless Collaboration</h3>
                        <p>Foster teamwork by sharing tasks, updates, and progress, promoting effective communication and achieving collective goals efficiently.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature" data-aos="fade-up">
                        <i class="fas fa-check-circle"></i>
                        <h3>Customizable Workflows</h3>
                        <p>Tailor the app to your needs with flexible features, ensuring a personalized task management experience that adapts to your unique workflow.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div id="how-it-works" class="how-it-works-section">
        <div class="container">
            <h2 class="text-center mb-5">How It Works</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="step" data-aos="fade-up">
                        <i class="fas fa-search"></i>
                        <h3>Step 1</h3>
                        <p>Sign up effortlessly to unlock a world of features. Explore intuitive tools, collaborate seamlessly, and elevate productivity. Your efficient task management journey begins with a simple sign-up.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step" data-aos="fade-up">
                        <i class="fas fa-tasks"></i>
                        <h3>Step 2</h3>
                        <p>Effortlessly create tasks and meticulously organize them with our intuitive interface. Enhance productivity by managing every detail seamlessly for optimal workflow and success.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step" data-aos="fade-up">
                        <i class="fas fa-share"></i>
                        <h3>Step 3</h3>
                        <p>Collaborate seamlessly with team members, leveraging shared tasks and real-time updates. Enhance productivity and achieve goals together efficiently, promoting a collaborative and successful work environment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="text-center mb-5">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="testimonial">
                        <p>"Incredible app! Streamlined my tasks effortlessly. A game-changer for productivity. Highly recommended for anyone seeking organization and efficiency."</p>
                        <h5>Sabbir Ahammed</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="testimonial">
                        <p>"Outstanding task management! Simplified my daily routine. Intuitive design and seamless collaboration. A must-have for staying organized and focused."</p>
                        <h5>Sovon Khan</h5>
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="testimonial">
                        <p>"Remarkable task management solution! Transformed how I work. Intuitive, feature-rich, and collaborative. Elevates productivity and keeps me on top of my goals."</p>
                        <h5>Alif Ahammed</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <div class="scroll-to-top" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="container text-center">
            <p>&copy; <span id="currentYear"></span> Your Task Application. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- AOS Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Scroll to Top Function -->
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Show/hide scroll-to-top button
        window.onscroll = function () {
            var scrollButton = document.querySelector('.scroll-to-top');
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                scrollButton.style.display = 'block';
            } else {
                scrollButton.style.display = 'none';
            }
        };

        // Set current year in footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // AOS initialization
        AOS.init();
    </script>
</body>
</html>
