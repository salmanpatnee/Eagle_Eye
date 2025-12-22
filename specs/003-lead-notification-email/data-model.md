# Data Model: Lead Notification Email

## Lead Model
The Lead model already exists in the application and will be used to provide data for the email notification.

**Fields relevant to email notification:**
- id: int (primary key)
- name: string (lead's name)
- email: string (lead's email address) - validated as email format
- message: text (message from the lead)
- created_at: timestamp
- updated_at: timestamp

## Email Notification (Conceptual - No Database Needed)
For this implementation, we don't need to create a separate database table for email notifications since we're sending emails immediately upon lead creation. However, if needed in the future, the following fields could be considered:

- id: int (primary key)
- lead_id: int (foreign key to leads table)
- recipient: string (email address of recipient)
- subject: string (email subject line)
- content: text (email content)
- status: string (sent, failed, pending)
- sent_at: timestamp (when the email was sent)
- error_message: text (if any error occurred during sending)

## Email Template Structure
The email will be generated using Laravel's Markdown Mailable feature, which will include:
- Subject line with lead notification information
- Greeting
- Summary of the lead information (name, email, message)
- Timestamp of when the lead was created