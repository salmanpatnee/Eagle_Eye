@props(['info' =>'', 'info_ar' => ''])

<tr class="bg-light-gray">
    <th>
        <p>
            <span>الهدف</span>
            <br>
            <span>Objectives</span>
        </p>
    </th>
    <th colspan="10" class="text-end">
        <p>
            @if ($info_ar)
                <span>{{$info_ar}}</span>
                <br>
            @endif
            <span dir="ltr">{{$info}}</span>
        </p>
    </th>
</tr>
<x-report-head />