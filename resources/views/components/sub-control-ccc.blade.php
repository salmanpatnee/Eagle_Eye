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
        'theme' => 'bg-blue'
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
        <span>فرعي</span>
        <br>
        <span>SubControl</span>
    </td>
    <td class="bg-light-gray" dir="ltr">
        <span>{{$control_id}}</span>
    </td>
    <td>
        <p>
            <span>Must be fully implemented</span>
            <br>
            <span>يجب تطبيقه كليًا</span>
        </p>
    </td>
    <td style="text-align: left" class="description">
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