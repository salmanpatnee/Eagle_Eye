<x-mail::message>
# Welcome to EURO CISO

Your payment was successful and your account has been created. Below are your login credentials:

**Email / Username:** {{ $user->email }}

**Password:** {{ $plainPassword }}

<x-mail::button :url="route('login')">
Log In Now
</x-mail::button>

For security, please change your password after your first login.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
