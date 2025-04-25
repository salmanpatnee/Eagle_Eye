<tr>
    <td class="text-center bg-light-gray">
        <p>{{ $row->control_level_title == 'Sub Control' ? 'فرعي' : 'أساسي' }}</p>
        <p dir="ltr">{{ $row->control_level_title }}</p>
    </td>
    <td class="text-center bg-light-gray" dir="ltr">
        {{ $row->control_id }}
    </td>
    <td class="text-center bg-light-gray">
        <p>يجب تطبيقه كليًا</p>
        <p dir="ltr">Must be fully implemented</p>
    </td>
    <td class="text-start py-2">
        <p>{{ $row->control_description_ar }}</p>
        <p dir="ltr">{{ $row->control_description }}</p>
    </td>
    <td class="text-center py-2">{{ $row->status ?? '_' }}</td>
    <td class="text-center py-2">{{ $row->remarks ?? '_' }}</td>
    <td class="text-center py-2">{{ $row->corrective_action ?? '_' }}</td>
    <td class="text-center py-2">{{ $row->corrective_action_due_date ?? '_' }}</td>
</tr>
