@props(['id' => '', 'details' => '', 'details_ar' => '', 'control' => '', 'status' => '', ])

<tr>
    <td class="bg-light-gray text-center">_</td>
    <td class="bg-light-gray text-center">
        {{-- <p dir="rtl">{{$id}}</p> --}}
        <p dir="ltr">{{$id}}</p>
    </td>
    <td style="text-align: left;">
        <p style="font-size: 12px">
            @if ($details_ar)
                <span>{{$details_ar}}</span>
                <br>
            @endif
            <span dir="ltr">{{$details}}</span>
        </p>
    </td>
    <td>_</td>
    <td style="text-align:center" class="status">
        @if($status)
            {!!$status!!}
        @else
            <p>
                <span>{{ $control->status_ar }} </span>
                <br>
                <span>{{ $control->status }}</span>
            </p>
        @endif
    </td>
    <td>{{ $control->remarks }}</td>
    <td>{{ $control->corrective_action }}</td>
    <td colspan="4">{{ $control->corrective_action_due_date }}</td>
</tr>