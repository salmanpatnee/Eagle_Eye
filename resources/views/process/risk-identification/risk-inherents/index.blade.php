@extends('layouts.risk-appetite')
@section('title', 'Risk Inherent')
@section('title_ar', 'المخاطر الكامنة')

@section('content')
    <div>

        <x-table.action-wrapper title="All Risk Inherents">
            <x-action.button label="Add Risk Inherent" label_ar="إضافة المخاطر الكامنة" route_name="risk-inherents.create" />
        </x-table.action-wrapper>


       <x-table.scroll-table height-offset="280" min-width="900px">
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Risk Inherent ID" label_ar="رمز المخاطر الكامنة" />
                <x-table.th label="Risk Inherent Score" label_ar="درجة المخاطرة" />
                <x-table.th label="Description" label_ar="وصف المخاطر الكامنة" />
                <x-table.th label="Action" label_ar="إجراء " />
           </x-slot:head>
            <x-slot:body>
                @foreach ($riskInherents as $riskInherent)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$riskInherents" />
                        </x-table.td>
                        <x-table.td>
                            {{ $riskInherent->risk_inherent_id }}
                        </x-table.td>
                        <x-table.td>{{ $riskInherent->risk_inherent_score }}</x-table.td>
                        <x-table.td wrap="true"><span class="line-clamp-3" title="{{ $riskInherent->risk_inherent_description }}">{{ $riskInherent->risk_inherent_description }}</span></x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="risk-inherents.show" param="{{ $riskInherent->id }}" />
                            <x-action.edit route_name="risk-inherents.edit" param="{{ $riskInherent->id }}" />
                            <x-action.delete route_name="risk-inherents.destroy" param="{{ $riskInherent->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
           </x-slot:body>
     </x-table.scroll-table>
        <x-pagination>
            {{ $riskInherents->links() }}
        </x-pagination>
    </div>
@endsection
