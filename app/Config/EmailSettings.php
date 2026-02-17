<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class EmailSettings extends BaseConfig
{
    /**
     * SMTP Host
     */
    public string $smtpHost = 'smtp.gmail.com';

    /**
     * SMTP Port
     */
    public int $smtpPort = 587;

    /**
     * SMTP Username (Your Gmail address)
     */
    public string $smtpUsername = 'mauryankit071@gmail.com';

    /**
     * SMTP Password (Gmail App Password)
     *
     * HOW TO GET GMAIL APP PASSWORD:
     * 1. Go to https://myaccount.google.com/
     * 2. Click on "Security" in the left sidebar
     * 3. Enable "2-Step Verification" if not already enabled
     * 4. Go to https://myaccount.google.com/apppasswords
     * 5. Select "Mail" as the app and "Windows Computer" as device
     * 6. Click "Generate"
     * 7. Copy the 16-character password and paste it below
     *
     * IMPORTANT: The password looks like: "xxxx xxxx xxxx xxxx" (without spaces when you paste)
     */
    public string $smtpPassword = 'xiudkgayweyfyimd'; // Gmail App Password

    /**
     * From Email Address
     */
    public string $fromEmail = 'mauryankit071@gmail.com';

    /**
     * From Name
     */
    public string $fromName = 'Portfolio Contact';

    /**
     * To Email Address (where you receive contact form messages)
     */
    public string $toEmail = 'mauryankit071@gmail.com';

    /**
     * To Name
     */
    public string $toName = 'Ankit Maurya';
}
