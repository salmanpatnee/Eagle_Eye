@props([
        'main_domain' => '', 
        'main_domain_ar' => '', 
        'main_domain_id' => '', 
        'sub_domain' => '', 
        'sub_domain_ar' => '', 
        'control_id' => '', 
        'description' => '', 
        'description_ar' => '', 
        'control' => '', 
        'border_b' => '', 
        'border_t' => '', 
        'theme' => 'bg-blue', 
        'status' => ''
        ])
<tr>
    <td class="{{$theme}} text-light" style="border-bottom: none; {{$border_t == true ? '' : 'border-top: none;'}}">
        <span>{{$main_domain_ar}}</span>
        <br>
        <span>{{$main_domain}}</span>
    </td>
    <td class="{{$theme}} text-light" style="{{$border_b == true ? '' : 'border-bottom: none;'}} border-top: none">
        <span>{{$main_domain_id}}</span>
    </td>
    <td class="{{$theme}} text-light" style="{{$border_b == true ? '' : 'border-bottom: none;'}} border-top: none">
        <span>{{$sub_domain_ar}}</span>
        <br>
        <span>{{{$sub_domain}}}</span>
    </td>
    <td class="bg-light-gray">
        <span>أساسي</span>
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
        @if ($status)
            {!!$status!!}
        @else    
            <p>
                <span>{{ $control->status_ar }} </span>
                <br>
                <span>{{ $control->status }}</span>
            </p>
        @endif
    </td>
    @if ($status)
    <td>-</td>
    <td>-</td>
    <td>-</td>    
    @else
        
    <td>{{$control->remarks}}</td>
    <td>{{$control->corrective_action}}</td>
    <td>{{$control->corrective_action_due_date}}</td>
    @endif
</tr>