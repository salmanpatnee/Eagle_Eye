<td>{{ $row->control_level_title == 'Main' ? $row->control_id : '_' }}</td>
<td>{{ $row->control_level_title == 'Sub' ? $row->control_id : '_' }}</td>
<td class="control-description-cell">{{ $row->control_description }}</td>
<td>{{ $row->control_level_title == 'Main' ? $row->status : '_' }}</td>
<td>{{ $row->control_level_title == 'Sub' ? $row->status : '_' }}</td>
<td>{{ $row->remarks }}</td>
<td>{{ $row->corrective_action }}</td>
<td>
    @if ($row->corrective_action_due_date == '')
        _
    @else
        {{ \Carbon\Carbon::parse($row->corrective_action_due_date)->format('d/m/Y') }}
    @endif
</td>
