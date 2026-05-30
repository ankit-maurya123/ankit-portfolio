const nodemailer = require('nodemailer');

const OWNER_NAME = 'Ankit Maurya';
const OWNER_EMAIL = process.env.GMAIL_USER || 'mauryankit071@gmail.com';
const PORTFOLIO_URL = 'https://ankitmaurya.vercel.app';

const escapeHtml = (str = '') =>
    String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');

const isValidEmail = (email) =>
    typeof email === 'string' && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

function ownerEmailHtml({ name, email, subject, message }) {
    const safeName = escapeHtml(name);
    const safeEmail = escapeHtml(email);
    const safeSubject = escapeHtml(subject);
    const safeMessage = escapeHtml(message).replace(/\n/g, '<br>');
    const sentAt = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });

    return `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>New portfolio inquiry</title>
</head>
<body style="margin:0;padding:0;background:#0f1117;font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#e6e8ef;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#0f1117;padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#161922;border-radius:18px;overflow:hidden;box-shadow:0 20px 50px -20px rgba(0,0,0,0.7);">
          <tr>
            <td style="background:linear-gradient(135deg,#8b5cf6 0%,#06b6d4 100%);padding:32px 32px 28px;">
              <div style="display:inline-block;background:rgba(255,255,255,0.18);color:#fff;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;padding:6px 12px;border-radius:999px;">New Inquiry</div>
              <h1 style="margin:14px 0 6px;color:#ffffff;font-size:26px;font-weight:700;letter-spacing:-0.01em;">You've got a new message</h1>
              <p style="margin:0;color:rgba(255,255,255,0.85);font-size:14px;">Someone reached out through your portfolio contact form.</p>
            </td>
          </tr>
          <tr>
            <td style="padding:32px;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                <tr><td style="padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                  <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;">From</div>
                  <div style="font-size:16px;color:#ffffff;margin-top:4px;font-weight:600;">${safeName}</div>
                </td></tr>
                <tr><td style="padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                  <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;">Email</div>
                  <a href="mailto:${safeEmail}" style="font-size:15px;color:#22d3ee;text-decoration:none;margin-top:4px;display:inline-block;">${safeEmail}</a>
                </td></tr>
                <tr><td style="padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.06);">
                  <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;">Subject</div>
                  <div style="font-size:15px;color:#ffffff;margin-top:4px;">${safeSubject}</div>
                </td></tr>
                <tr><td style="padding:18px 0 6px;">
                  <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;margin-bottom:10px;">Message</div>
                  <div style="background:#0f1117;border:1px solid rgba(255,255,255,0.08);border-radius:12px;padding:18px;font-size:15px;line-height:1.65;color:#d8dbe6;">${safeMessage}</div>
                </td></tr>
              </table>
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-top:28px;">
                <tr>
                  <td align="center">
                    <a href="mailto:${safeEmail}?subject=Re:%20${encodeURIComponent(subject)}" style="display:inline-block;background:linear-gradient(135deg,#8b5cf6,#06b6d4);color:#ffffff;text-decoration:none;font-weight:600;font-size:14px;padding:13px 28px;border-radius:10px;">Reply to ${safeName}</a>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td style="padding:18px 32px;border-top:1px solid rgba(255,255,255,0.06);background:#11141c;">
              <p style="margin:0;color:#6b7280;font-size:12px;">Sent ${sentAt} IST · Portfolio contact form</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>`;
}

