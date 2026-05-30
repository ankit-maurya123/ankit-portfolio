/**
 * Portfolio JavaScript - Main functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // Theme Toggle (Light/Dark Mode)
    // ============================================
    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleMobile = document.getElementById('theme-toggle-mobile');
    const html = document.documentElement;

    // Check for saved theme preference or default to system preference
    function getThemePreference() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            return savedTheme;
        }
        // Check system preference
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    // Apply theme
    function applyTheme(theme) {
        if (theme === 'light') {
            html.classList.add('light-mode');
        } else {
            html.classList.remove('light-mode');
        }
        localStorage.setItem('theme', theme);
        console.log('Theme changed to:', theme);
    }

    // Toggle theme function
    function toggleTheme(button) {
        const isLightMode = html.classList.contains('light-mode');
        const newTheme = isLightMode ? 'dark' : 'light';
        applyTheme(newTheme);

        // Add animation class if button provided
        if (button) {
            button.classList.add('theme-toggle-animate');
            setTimeout(() => {
                button.classList.remove('theme-toggle-animate');
            }, 300);
        }
    }

    // Initialize theme
    const currentTheme = getThemePreference();
    applyTheme(currentTheme);

    // Desktop theme toggle click handler
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            toggleTheme(this);
        });
    }

    // Mobile theme toggle click handler
    if (themeToggleMobile) {
        themeToggleMobile.addEventListener('click', function() {
            toggleTheme(this);
        });
    }

    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            applyTheme(e.matches ? 'dark' : 'light');
        }
    });

    // Make toggleTheme globally available
    window.toggleTheme = toggleTheme;

    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        offset: 100
    });

    // Preloader
    const preloader = document.getElementById('preloader');
    window.addEventListener('load', function() {
        setTimeout(() => {
            preloader.classList.add('hidden');
        }, 500);
    });

    // Header scroll effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const closeMenuBtn = document.getElementById('close-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    function openMobileMenu() {
        if (mobileMenu) {
            mobileMenu.classList.add('active');
            if (mobileMenuBtn) mobileMenuBtn.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeMobileMenu() {
        if (mobileMenu) {
            mobileMenu.classList.remove('active');
            if (mobileMenuBtn) mobileMenuBtn.classList.remove('active');
            document.body.style.overflow = '';
        }
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileMenu);
    }

    if (closeMenuBtn) {
        closeMenuBtn.addEventListener('click', closeMobileMenu);
    }

    // Close mobile menu when clicking a link
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Close mobile menu when clicking the hire me button inside it
    const mobileHireBtn = document.querySelector('.mobile-hire-btn');
    if (mobileHireBtn) {
        mobileHireBtn.addEventListener('click', closeMobileMenu);
    }

    // Close mobile menu on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });

    // Typing effect
    const typedText = document.getElementById('typed-text');
    if (typedText) {
        const texts = ['Full Stack Web Developer', 'Next.js Developer', 'React.js Developer', 'Node.js Developer', 'PHP / CodeIgniter 4 Developer', 'MERN Stack Developer'];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 100;

        function type() {
            const currentText = texts[textIndex];

            if (isDeleting) {
                typedText.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 50;
            } else {
                typedText.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 100;
            }

            if (!isDeleting && charIndex === currentText.length) {
                isDeleting = true;
                typingSpeed = 2000; // Pause at end
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                typingSpeed = 500; // Pause before typing next
            }

            setTimeout(type, typingSpeed);
        }

        type();
    }

    // Counter animation
    const counters = document.querySelectorAll('.counter');
    let countersAnimated = false;

    function animateCounters() {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.ceil(current) + '+';
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target + '+';
                }
            };

            updateCounter();
        });
    }

    // Trigger counter animation when in view
    const counterSection = document.querySelector('.counter');
    if (counterSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !countersAnimated) {
                    countersAnimated = true;
                    animateCounters();
                }
            });
        }, { threshold: 0.5 });

        observer.observe(counterSection);
    }

    // Skill progress animation
    const skillProgress = document.querySelectorAll('.skill-progress');
    const skillsSection = document.getElementById('skills');

    if (skillsSection) {
        const skillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    skillProgress.forEach(progress => {
                        const width = progress.getAttribute('data-width');
                        progress.style.width = width + '%';
                    });
                }
            });
        }, { threshold: 0.3 });

        skillObserver.observe(skillsSection);
    }

    // Basic Skills progress animation
    const basicSkillsSection = document.getElementById('basic-skills');
    const levelFills = document.querySelectorAll('.level-fill');

    if (basicSkillsSection && levelFills.length > 0) {
        const basicSkillObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    levelFills.forEach((fill, index) => {
                        setTimeout(() => {
                            const level = fill.getAttribute('data-level');
                            if (level) {
                                fill.style.width = level + '%';
                            }
                        }, index * 150);
                    });
                    basicSkillObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.2 });

        basicSkillObserver.observe(basicSkillsSection);
    }

    // Project filter
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            projectCards.forEach(card => {
                const category = card.getAttribute('data-category').toLowerCase();

                if (filter === 'all' || category.includes(filter.toLowerCase())) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Smooth scroll for navigation links
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const headerOffset = 80;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Update active nav link
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });

    // Active section highlighting
    const sections = document.querySelectorAll('section[id]');

    function highlightNavOnScroll() {
        const scrollY = window.pageYOffset;

        sections.forEach(section => {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');

            if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', highlightNavOnScroll);

    // Scroll to top button
    const scrollTopBtn = document.getElementById('scroll-top');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 500) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    });

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Contact form handling
    const contactForm = document.getElementById('contact-form');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const payload = Object.fromEntries(new FormData(this).entries());
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            const formAction = this.getAttribute('action');

            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';
            submitBtn.disabled = true;

            fetch(formAction, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            })
            .then(async response => {
                const text = await response.text();
                let data = null;
                try { data = JSON.parse(text); } catch (_) {}
                return { status: response.status, ok: response.ok, data, text };
            })
            .then(({ status, ok, data, text }) => {
                if (ok && data && data.success) {
                    showNotification(data.message || 'Message sent successfully! I will get back to you soon.', 'success');
                    contactForm.reset();
                    return;
                }
                if (data && data.message) {
                    showNotification(data.message, 'error');
                    return;
                }
                if (status === 404) {
                    showNotification('Email endpoint not found. Run "vercel dev" locally or deploy to Vercel.', 'error');
                } else if (status === 0 || !status) {
                    showNotification('Network error. Check your connection.', 'error');
                } else {
                    console.error('Non-JSON response:', status, text.slice(0, 200));
                    showNotification(`Server error (${status}). Check browser console.`, 'error');
                }
            })
            .catch(error => {
                console.error('Contact form error:', error);
                showNotification('Network error: ' + error.message, 'error');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    // Notification function
    function showNotification(message, type = 'success') {
        // Remove any existing notifications
        const existingNotifications = document.querySelectorAll('.notification-popup');
        existingNotifications.forEach(n => n.remove());

        const notification = document.createElement('div');
        notification.className = 'notification-popup';
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            z-index: 9999;
            transform: translateX(120%);
            transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            max-width: 400px;
            font-family: 'Poppins', sans-serif;
            ${type === 'success'
                ? 'background: linear-gradient(135deg, #10b981 0%, #059669 100%);'
                : 'background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);'
            }
            color: white;
        `;
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 15px;">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'}" style="font-size: 24px;"></i>
                <div>
                    <strong style="display: block; margin-bottom: 4px;">${type === 'success' ? 'Success!' : 'Error!'}</strong>
                    <span style="font-size: 14px; opacity: 0.95;">${message}</span>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" style="margin-left: 15px; background: rgba(255,255,255,0.2); border: none; color: white; width: 28px; height: 28px; border-radius: 50%; cursor: pointer; font-size: 14px;">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);

        // Remove after 6 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(120%)';
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 400);
        }, 6000);
    }

    // Make showNotification globally available for testing
    window.showNotification = showNotification;

    // Parallax effect for blobs
    document.addEventListener('mousemove', function(e) {
        const blobs = document.querySelectorAll('.blob');
        const mouseX = e.clientX / window.innerWidth;
        const mouseY = e.clientY / window.innerHeight;

        blobs.forEach((blob, index) => {
            const speed = (index + 1) * 20;
            const x = (mouseX - 0.5) * speed;
            const y = (mouseY - 0.5) * speed;
            blob.style.transform = `translate(${x}px, ${y}px)`;
        });
    });

    // Intersection Observer for fade-in animations
    const fadeElements = document.querySelectorAll('.fade-in');

    if (fadeElements.length > 0) {
        const fadeObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        fadeElements.forEach(el => fadeObserver.observe(el));
    }

    // Image lazy loading
    const lazyImages = document.querySelectorAll('img[data-src]');

    if (lazyImages.length > 0) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // Service card spotlight - tracks cursor inside each card
    const serviceCards = document.querySelectorAll('.service-card');
    if (serviceCards.length && window.matchMedia('(pointer: fine)').matches) {
        serviceCards.forEach(card => {
            card.addEventListener('pointermove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = ((e.clientX - rect.left) / rect.width) * 100;
                const y = ((e.clientY - rect.top) / rect.height) * 100;
                card.style.setProperty('--mx', `${x}%`);
                card.style.setProperty('--my', `${y}%`);
            });
            card.addEventListener('pointerleave', () => {
                card.style.setProperty('--mx', '50%');
                card.style.setProperty('--my', '50%');
            });
        });
    }

    console.log('Portfolio initialized successfully!');
});
