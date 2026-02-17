<?= $this->include('user/layouts/header') ?>

<!-- Hero Section -->
<section id="home" class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="particles" id="particles"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
            <!-- Text Content -->
            <div class="lg:w-1/2 text-center lg:text-left" data-aos="fade-right" data-aos-duration="1000">
                <p class="text-purple-500 font-medium mb-2">Welcome to my portfolio</p>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">
                    Hi, I'm <span class="text-gradient"><?= esc($name) ?></span>
                </h1>
                <div class="text-xl md:text-2xl text-gray-300 mb-6 h-8">
                    <span id="typed-text"></span>
                    <span class="typed-cursor">|</span>
                </div>
                <p class="text-gray-400 mb-8 max-w-lg mx-auto lg:mx-0">
                    <?= esc($about) ?>
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#projects" class="btn-primary inline-flex items-center justify-center">
                        <span>View My Work</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#contact" class="btn-secondary inline-flex items-center justify-center">
                        <span>Let's Talk</span>
                        <i class="fas fa-paper-plane ml-2"></i>
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-12">
                    <div class="text-center lg:text-left" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-3xl md:text-4xl font-bold text-gradient counter" data-target="15">0</h3>
                        <p class="text-gray-400 text-sm">Projects Done</p>
                    </div>
                    <div class="text-center lg:text-left" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-3xl md:text-4xl font-bold text-gradient counter" data-target="10">0</h3>
                        <p class="text-gray-400 text-sm">Happy Clients</p>
                    </div>
                    <div class="text-center lg:text-left" data-aos="fade-up" data-aos-delay="400">
                        <h3 class="text-3xl md:text-4xl font-bold text-gradient counter" data-target="2">0</h3>
                        <p class="text-gray-400 text-sm">Years Experience</p>
                    </div>
                </div>
            </div>

            <!-- Profile Image -->
            <div class="lg:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1000">
                <div class="profile-image-container">
                    <div class="profile-image-wrapper">
                        <img src="<?= base_url('images/00eb764d-9875-49f8-a078-5fd1b08df896.jpg') ?>"
                             alt="<?= esc($name) ?>"
                             class="profile-image">
                        <div class="profile-ring"></div>
                        <div class="profile-ring-2"></div>
                    </div>
                    <!-- Floating Icons -->
                    <div class="floating-icon floating-icon-1">
                        <i class="fab fa-html5 text-orange-500"></i>
                    </div>
                    <div class="floating-icon floating-icon-2">
                        <i class="fab fa-react text-cyan-400"></i>
                    </div>
                    <div class="floating-icon floating-icon-3">
                        <i class="fab fa-php text-purple-400"></i>
                    </div>
                    <div class="floating-icon floating-icon-4">
                        <i class="fab fa-js text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <a href="#about" class="text-gray-400 hover:text-purple-500 transition-colors">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-24 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-purple-600/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-purple-500 font-medium text-sm uppercase tracking-wider">Get To Know</span>
            <h2 class="text-4xl md:text-5xl font-bold mt-2">About <span class="text-gradient">Me</span></h2>
        </div>

        <div class="about-main-wrapper">
            <!-- Image Side -->
            <div class="about-image-column" data-aos="fade-right" data-aos-duration="1000">
                <div class="about-image-wrapper">
                    <!-- Decorative Background Circle -->
                    <div class="about-bg-circle"></div>

                    <!-- Main Image Container -->
                    <div class="about-image-box">
                        <img src="<?= base_url('images/ankit2.jpeg') ?>"
                             alt="<?= esc($name) ?>"
                             class="about-photo">
                        <!-- Gradient Overlay -->
                        <div class="about-photo-overlay"></div>
                        <!-- Corner Decorations -->
                        <div class="corner-decoration corner-tl"></div>
                        <div class="corner-decoration corner-br"></div>
                    </div>

                    <!-- Stats Row Below Image -->
                    <div class="about-stats-row">
                        <div class="about-stat-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="stat-number text-gradient">2+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="about-stat-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="stat-number text-gradient">15+</div>
                            <div class="stat-label">Projects Done</div>
                        </div>
                        <div class="about-stat-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="stat-number text-gradient">10+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="about-content-column" data-aos="fade-left" data-aos-duration="1000">
                <!-- Intro Badge -->
                <div class="inline-flex items-center gap-2 bg-purple-500/10 border border-purple-500/20 rounded-full px-4 py-2 mb-6">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-sm text-purple-400">Available for Freelance</span>
                </div>

                <h3 class="text-2xl md:text-3xl font-bold mb-4">
                    PHP Developer at <a href="https://www.digitalzillas.com/" target="_blank" class="text-gradient hover-link">Digitalzillas</a>
                </h3>

                <p class="text-gray-300 mb-4 leading-relaxed">
                    I am a dedicated PHP Developer based in <strong class="text-white"><?= esc($location) ?></strong>,
                    with <strong class="text-purple-400">2+ years</strong> of experience in building dynamic web applications
                    using PHP and CodeIgniter 4 framework. I specialize in creating scalable, secure, and maintainable solutions.
                </p>

                <p class="text-gray-400 mb-8 leading-relaxed">
                    I build reusable REST APIs, design optimized database schemas, and implement secure authentication systems.
                    Passionate about clean code, MVC architecture, and collaborating with UI/UX teams to create responsive,
                    SEO-friendly web applications.
                </p>

                <!-- Info Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                    <div class="about-info-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-card-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="info-card-content">
                            <span class="info-label">Name</span>
                            <p class="info-value"><?= esc($name) ?></p>
                        </div>
                    </div>

                    <div class="about-info-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="info-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-card-content">
                            <span class="info-label">Email</span>
                            <p class="info-value"><?= esc($email) ?></p>
                        </div>
                    </div>

                    <div class="about-info-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-card-content">
                            <span class="info-label">Location</span>
                            <p class="info-value"><?= esc($location) ?></p>
                        </div>
                    </div>

                    <div class="about-info-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="info-card-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="info-card-content">
                            <span class="info-label">Company</span>
                            <a href="https://www.digitalzillas.com/" target="_blank" class="info-value text-purple-400 hover:text-purple-300">Digitalzillas <i class="fas fa-external-link-alt text-xs ml-1"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Tech Stack -->
                <div class="mb-8">
                    <h4 class="text-sm uppercase tracking-wider text-gray-400 mb-4">Tech Stack</h4>
                    <div class="flex flex-wrap gap-3">
                        <span class="tech-badge"><i class="fab fa-php"></i> PHP</span>
                        <span class="tech-badge"><i class="fas fa-fire"></i> CodeIgniter 4</span>
                        <span class="tech-badge"><i class="fas fa-database"></i> MySQL</span>
                        <span class="tech-badge"><i class="fab fa-js"></i> JavaScript</span>
                        <span class="tech-badge"><i class="fab fa-react"></i> React</span>
                        <span class="tech-badge"><i class="fab fa-node-js"></i> Node.js</span>
                        <span class="tech-badge"><i class="fas fa-wind"></i> Tailwind</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4">
                    <a href="#contact" class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>
                        <span>Hire Me</span>
                    </a>
                    <a href="#" class="btn-secondary">
                        <i class="fas fa-download mr-2"></i>
                        <span>Download CV</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Services Section -->
