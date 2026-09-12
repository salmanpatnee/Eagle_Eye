@extends('layouts.control')
@section('title', 'Control Definition')
@section('title_ar', 'تعريف الضوابط')

@section('content')
    <div>

        <x-table.action-wrapper title="All Controls">
            <x-action.button label="Add Control" label_ar="إضافة الضوابط" route_name="controls.create" />
        </x-table.action-wrapper>

        <form action="{{ route('controls.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Controls" label_ar="الضوابط" name="control[]"
                            :data="$controlNames" id_key="control_id" value_key="control_name"
                            :value="$control" :show_key="true" />
                    </div>
                    <div>
                        <x-form.select label="Best Practices" label_ar="أفضل الممارسات" name="bestPractice"
                            placeholder="Select Best Practice" :value="$bestPractice" :data="$bestPractices"
                            id_key="best_practices_id" value_key="best_practices_name" searchable />
                    </div>
                    <div>
                        <x-form.select label="Risk" label_ar="المخاطر" name="risk" placeholder="Select Risk"
                            :value="$risk" :data="$risks" id_key="risk_id" value_key="risk_name" searchable />
                    </div>
                </x-form.grid-3-col>
                <div class="flex justify-center gap-3">
                    <button class="action-btn text-center justify-center">Filter Controls</button>
                    <a href="{{ route('controls.index') }}" class="action-btn text-center justify-center">Clear Filters</a>
                </div>
            </div>
        </form>

        <x-table.scroll-table>
            <x-slot:head>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Owner" label_ar="اسم مالك الضوابط" />
                <x-table.th label="Risks" label_ar="المخاطر" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-slot:head>
            <x-slot:body>
                @foreach ($controls as $control)
                    <tr>
                        <x-table.td>
                            <x-table.serial :loop="$loop" :paginator="$controls" />
                        </x-table.td>
                        <x-table.td>{{ $control->control_id }}</x-table.td>
                        <x-table.td min-width="300px" max-width="800px">
                            {{ $control->control_name }}
                        </x-table.td>
                        <x-table.td min-width="210px" max-width="200px">
                            {{ $control?->owner?->owner_name }}
                        </x-table.td>
                        <x-table.td min-width="300px" max-width="600px">
                            <x-table-list :data="$control->risks" id_key="" value_key="risk_name" />
                        </x-table.td>
                        <x-table.td action_col="true">
                            <x-action.view route_name="controls.show" param="{{ $control->id }}" />
                            <x-action.edit route_name="controls.edit" param="{{ $control->id }}" />
                            <x-action.delete route_name="controls.destroy" param="{{ $control->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-slot:body>
        </x-table.scroll-table>
        <x-pagination>
            {{ $controls->links() }}
        </x-pagination>
    </div>
@endsection
