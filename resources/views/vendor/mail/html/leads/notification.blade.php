@component('mail::message')
# New Lead Notification

A new lead has been created in the system:

@component('mail::table')
| Field       | Value                |
|:------------|:---------------------|
| Full Name   | {{ $lead->fullname }} |
| Email       | {{ $lead->email }}    |
| Phone       | {{ $lead->phone }}    |
| Company     | {{ $lead->company }}  |
| Message     | {{ $lead->message }}  |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent