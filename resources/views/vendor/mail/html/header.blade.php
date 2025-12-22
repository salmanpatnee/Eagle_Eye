@props(['url'])
<tr>
<td class="header">
<a href="https://saudiciso.net/" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="https://saudiciso.net/Images/SaudiCISOLogo.png" class="logo" alt="Saudi CISO Logo">
@endif
</a>
</td>
</tr>
