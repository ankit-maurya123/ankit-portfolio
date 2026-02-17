<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\SkillModel;
use App\Models\ServiceModel;
use App\Models\ProjectModel;
use App\Models\TestimonialModel;
use App\Models\ContactModel;

class User extends BaseController
{
    protected $settingModel;
    protected $skillModel;
    protected $serviceModel;
    protected $projectModel;
    protected $testimonialModel;
    protected $contactModel;
    protected $useDatabase = false;

    public function __construct()
    {
        // Check if database tables exist
        try {
            $db = \Config\Database::connect();
            if ($db->tableExists('settings')) {
                $this->useDatabase = true;
                $this->settingModel = new SettingModel();
                $this->skillModel = new SkillModel();
                $this->serviceModel = new ServiceModel();
                $this->projectModel = new ProjectModel();
                $this->testimonialModel = new TestimonialModel();
                $this->contactModel = new ContactModel();
            }
        } catch (\Exception $e) {
            $this->useDatabase = false;
        }
    }

    public function index()
    {
        if ($this->useDatabase) {
            $data = $this->getDataFromDatabase();
        } else {
            $data = $this->getStaticData();
        }

        $data['title'] = 'Ankit Maurya - PHP Developer';
        return view('user/index', $data);
    }

    private function getDataFromDatabase()
    {
        $profile = $this->settingModel->getProfileSettings();

        // Get skills from database
        $skills = $this->skillModel->getActiveSkills();

        // Get services from database
        $servicesRaw = $this->serviceModel->getActiveServices();
        $services = [];
        foreach ($servicesRaw as $service) {
            $services[] = [
                'icon' => $service['icon'],
                'title' => $service['title'],
                'description' => $service['description'],
            ];
        }

        // Get projects from database
        $projectsRaw = $this->projectModel->getActiveProjects();
        $projects = [];
        foreach ($projectsRaw as $project) {
            $projects[] = [
                'title' => $project['title'],
                'description' => $project['description'],
                'image' => $project['image'],
                'technologies' => $this->projectModel->getTechnologiesArray($project),
                'link' => $project['project_url'] ?? '#',
            ];
        }

        // Get testimonials from database
        $testimonialsRaw = $this->testimonialModel->getActiveTestimonials();
        $testimonials = [];
        foreach ($testimonialsRaw as $testimonial) {
            $testimonials[] = [
                'name' => $testimonial['name'],
                'position' => $testimonial['position'] . ($testimonial['company'] ? ', ' . $testimonial['company'] : ''),
                'image' => $testimonial['image'],
                'text' => $testimonial['testimonial'],
            ];
        }

        return [
            'name' => $profile['name'],
            'profession' => $profile['profession'],
            'email' => $profile['email'],
            'phone' => $profile['phone'],
            'location' => $profile['location'],
            'about' => $profile['about'],
            'skills' => $skills,
            'services' => $services,
            'projects' => $projects,
            'testimonials' => $testimonials,
            'social' => [
                ['icon' => 'fa-github', 'link' => $profile['github'], 'name' => 'GitHub'],
                ['icon' => 'fa-linkedin', 'link' => $profile['linkedin'], 'name' => 'LinkedIn'],
                ['icon' => 'fa-twitter', 'link' => $profile['twitter'], 'name' => 'Twitter'],
                ['icon' => 'fa-instagram', 'link' => $profile['instagram'], 'name' => 'Instagram'],
            ],
            'stats' => [
                'projects_done' => $profile['projects_done'],
                'happy_clients' => $profile['happy_clients'],
                'years_experience' => $profile['years_experience'],
            ],
        ];
    }

