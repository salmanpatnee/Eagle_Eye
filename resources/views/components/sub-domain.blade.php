@props(['id' =>'', 'subdomain' => '', 'theme' => 'bg-blue'])

<tr class="{{$theme}}">
    <th style="color: white">
        <p>{{$id}}</p>
    </th>
    <th style="color: white; text-align: right" colspan="10">
        <p class="mb-0 mt-0 text-start">
            {{$subdomain}}
        </p>
    </th>
</tr>