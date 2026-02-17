<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        // Settings - Ankit Maurya's Profile
        $settings = [
            ['key_name' => 'site_name', 'value' => 'Ankit Maurya - Portfolio', 'type' => 'text', 'group_name' => 'general'],
            ['key_name' => 'owner_name', 'value' => 'Ankit Maurya', 'type' => 'text', 'group_name' => 'profile'],
            ['key_name' => 'profession', 'value' => 'PHP Developer', 'type' => 'text', 'group_name' => 'profile'],
            ['key_name' => 'email', 'value' => 'mauryankit071@gmail.com', 'type' => 'text', 'group_name' => 'contact'],
            ['key_name' => 'phone', 'value' => '+91 9336613389', 'type' => 'text', 'group_name' => 'contact'],
            ['key_name' => 'location', 'value' => 'Bangalore, India', 'type' => 'text', 'group_name' => 'contact'],
            ['key_name' => 'about', 'value' => 'I am a dedicated PHP Developer with 2 years of experience at Digitalzillas, Bangalore. I specialize in developing dynamic web applications using PHP and CodeIgniter 4 framework. I build reusable REST APIs, design optimized database schemas, and implement secure authentication systems. I am passionate about clean code, MVC architecture, and creating responsive, SEO-friendly web applications.', 'type' => 'textarea', 'group_name' => 'profile'],
            ['key_name' => 'github', 'value' => 'https://github.com', 'type' => 'text', 'group_name' => 'social'],
            ['key_name' => 'linkedin', 'value' => 'https://linkedin.com', 'type' => 'text', 'group_name' => 'social'],
            ['key_name' => 'twitter', 'value' => 'https://twitter.com', 'type' => 'text', 'group_name' => 'social'],
            ['key_name' => 'instagram', 'value' => 'https://instagram.com', 'type' => 'text', 'group_name' => 'social'],
            ['key_name' => 'projects_done', 'value' => '15', 'type' => 'text', 'group_name' => 'stats'],
            ['key_name' => 'happy_clients', 'value' => '10', 'type' => 'text', 'group_name' => 'stats'],
            ['key_name' => 'years_experience', 'value' => '2', 'type' => 'text', 'group_name' => 'stats'],
        ];

        foreach ($settings as $setting) {
            $setting['created_at'] = date('Y-m-d H:i:s');
            $setting['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('settings')->insert($setting);
        }

        // Skills - Ankit's actual skills
        $skills = [
            ['name' => 'PHP', 'level' => 90, 'icon' => 'fab fa-php', 'category' => 'backend', 'sort_order' => 1],
            ['name' => 'CodeIgniter 4', 'level' => 92, 'icon' => 'fas fa-fire', 'category' => 'framework', 'sort_order' => 2],
            ['name' => 'MySQL', 'level' => 88, 'icon' => 'fas fa-database', 'category' => 'backend', 'sort_order' => 3],
            ['name' => 'JavaScript', 'level' => 85, 'icon' => 'fab fa-js', 'category' => 'frontend', 'sort_order' => 4],
            ['name' => 'HTML5/CSS3', 'level' => 90, 'icon' => 'fab fa-html5', 'category' => 'frontend', 'sort_order' => 5],
            ['name' => 'Tailwind CSS', 'level' => 85, 'icon' => 'fas fa-wind', 'category' => 'frontend', 'sort_order' => 6],
            ['name' => 'Bootstrap', 'level' => 88, 'icon' => 'fab fa-bootstrap', 'category' => 'frontend', 'sort_order' => 7],
            ['name' => 'Node.js', 'level' => 70, 'icon' => 'fab fa-node-js', 'category' => 'backend', 'sort_order' => 8],
            ['name' => 'React.js', 'level' => 65, 'icon' => 'fab fa-react', 'category' => 'frontend', 'sort_order' => 9],
            ['name' => 'Git', 'level' => 80, 'icon' => 'fab fa-git-alt', 'category' => 'tools', 'sort_order' => 10],
            ['name' => 'REST API', 'level' => 88, 'icon' => 'fas fa-plug', 'category' => 'backend', 'sort_order' => 11],
            ['name' => 'MongoDB', 'level' => 60, 'icon' => 'fas fa-leaf', 'category' => 'backend', 'sort_order' => 12],
        ];

        foreach ($skills as $skill) {
            $skill['status'] = 'active';
            $skill['created_at'] = date('Y-m-d H:i:s');
            $skill['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('skills')->insert($skill);
        }

        // Services - Ankit's services based on resume
        $services = [
            ['title' => 'Web Development', 'description' => 'Building dynamic web applications using PHP, CodeIgniter 4, and modern frameworks with clean MVC architecture.', 'icon' => 'fa-code', 'sort_order' => 1],
            ['title' => 'REST API Development', 'description' => 'Creating reusable and modular REST APIs with proper authentication, validation, and seamless frontend integration.', 'icon' => 'fa-server', 'sort_order' => 2],
            ['title' => 'Database Design', 'description' => 'Designing optimized database schemas with MySQL, writing efficient queries for high-performance applications.', 'icon' => 'fa-database', 'sort_order' => 3],
            ['title' => 'Responsive Design', 'description' => 'Creating SEO-friendly and responsive web pages using Tailwind CSS and Bootstrap for all devices.', 'icon' => 'fa-mobile-alt', 'sort_order' => 4],
            ['title' => 'Security Implementation', 'description' => 'Implementing user authentication, session management, role-based access control, and security filters.', 'icon' => 'fa-lock', 'sort_order' => 5],
            ['title' => 'Deployment & Hosting', 'description' => 'Managing deployment on shared/VPS hosting servers with Git version control and server configuration.', 'icon' => 'fa-cloud-upload-alt', 'sort_order' => 6],
        ];

        foreach ($services as $service) {
            $service['status'] = 'active';
            $service['created_at'] = date('Y-m-d H:i:s');
            $service['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('services')->insert($service);
        }

        // Projects - Ankit's actual projects from resume
        $projects = [
            [
                'title' => 'CRUD Application (MERN Stack)',
                'description' => 'A full-stack CRUD application built with React.js frontend and Node.js backend with MongoDB database. Features include data management, ES6+ JavaScript, and responsive UI.',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400',
                'technologies' => 'React.js,Node.js,MongoDB,ES6',
                'project_url' => '#',
                'category' => 'react',
                'is_featured' => 1,
                'sort_order' => 1,
            ],
            [
                'title' => 'CRUD Application (PHP Stack)',
                'description' => 'A PHP-based CRUD application with Tailwind CSS for styling. Implements MVC architecture with SQL database and modern JavaScript features.',
                'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400',
                'technologies' => 'PHP,MySQL,Tailwind CSS,JavaScript',
                'project_url' => '#',
                'category' => 'php',
                'is_featured' => 1,
                'sort_order' => 2,
            ],
            [
                'title' => 'Weather Application',
                'description' => 'A dynamic weather application that fetches real-time weather data using API integration. Features include location search and weather forecasts.',
                'image' => 'https://images.unsplash.com/photo-1592210454359-9043f067919b?w=400',
                'technologies' => 'HTML,CSS,JavaScript,API',
                'project_url' => '#',
                'category' => 'javascript',
                'is_featured' => 1,
                'sort_order' => 3,
            ],
            [
                'title' => 'QR Code Generator',
                'description' => 'A QR code generator application that creates QR codes from user input. Simple, fast, and easy to use with download functionality.',
                'image' => 'https://images.unsplash.com/photo-1595079676339-1534801ad6cf?w=400',
                'technologies' => 'HTML,CSS,JavaScript',
                'project_url' => '#',
                'category' => 'javascript',
                'is_featured' => 0,
                'sort_order' => 4,
            ],
            [
                'title' => 'Responsive Website',
                'description' => 'A modern responsive website built with React.js and Bootstrap. Features smooth animations, mobile-friendly design, and optimized performance.',
                'image' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400',
                'technologies' => 'React.js,Bootstrap,JavaScript,CSS',
                'project_url' => '#',
                'category' => 'react',
                'is_featured' => 0,
                'sort_order' => 5,
            ],
            [
                'title' => 'Tic-Tac-Toe Game',
                'description' => 'An interactive Tic-Tac-Toe game with AI opponent option. Features include score tracking, game reset, and responsive design for all devices.',
                'image' => 'https://images.unsplash.com/photo-1611996575749-79a3a250f948?w=400',
                'technologies' => 'HTML,CSS,JavaScript',
                'project_url' => '#',
                'category' => 'javascript',
                'is_featured' => 0,
                'sort_order' => 6,
            ],
            [
                'title' => 'E-Commerce Platform (Next.js)',
                'description' => 'A full-stack e-commerce platform built with Next.js featuring server-side rendering, dynamic routing, product catalog, cart functionality, and optimized SEO performance.',
                'image' => '/images/image.png',
                'technologies' => 'Next.js,React.js,Tailwind CSS,MongoDB',
                'project_url' => '#',
                'category' => 'nextjs',
                'is_featured' => 1,
                'sort_order' => 7,
            ],
            [
                'title' => 'Real-Time Chat App (Node.js)',
                'description' => 'A real-time chat application built with Node.js and Socket.io. Features include private messaging, group chats, online status, and message notifications.',
                'image' => '/images/image.png',
                'technologies' => 'Node.js,Socket.io,MongoDB,Express.js',
                'project_url' => '#',
                'category' => 'nodejs',
                'is_featured' => 1,
                'sort_order' => 8,
            ],
            [
                'title' => 'Blog CMS (Next.js + MongoDB)',
                'description' => 'A modern blog content management system with Next.js frontend and MongoDB backend. Features include markdown editor, SEO optimization, and dynamic content rendering.',
                'image' => '/images/image.png',
                'technologies' => 'Next.js,MongoDB,Node.js,Tailwind CSS',
                'project_url' => '#',
                'category' => 'nextjs',
                'is_featured' => 1,
                'sort_order' => 9,
            ],
        ];

        foreach ($projects as $project) {
            $project['status'] = 'active';
            $project['created_at'] = date('Y-m-d H:i:s');
            $project['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('projects')->insert($project);
        }

        // Testimonials
        $testimonials = [
            [
                'name' => 'Rahul Sharma',
                'position' => 'Project Manager',
                'company' => 'Digitalzillas',
                'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'testimonial' => 'Ankit is a dedicated developer who consistently delivers quality code. His expertise in CodeIgniter and API development has been valuable to our team.',
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'name' => 'Priya Patel',
                'position' => 'Team Lead',
                'company' => 'Tech Solutions',
                'image' => 'https://randomuser.me/api/portraits/women/44.jpg',
                'testimonial' => 'Great problem-solving skills and always meets deadlines. Ankit\'s work on our authentication system was exceptional.',
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'name' => 'Vikram Singh',
                'position' => 'Client',
                'company' => 'StartupXYZ',
                'image' => 'https://randomuser.me/api/portraits/men/22.jpg',
                'testimonial' => 'Professional and skilled developer. The web application he built for us exceeded our expectations. Highly recommended!',
                'rating' => 5,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            $testimonial['status'] = 'active';
            $testimonial['created_at'] = date('Y-m-d H:i:s');
            $testimonial['updated_at'] = date('Y-m-d H:i:s');
            $this->db->table('testimonials')->insert($testimonial);
        }
    }
}