function userEmailHtml({ name, subject, message }) {
    const safeName = escapeHtml(name);
    const safeSubject = escapeHtml(subject);
    const safeMessage = escapeHtml(message).replace(/\n/g, '<br>');
    const firstName = (name || '').trim().split(/\s+/)[0] || 'there';
    const safeFirstName = escapeHtml(firstName);

    return `<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Thanks for reaching out</title>
</head>
<body style="margin:0;padding:0;background:#0f1117;font-family:'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#e6e8ef;">
  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#0f1117;padding:32px 16px;">
    <tr>
      <td align="center">
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#161922;border-radius:18px;overflow:hidden;box-shadow:0 20px 50px -20px rgba(0,0,0,0.7);">
          <tr>
            <td align="center" style="background:linear-gradient(135deg,#8b5cf6 0%,#06b6d4 100%);padding:40px 32px 32px;">
              <div style="width:64px;height:64px;border-radius:18px;background:rgba(255,255,255,0.18);display:inline-block;line-height:64px;text-align:center;font-size:30px;color:#ffffff;font-weight:700;">✓</div>
              <h1 style="margin:18px 0 8px;color:#ffffff;font-size:28px;font-weight:700;letter-spacing:-0.01em;">Message received</h1>
              <p style="margin:0;color:rgba(255,255,255,0.9);font-size:15px;">Thanks for getting in touch, ${safeFirstName}.</p>
            </td>
          </tr>
          <tr>
            <td style="padding:32px;">
              <p style="margin:0 0 16px;font-size:15px;line-height:1.7;color:#d8dbe6;">
                Hi <strong style="color:#ffffff;">${safeName}</strong>, I've received your message and will get back to you within <strong style="color:#22d3ee;">24&ndash;48 hours</strong>. In the meantime, here's a copy of what you sent for your records.
              </p>

              <div style="background:#0f1117;border:1px solid rgba(255,255,255,0.08);border-radius:12px;padding:20px;margin:20px 0;">
                <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;margin-bottom:6px;">Subject</div>
                <div style="font-size:15px;color:#ffffff;margin-bottom:16px;">${safeSubject}</div>
                <div style="font-size:11px;letter-spacing:1.5px;text-transform:uppercase;color:#8b5cf6;font-weight:700;margin-bottom:6px;">Your message</div>
                <div style="font-size:14px;line-height:1.65;color:#d8dbe6;">${safeMessage}</div>
              </div>

              <p style="margin:24px 0 8px;font-size:15px;line-height:1.7;color:#d8dbe6;">
                If your inquiry is urgent, feel free to reach me directly:
              </p>
              <table role="presentation" cellpadding="0" cellspacing="0" style="margin-top:6px;">
                <tr>
                  <td style="padding-right:10px;">
                    <a href="mailto:${OWNER_EMAIL}" style="display:inline-block;background:linear-gradient(135deg,#8b5cf6,#06b6d4);color:#ffffff;text-decoration:none;font-weight:600;font-size:13px;padding:11px 22px;border-radius:10px;">Email me</a>
                  </td>
                  <td>
                    <a href="${PORTFOLIO_URL}" style="display:inline-block;background:transparent;color:#22d3ee;text-decoration:none;font-weight:600;font-size:13px;padding:11px 22px;border:1px solid rgba(34,211,238,0.4);border-radius:10px;">Visit portfolio</a>
                  </td>
                </tr>
              </table>

              <p style="margin:28px 0 0;font-size:14px;line-height:1.7;color:#9ca3af;">
                Cheers,<br>
                <strong style="color:#ffffff;">${OWNER_NAME}</strong><br>
                <span style="color:#6b7280;font-size:13px;">Full Stack Web Developer</span>
              </p>
            </td>
          </tr>
          <tr>
            <td style="padding:18px 32px;border-top:1px solid rgba(255,255,255,0.06);background:#11141c;">
              <p style="margin:0;color:#6b7280;font-size:12px;text-align:center;">This is an automated confirmation. Please don't reply directly &mdash; I'll respond from my personal email.</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>`;
}

module.exports = async (req, res) => {
    if (req.method !== 'POST') {
        return res.status(405).json({ success: false, message: 'Method not allowed' });
    }

    const user = process.env.GMAIL_USER;
    const pass = process.env.GMAIL_APP_PASSWORD;
    if (!user || !pass) {
        console.error('GMAIL_USER or GMAIL_APP_PASSWORD env var is missing');
        return res.status(500).json({ success: false, message: 'Email service not configured. Please contact me directly.' });
    }

    const body = typeof req.body === 'string' ? JSON.parse(req.body || '{}') : (req.body || {});
    const { name, email, subject, message, botcheck } = body;

    if (botcheck) {
        return res.status(200).json({ success: true, message: 'Thanks!' });
    }

    if (!name || !email || !subject || !message) {
        return res.status(400).json({ success: false, message: 'All fields are required.' });
    }
    if (!isValidEmail(email)) {
        return res.status(400).json({ success: false, message: 'Please enter a valid email address.' });
    }
    if (String(message).length > 5000) {
        return res.status(400).json({ success: false, message: 'Message is too long (max 5000 characters).' });
    }

    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: { user, pass },
    });

    const cleanSubject = String(subject).slice(0, 200);
    const cleanName = String(name).slice(0, 100);

    try {
        await transporter.sendMail({
            from: `"Portfolio Contact" <${user}>`,
            to: user,
            replyTo: `"${cleanName}" <${email}>`,
            subject: `Portfolio inquiry: ${cleanSubject}`,
            html: ownerEmailHtml({ name: cleanName, email, subject: cleanSubject, message }),
            text: `New inquiry from ${cleanName} <${email}>\n\nSubject: ${cleanSubject}\n\n${message}`,
        });

        await transporter.sendMail({
            from: `"${OWNER_NAME}" <${user}>`,
            to: email,
            subject: `Thanks for reaching out, ${cleanName.split(/\s+/)[0]}!`,
            html: userEmailHtml({ name: cleanName, subject: cleanSubject, message }),
            text: `Hi ${cleanName},\n\nThanks for your message. I've received it and will get back to you within 24-48 hours.\n\nYour message:\nSubject: ${cleanSubject}\n\n${message}\n\nCheers,\n${OWNER_NAME}`,
        });

        return res.status(200).json({ success: true, message: 'Message sent! Check your inbox for a confirmation.' });
    } catch (err) {
        console.error('sendMail error:', err);
        return res.status(500).json({ success: false, message: 'Failed to send. Please try again or email me directly.' });
    }
};
