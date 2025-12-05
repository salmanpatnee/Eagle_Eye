@props(['info' =>'', 'info_ar' => ''])

<tr class="bg-light-gray">
    <th>
        <p class="text-right">
            <span>الهدف</span>
            <br>
            <span>Objectives</span>
        </p>
    </th>
    <th colspan="10" class="text-end">
        <p class="text-right">
            @if ($info_ar)
                <span dir="rtl">{{$info_ar}}</span>
                <br>
            @endif
            <span dir="ltr">{{$info}}</span>
        </p>
    </th>
</tr>
<x-report-head />