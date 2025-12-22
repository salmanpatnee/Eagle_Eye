New Lead Notification

A new lead has been created in the system:

Full Name: {{ $lead->fullname }}
Email: {{ $lead->email }}
Phone: {{ $lead->phone }}
Company: {{ $lead->company }}
Message: {{ $lead->message }}

Thanks,
{{ config('app.name') }}