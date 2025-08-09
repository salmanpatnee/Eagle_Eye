<td>{{ $row->main_domain_name }}</td>
<td>{{ $row->main_domain_id }}</td>

<td>{{ $row->sub_domain_name }}</td>
<td>{{ $row->sub_domain_id }}</td>

<td>{{ $row->control_level_title }}</td>
<td>{{ $row->control_id }}</td>

<td class="control-description-cell">{{ $row->control_description }}</td>
<td>{{ $row->status }}</td>

<td>{{ $row->remarks }}</td>
<td class="control-description-cell">{{ $row->corrective_action }}</td>
<td>
    @if ($row->corrective_action_due_date == '')
        _
    @else
        {{ \Carbon\Carbon::parse($row->corrective_action_due_date)->format('d/m/Y') }}
    @endif
</td>
