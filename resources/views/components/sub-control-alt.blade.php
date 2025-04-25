@props([
        'control_id' => '', 
        'description' => '', 
        'description_ar' => '', 
        'control' => '' ,
        'border_b' => '', 
        'theme' => 'bg-blue'
        ])
<tr>
    <td class="{{$theme}} text-light" style="border-top: none; border-bottom: none"></td>
    <td class="{{$theme}} text-light" style="{{$border_b == true ? '' : 'border-bottom: none;'}} border-top: none"></td>
    <td class="{{$theme}} text-light" style="{{$border_b == true ? '' : 'border-bottom: none;'}} border-top: none"></td>
    <td class="bg-light-gray">
        <span>فرعي</span>
    </td>
    <td class="bg-light-gray">
        <span>{{$control_id}}</span>
    </td>
    <td style="text-align: left">
        <span>{{$description_ar}}</span>
        <br>
        <span dir="ltr">{{$description}}</span>
    </td>
    <td class="status">
        <p>
            <span>{{ $control->status_ar }} </span>
            <br>
            <span>{{ $control->status }}</span>
        </p>
    </td>
    <td>{{$control->remarks}}</td>
    <td>{{$control->corrective_action}}</td>
    <td>{{$control->corrective_action_due_date}}</td>
</tr>