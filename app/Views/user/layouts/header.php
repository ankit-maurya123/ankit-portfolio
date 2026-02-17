<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Portfolio') ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

    <!-- Theme Detection Script (prevents flash) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'light' || (!savedTheme && !prefersDark)) {
                document.documentElement.classList.add('light-mode');
            }
        })();
    </script>
</head>
<body class="font-poppins bg-gray-900 text-white">

    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-gray-900 z-50 flex items-center justify-center">
        <div class="loader">
            <div class="loader-circle"></div>
            <div class="loader-circle"></div>
            <div class="loader-circle"></div>
        </div>
    </div>

    <!-- Header/Navigation -->
    <header id="header" class="fixed top-0 left-0 w-full z-40 transition-all duration-300">
        <nav class="header-nav container mx-auto">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="<?= base_url() ?>" class="logo flex items-center gap-2" style="text-decoration:none;">
                    <span class="logo-icon">
                        <i class="fas fa-code"></i>
                    </span>
                    <span class="text-gradient font-bold logo-text">Portfolio</span>
                </a>

                <!-- Desktop Navigation - shows at 1024px+ -->
                <ul class="desktop-nav" id="desktop-nav">
                    <li><a href="#home" class="nav-link active">Home</a></li>
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>
                    <li><a href="#skills" class="nav-link">Skills</a></li>
                    <li><a href="#projects" class="nav-link">Projects</a></li>
                    <li><a href="#testimonials" class="nav-link">Testimonials</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>

                <!-- Right Side Actions -->
                <div class="flex items-center gap-2">
                    <!-- Theme Toggle Button -->
                    <button id="theme-toggle" class="theme-toggle-btn" title="Toggle Dark/Light Mode">
                        <i class="fas fa-moon theme-icon-dark"></i>
                        <i class="fas fa-sun theme-icon-light"></i>
                    </button>

                    <!-- CTA Button - visible on desktop only -->
                    <a href="#contact" class="btn-primary btn-nav desktop-only" style="text-decoration:none;">
                        <i class="fas fa-paper-plane mr-2"></i>
                        <span>Hire Me</span>
                    </a>

                    <!-- Mobile/Tablet Menu Toggle Button -->
                    <button id="mobile-menu-btn" class="hamburger-btn mobile-only" aria-label="Open Menu">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile/Tablet Navigation - OUTSIDE header to avoid stacking context issues -->
    <div id="mobile-menu" class="mobile-menu-overlay">
        <div class="mobile-menu-inner">
            <!-- Mobile Menu Header -->
            <div class="mobile-menu-header">
                <a href="<?= base_url() ?>" class="flex items-center gap-2" style="text-decoration:none;">
                    <span class="logo-icon">
                        <i class="fas fa-code"></i>
                    </span>
                    <span class="text-gradient font-bold logo-text">Portfolio</span>
                </a>
                <button id="close-menu-btn" class="close-menu-btn" aria-label="Close Menu">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Mobile Menu Links -->
            <ul class="mobile-nav-list">
                <li><a href="#home" class="mobile-nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="#about" class="mobile-nav-link"><i class="fas fa-user"></i><span>About</span></a></li>
                <li><a href="#services" class="mobile-nav-link"><i class="fas fa-cogs"></i><span>Services</span></a></li>
                <li><a href="#skills" class="mobile-nav-link"><i class="fas fa-laptop-code"></i><span>Skills</span></a></li>
                <li><a href="#projects" class="mobile-nav-link"><i class="fas fa-project-diagram"></i><span>Projects</span></a></li>
                <li><a href="#testimonials" class="mobile-nav-link"><i class="fas fa-quote-left"></i><span>Testimonials</span></a></li>
                <li><a href="#contact" class="mobile-nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
            </ul>

            <!-- Mobile Menu Footer -->
            <div class="mobile-menu-footer">
                <!-- Hire Me Button -->
                <a href="#contact" class="mobile-hire-btn" style="text-decoration:none;">
                    <i class="fas fa-paper-plane mr-2"></i>
                    <span>Hire Me</span>
                </a>

                <!-- Mobile Theme Toggle -->
                <div class="flex justify-center" style="margin-top:20px;">
                    <button id="theme-toggle-mobile" class="theme-toggle-btn-mobile" title="Toggle Dark/Light Mode">
                        <span class="theme-toggle-track">
                            <i class="fas fa-moon moon-icon"></i>
                            <i class="fas fa-sun sun-icon"></i>
                            <span class="theme-toggle-thumb"></span>
                        </span>
                    </button>
                </div>

                <!-- Social Links -->
                <div class="mobile-social-links">
                    <?php if(isset($social)): foreach($social as $s): ?>
                    <a href="<?= esc($s['link']) ?>" target="_blank" class="mobile-social-icon" title="<?= esc($s['name'] ?? '') ?>">
                        <i class="fab <?= esc($s['icon']) ?>"></i>
                    </a>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main>
