@props([
    'action_col' => 'false',
])

<thead style="position: sticky; top: 0; z-index: 50;">
    <tr style="background-color: #00053C; text-align: left; color: white;">

        {{ $slot }}
    </tr>
</thead>
