# Quickstart Guide: Lead Notification Email

## Overview
This guide will help you implement email notifications when new leads are created in the system. The implementation will send an email to a hardcoded email address whenever a new lead is successfully saved to the database.

## Prerequisites
- Laravel 9.x application
- Mail configuration set up in the application
- Mailtrap account for development (or production SMTP settings)

## Steps to Implement

### 1. Create the Mailable Class
Generate a new Mailable class to handle the lead notification email:
```bash
php artisan make:mail LeadNotificationMail --markdown=mail.leads.notification
```

### 2. Configure Email Settings
Update your `.env` file with your mail settings:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=587
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. Modify the LeadController
Update the `store` method in `app/Http/Controllers/LeadController.php` to send the email after successfully creating a lead.

### 4. Create Email Template
Customize the email template at `resources/views/vendor/mail/html/leads/notification.blade.php` with your desired layout and content.

### 5. Add Logging
Ensure email sending attempts are logged for debugging purposes by adding logging to the Mailable class.

## Testing
1. Make sure your mail configuration is correct
2. Submit a new lead through the form
3. Check your Mailtrap inbox (or production email) for the notification
4. Verify that emails are logged in your application logs

## Environment Configuration
For development, use Mailtrap:
- Sign up at https://mailtrap.io
- Get your SMTP settings
- Update your `.env` file

For production, update with your actual SMTP settings from your hosting provider.