    private function getStaticData()
    {
        return [
            'name' => 'Ankit Maurya',
            'profession' => 'PHP Developer',
            'email' => 'mauryankit071@gmail.com',
            'phone' => '+91 9336613389',
            'location' => 'Bangalore, India',
            'company' => 'Digitalzillas',
            'experience' => '2',
            'about' => 'I am a dedicated PHP Developer with 2 years of experience at Digitalzillas, Bangalore. I specialize in developing dynamic web applications using PHP and CodeIgniter 4 framework. I build reusable REST APIs, design optimized database schemas, and implement secure authentication systems. I am passionate about clean code, MVC architecture, and creating responsive, SEO-friendly web applications.',
            'skills' => [
                ['name' => 'PHP', 'level' => 90],
                ['name' => 'CodeIgniter 4', 'level' => 92],
                ['name' => 'MySQL', 'level' => 88],
                ['name' => 'JavaScript', 'level' => 85],
                ['name' => 'HTML5/CSS3', 'level' => 90],
                ['name' => 'Tailwind CSS', 'level' => 85],
                ['name' => 'Bootstrap', 'level' => 88],
                ['name' => 'Node.js', 'level' => 70],
                ['name' => 'React.js', 'level' => 65],
                ['name' => 'Git', 'level' => 80],
                ['name' => 'REST API', 'level' => 88],
                ['name' => 'MongoDB', 'level' => 60],
            ],
            'basicSkills' => [
                ['name' => 'C', 'level' => 75, 'desc' => 'System Programming'],
                ['name' => 'C++', 'level' => 70, 'desc' => 'Object Oriented'],
                ['name' => 'Java', 'level' => 65, 'desc' => 'Enterprise Apps'],
                ['name' => 'Python', 'level' => 60, 'desc' => 'Scripting & AI'],
            ],
            'projects' => [
                [
                    'title' => 'CRUD Application (MERN Stack)',
                    'description' => 'A full-stack CRUD application built with React.js frontend and Node.js backend with MongoDB database. Features include data management, ES6+ JavaScript, and responsive UI.',
                    'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400',
                    'technologies' => ['React.js', 'Node.js', 'MongoDB', 'ES6'],
                    'link' => '#'
                ],
                [
                    'title' => 'CRUD Application (PHP Stack)',
                    'description' => 'A PHP-based CRUD application with Tailwind CSS for styling. Implements MVC architecture with SQL database and modern JavaScript features.',
                    'image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400',
                    'technologies' => ['PHP', 'MySQL', 'Tailwind CSS', 'JavaScript'],
                    'link' => '#'
                ],
                [
                    'title' => 'Weather Application',
                    'description' => 'A dynamic weather application that fetches real-time weather data using API integration. Features include location search and weather forecasts.',
                    'image' => 'https://images.unsplash.com/photo-1592210454359-9043f067919b?w=400',
                    'technologies' => ['HTML', 'CSS', 'JavaScript', 'API'],
                    'link' => '#'
                ],
                [
                    'title' => 'QR Code Generator',
                    'description' => 'A QR code generator application that creates QR codes from user input. Simple, fast, and easy to use with download functionality.',
                    'image' => 'https://images.unsplash.com/photo-1595079676339-1534801ad6cf?w=400',
                    'technologies' => ['HTML', 'CSS', 'JavaScript'],
                    'link' => '#'
                ],
                [
                    'title' => 'Responsive Website',
                    'description' => 'A modern responsive website built with React.js and Bootstrap. Features smooth animations, mobile-friendly design, and optimized performance.',
                    'image' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=400',
                    'technologies' => ['React.js', 'Bootstrap', 'JavaScript', 'CSS'],
                    'link' => '#'
                ],
                [
                    'title' => 'Tic-Tac-Toe Game',
                    'description' => 'An interactive Tic-Tac-Toe game with AI opponent option. Features include score tracking, game reset, and responsive design for all devices.',
                    'image' => 'https://images.unsplash.com/photo-1611996575749-79a3a250f948?w=400',
                    'technologies' => ['HTML', 'CSS', 'JavaScript'],
                    'link' => '#'
                ],
                [
                    'title' => 'E-Commerce Platform (Next.js)',
                    'description' => 'A full-stack e-commerce platform built with Next.js featuring server-side rendering, dynamic routing, product catalog, cart functionality, and optimized SEO performance.',
                    'image' => base_url('images/image.png'),
                    'technologies' => ['Next.js', 'React.js', 'Tailwind CSS', 'MongoDB'],
                    'link' => '#'
                ],
                [
                    'title' => 'Real-Time Chat App (Node.js)',
                    'description' => 'A real-time chat application built with Node.js and Socket.io. Features include private messaging, group chats, online status, and message notifications.',
                    'image' => 'https://images.unsplash.com/photo-1611746872915-64382b5c76da?w=400',
                    'technologies' => ['Node.js', 'Socket.io', 'MongoDB', 'Express.js'],
                    'link' => '#'
                ],
                [
                    'title' => 'Blog CMS (Next.js + MongoDB)',
                    'description' => 'A modern blog content management system with Next.js frontend and MongoDB backend. Features include markdown editor, SEO optimization, and dynamic content rendering.',
                    'image' => base_url('images/image.png'),
                    'technologies' => ['Next.js', 'MongoDB', 'Node.js', 'Tailwind CSS'],
                    'link' => '#'
                ],
            ],
            'services' => [
                [
                    'icon' => 'fa-code',
                    'title' => 'Web Development',
                    'description' => 'Building dynamic web applications using PHP, CodeIgniter 4, and modern frameworks with clean MVC architecture.'
                ],
                [
                    'icon' => 'fa-server',
                    'title' => 'REST API Development',
                    'description' => 'Creating reusable and modular REST APIs with proper authentication, validation, and seamless frontend integration.'
                ],
                [
                    'icon' => 'fa-database',
                    'title' => 'Database Design',
                    'description' => 'Designing optimized database schemas with MySQL, writing efficient queries for high-performance applications.'
                ],
                [
                    'icon' => 'fa-mobile-alt',
                    'title' => 'Responsive Design',
                    'description' => 'Creating SEO-friendly and responsive web pages using Tailwind CSS and Bootstrap for all devices.'
                ],
                [
                    'icon' => 'fa-lock',
                    'title' => 'Security Implementation',
                    'description' => 'Implementing user authentication, session management, role-based access control, and security filters.'
                ],
                [
                    'icon' => 'fa-cloud-upload-alt',
                    'title' => 'Deployment & Hosting',
                    'description' => 'Managing deployment on shared/VPS hosting servers with Git version control and server configuration.'
                ],
            ],
            'responsibilities' => [
                'Developed and maintained dynamic web applications using PHP and CodeIgniter 4 (CI4) framework',
                'Built reusable and modular REST APIs and integrated them with front-end systems',
                'Designed database schemas and optimized MySQL queries for high performance',
                'Implemented user authentication, session management, and role-based access control',
                'Ensured code quality with MVC architecture, form validations, and security filters',
                'Collaborated with UI/UX team to create responsive and SEO-friendly web pages',
                'Used Git for version control and managed deployment on shared/VPS hosting servers',
            ],
            'testimonials' => [
                [
                    'name' => 'Rahul Sharma',
                    'position' => 'Project Manager, Digitalzillas',
                    'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                    'text' => 'Ankit is a dedicated developer who consistently delivers quality code. His expertise in CodeIgniter and API development has been valuable to our team.'
                ],
                [
                    'name' => 'Priya Patel',
                    'position' => 'Team Lead',
                    'image' => 'https://randomuser.me/api/portraits/women/44.jpg',
                    'text' => 'Great problem-solving skills and always meets deadlines. Ankit\'s work on our authentication system was exceptional.'
                ],
                [
                    'name' => 'Vikram Singh',
                    'position' => 'Client',
                    'image' => 'https://randomuser.me/api/portraits/men/22.jpg',
                    'text' => 'Professional and skilled developer. The web application he built for us exceeded our expectations. Highly recommended!'
                ],
            ],
            'social' => [
                ['icon' => 'fa-github', 'link' => 'https://github.com', 'name' => 'GitHub'],
                ['icon' => 'fa-linkedin', 'link' => 'https://linkedin.com', 'name' => 'LinkedIn'],
                ['icon' => 'fa-twitter', 'link' => 'https://twitter.com', 'name' => 'Twitter'],
                ['icon' => 'fa-instagram', 'link' => 'https://instagram.com', 'name' => 'Instagram'],
            ],
            'strengths' => [
                'Hard & Smart Working',
                'Problem Solving Skills',
                'Team Collaboration',
            ],
        ];
    }

