<x-mail::message>
# New Lead Inquiry

You have received a new inquiry from your website.

## Contact Information

**Name:** {{ $lead->fullname }}

**Email:** {{ $lead->email }}

**Phone:** {{ $lead->phone }}

**Company:** {{ $lead->company ?? 'Not provided' }}

## Message

{{ $lead->message }}

---

This is an automated notification sent when a new lead submits an inquiry through your website.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