<section id="services" class="py-20 bg-gray-800/30">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title inline-block">My Services</h2>
            <p class="text-gray-400 max-w-2xl mx-auto mt-4">
                I offer a wide range of services to help businesses establish a strong online presence and achieve their digital goals.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach($services as $index => $service): ?>
            <div class="service-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="service-icon">
                    <i class="fas <?= esc($service['icon']) ?>"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3"><?= esc($service['title']) ?></h3>
                <p class="text-gray-400"><?= esc($service['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Basic Skills Section -->
<section id="basic-skills" class="py-20 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-full h-full">
        <div class="absolute top-20 right-20 w-64 h-64 bg-purple-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-purple-500 font-medium text-sm uppercase tracking-wider">Foundation</span>
            <h2 class="text-4xl md:text-5xl font-bold mt-2">Basic <span class="text-gradient">Skills</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto mt-4">
                Strong foundation in core programming languages that form the backbone of software development.
            </p>
        </div>

        <!-- Basic Skills Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
            <!-- C Language -->
            <div class="basic-skill-card" data-aos="fade-up" data-aos-delay="100">
                <div class="basic-skill-icon c-lang">
                    <span class="skill-letter">C</span>
                </div>
                <h3 class="basic-skill-name">C Language</h3>
                <p class="basic-skill-desc">System Programming</p>
                <div class="basic-skill-level">
                    <div class="level-bar">
                        <div class="level-fill" data-level="75"></div>
                    </div>
                    <span class="level-text">75%</span>
                </div>
            </div>

            <!-- C++ -->
            <div class="basic-skill-card" data-aos="fade-up" data-aos-delay="200">
                <div class="basic-skill-icon cpp-lang">
                    <span class="skill-letter">C++</span>
                </div>
                <h3 class="basic-skill-name">C++</h3>
                <p class="basic-skill-desc">Object Oriented</p>
                <div class="basic-skill-level">
                    <div class="level-bar">
                        <div class="level-fill" data-level="70"></div>
                    </div>
                    <span class="level-text">70%</span>
                </div>
            </div>

            <!-- Java -->
            <div class="basic-skill-card" data-aos="fade-up" data-aos-delay="300">
                <div class="basic-skill-icon java-lang">
                    <i class="fab fa-java"></i>
                </div>
                <h3 class="basic-skill-name">Java</h3>
                <p class="basic-skill-desc">Enterprise Apps</p>
                <div class="basic-skill-level">
                    <div class="level-bar">
                        <div class="level-fill" data-level="65"></div>
                    </div>
                    <span class="level-text">65%</span>
                </div>
            </div>

            <!-- Python -->
            <div class="basic-skill-card" data-aos="fade-up" data-aos-delay="400">
                <div class="basic-skill-icon python-lang">
                    <i class="fab fa-python"></i>
                </div>
                <h3 class="basic-skill-name">Python</h3>
                <p class="basic-skill-desc">Scripting & AI</p>
                <div class="basic-skill-level">
                    <div class="level-bar">
                        <div class="level-fill" data-level="60"></div>
                    </div>
                    <span class="level-text">60%</span>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-12 text-center" data-aos="fade-up" data-aos-delay="500">
            <div class="inline-flex items-center gap-3 bg-gray-800/50 backdrop-blur-sm border border-gray-700 rounded-full px-6 py-3">
                <i class="fas fa-graduation-cap text-purple-500"></i>
                <span class="text-gray-300">These languages form the foundation of my programming journey</span>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20 bg-gray-800/30">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Skills Content -->
            <div class="lg:w-1/2" data-aos="fade-right">
                <h2 class="section-title">Technical Skills</h2>
                <p class="text-gray-400 mb-8">
                    I have acquired a diverse set of skills through years of dedicated learning and practical experience. Here are my core technical competencies.
                </p>

                <div class="space-y-6">
                    <?php foreach($skills as $skill): ?>
                    <div class="skill-item">
                        <div class="flex justify-between mb-2">
                            <span class="font-medium"><?= esc($skill['name']) ?></span>
                            <span class="text-purple-500"><?= esc($skill['level']) ?>%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-progress" data-width="<?= esc($skill['level']) ?>"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Skills Visual -->
            <div class="lg:w-1/2" data-aos="fade-left">
                <div class="grid grid-cols-3 gap-6">
                    <!-- Web Technologies -->
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="100">
                        <i class="fab fa-html5 text-4xl text-orange-500"></i>
                        <span>HTML5</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="150">
                        <i class="fab fa-css3-alt text-4xl text-blue-500"></i>
                        <span>CSS3</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="200">
                        <i class="fab fa-js text-4xl text-yellow-400"></i>
                        <span>JavaScript</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="250">
                        <i class="fab fa-php text-4xl text-purple-400"></i>
                        <span>PHP</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="300">
                        <i class="fas fa-fire text-4xl text-orange-500"></i>
                        <span>CodeIgniter 4</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="350">
                        <i class="fab fa-react text-4xl text-cyan-400"></i>
                        <span>React</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="400">
                        <i class="fab fa-node-js text-4xl text-green-500"></i>
                        <span>Node.js</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="450">
                        <i class="fas fa-database text-4xl text-blue-400"></i>
                        <span>MySQL</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="500">
                        <i class="fab fa-git-alt text-4xl text-orange-600"></i>
                        <span>Git</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="550">
                        <i class="fab fa-react text-4xl text-white"></i>
                        <span>Next.js</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="600">
                        <i class="fas fa-leaf text-4xl text-green-500"></i>
                        <span>MongoDB</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="650">
                        <i class="fas fa-wind text-4xl text-cyan-400"></i>
                        <span>Tailwind CSS</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="700">
                        <i class="fab fa-bootstrap text-4xl text-purple-500"></i>
                        <span>Bootstrap</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="750">
                        <i class="fas fa-plug text-4xl text-green-400"></i>
                        <span>REST API</span>
                    </div>
                    <div class="tech-card" data-aos="zoom-in" data-aos-delay="800">
                        <i class="fas fa-code text-4xl text-blue-400"></i>
                        <span>VS Code</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20 bg-gray-800/30">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title inline-block">My Projects</h2>
            <p class="text-gray-400 max-w-2xl mx-auto mt-4">
                Here are some of my recent projects that showcase my skills and expertise in web development.
            </p>
        </div>

        <!-- Project Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="php">PHP</button>
            <button class="filter-btn" data-filter="javascript">JavaScript</button>
            <button class="filter-btn" data-filter="react">React</button>
            <button class="filter-btn" data-filter="next.js">Next.js</button>
            <button class="filter-btn" data-filter="node.js">Node.js</button>
            <button class="filter-btn" data-filter="mongodb">MongoDB</button>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-grid">
            <?php foreach($projects as $index => $project): ?>
            <div class="project-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>" data-category="<?= strtolower(implode(' ', $project['technologies'])) ?>">
                <div class="project-image">
                    <img src="<?= esc($project['image']) ?>" alt="<?= esc($project['title']) ?>">
                    <div class="project-overlay">
                        <a href="<?= esc($project['link']) ?>" class="project-link" title="View Project">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                        <a href="<?= esc($project['image']) ?>" class="project-link" title="View Image">
                            <i class="fas fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="project-content">
                    <h3 class="text-xl font-semibold mb-2"><?= esc($project['title']) ?></h3>
                    <p class="text-gray-400 text-sm mb-4"><?= esc($project['description']) ?></p>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach($project['technologies'] as $tech): ?>
                        <span class="tech-tag"><?= esc($tech) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title inline-block">Testimonials</h2>
            <p class="text-gray-400 max-w-2xl mx-auto mt-4">
                What my clients say about working with me.
            </p>
        </div>

        <div class="testimonial-slider" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach($testimonials as $index => $testimonial): ?>
                <div class="testimonial-card" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <p class="text-gray-300 mb-6">"<?= esc($testimonial['text']) ?>"</p>
                    <div class="flex items-center">
                        <img src="<?= esc($testimonial['image']) ?>" alt="<?= esc($testimonial['name']) ?>" class="w-12 h-12 rounded-full mr-4 object-cover">
                        <div>
                            <h4 class="font-semibold"><?= esc($testimonial['name']) ?></h4>
                            <p class="text-gray-400 text-sm"><?= esc($testimonial['position']) ?></p>
                        </div>
                    </div>
                    <div class="flex mt-4 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-800/30">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="section-title inline-block">Get In Touch</h2>
            <p class="text-gray-400 max-w-2xl mx-auto mt-4">
                Have a project in mind? Let's discuss how we can work together to bring your ideas to life.
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Contact Info -->
            <div class="lg:w-1/3" data-aos="fade-right">
                <div class="space-y-6">
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Location</h4>
                            <p class="text-gray-400"><?= esc($location) ?></p>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Email</h4>
                            <a href="mailto:<?= esc($email) ?>" class="text-gray-400 hover:text-purple-500 transition-colors"><?= esc($email) ?></a>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Phone</h4>
                            <a href="tel:<?= esc($phone) ?>" class="text-gray-400 hover:text-purple-500 transition-colors"><?= esc($phone) ?></a>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                <div class="mt-8">
                    <h4 class="font-semibold mb-4">Follow Me</h4>
                    <div class="flex space-x-4">
                        <?php foreach($social as $s): ?>
                        <a href="<?= esc($s['link']) ?>" target="_blank"
                           class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center hover:bg-purple-600 transition-all duration-300 hover:scale-110">
                            <i class="fab <?= esc($s['icon']) ?>"></i>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:w-2/3" data-aos="fade-left">
                <form id="contact-form" action="<?= base_url('contact/send') ?>" method="POST" class="space-y-6">
                    <?= csrf_field() ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Your Email</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="john@example.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" id="subject" name="subject" class="form-input" placeholder="Project Discussion" required>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea id="message" name="message" rows="5" class="form-input resize-none" placeholder="Tell me about your project..." required></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full md:w-auto">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->include('user/layouts/footer') ?>