    public function about()
    {
        $data = $this->useDatabase ? $this->getDataFromDatabase() : $this->getStaticData();
        $data['title'] = 'About - Ankit Maurya';
        return view('user/about', $data);
    }

    public function projects()
    {
        $data = $this->useDatabase ? $this->getDataFromDatabase() : $this->getStaticData();
        $data['title'] = 'Projects - Ankit Maurya';
        return view('user/projects', $data);
    }

    public function contact()
    {
        $data = $this->useDatabase ? $this->getDataFromDatabase() : $this->getStaticData();
        $data['title'] = 'Contact - Ankit Maurya';
        return view('user/contact', $data);
    }

    // Test endpoint to check if form submission works
    public function testForm()
    {
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Form endpoint is working!',
            'csrf_token' => csrf_hash(),
            'time' => date('Y-m-d H:i:s')
        ]);
    }

    public function sendMessage()
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request method.',
                'csrf_token' => csrf_hash()
            ]);
        }

        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'subject' => 'required|min_length[5]',
            'message' => 'required|min_length[10]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors(),
                'csrf_token' => csrf_hash()
            ]);
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('message');

        // Save to database if available
        $savedToDb = false;
        if ($this->useDatabase && $this->contactModel) {
            try {
                $this->contactModel->insert([
                    'name' => $name,
                    'email' => $email,
                    'subject' => $subject,
                    'message' => $message,
                ]);
                $savedToDb = true;
            } catch (\Exception $e) {
                log_message('error', 'Database Error: ' . $e->getMessage());
            }
        }

        // Send Email using PHPMailer
        $emailSent = $this->sendEmailWithPHPMailer($name, $email, $subject, $message);

        // Check if email password is configured
        $emailConfig = config('EmailSettings');
        $passwordConfigured = !empty($emailConfig->smtpPassword);

        if ($emailSent) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Thank you ' . $name . '! Your message has been sent successfully to my email. I will get back to you soon.',
                'csrf_token' => csrf_hash()
            ]);
        } else {
            // Email failed - show appropriate message
            if (!$passwordConfigured) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Email not configured! Please add Gmail App Password in app/Config/EmailSettings.php',
                    'csrf_token' => csrf_hash()
                ]);
            }
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Sorry, there was an error sending your message. Please try again or contact me directly at mauryankit071@gmail.com',
                'csrf_token' => csrf_hash()
            ]);
        }
    }

    private function sendEmailWithPHPMailer($name, $email, $subject, $message)
    {
        // Check if PHPMailer is available
        if (!class_exists('\PHPMailer\PHPMailer\PHPMailer')) {
            log_message('error', 'PHPMailer not installed');
            return false;
        }

        // Load email settings
        $emailConfig = config('EmailSettings');

        // Check if password is configured
        if (empty($emailConfig->smtpPassword)) {
            log_message('warning', 'Email not sent: Gmail App Password not configured in app/Config/EmailSettings.php');
            return false;
        }

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            // SMTP Configuration
            $mail->isSMTP();
            $mail->Host       = $emailConfig->smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $emailConfig->smtpUsername;
            $mail->Password   = $emailConfig->smtpPassword;
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $emailConfig->smtpPort;

            // Enable debugging for troubleshooting (set to 0 in production)
            $mail->SMTPDebug  = 0;

            // Recipients
            $mail->setFrom($emailConfig->fromEmail, $emailConfig->fromName);
            $mail->addAddress($emailConfig->toEmail, $emailConfig->toName);
            $mail->addReplyTo($email, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Portfolio Contact: ' . $subject;
            $mail->Body    = $this->getEmailTemplate($name, $email, $subject, $message);
            $mail->AltBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

            $mail->send();
            log_message('info', 'Email sent successfully to ' . $emailConfig->toEmail);
            return true;
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            log_message('error', 'PHPMailer Error: ' . $mail->ErrorInfo);
            return false;
        } catch (\Exception $e) {
            log_message('error', 'Email Error: ' . $e->getMessage());
            return false;
        }
    }

    private function getEmailTemplate($name, $email, $subject, $message)
    {
        return '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #8b5cf6 0%, #06b6d4 100%); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
                .content { background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; }
                .field { margin-bottom: 20px; }
                .label { font-weight: bold; color: #6b7280; font-size: 12px; text-transform: uppercase; margin-bottom: 5px; }
                .value { background: white; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb; }
                .message-box { background: white; padding: 20px; border-radius: 8px; border-left: 4px solid #8b5cf6; }
                .footer { text-align: center; padding: 20px; color: #6b7280; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1 style="margin:0;">New Contact Message</h1>
                    <p style="margin:10px 0 0 0; opacity: 0.9;">From your Portfolio Website</p>
                </div>
                <div class="content">
                    <div class="field">
                        <div class="label">From</div>
                        <div class="value">' . htmlspecialchars($name) . '</div>
                    </div>
                    <div class="field">
                        <div class="label">Email</div>
                        <div class="value"><a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></div>
                    </div>
                    <div class="field">
                        <div class="label">Subject</div>
                        <div class="value">' . htmlspecialchars($subject) . '</div>
                    </div>
                    <div class="field">
                        <div class="label">Message</div>
                        <div class="message-box">' . nl2br(htmlspecialchars($message)) . '</div>
                    </div>
                </div>
                <div class="footer">
                    <p>This email was sent from your portfolio contact form.</p>
                    <p>Reply directly to this email to respond to ' . htmlspecialchars($name) . '</p>
                </div>
            </div>
        </body>
        </html>';
    }
}
