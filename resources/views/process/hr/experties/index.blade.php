@extends('layouts.hr')
@section('title', 'Expertises')
@section('title_ar', 'الخبرات')

@section('content')
    <x-table.action-wrapper title="All Expertises">
        <x-action.button label="Add Expertise" label_ar="إضافة خبرة" route_name="expertises.create" />
    </x-table.action-wrapper>

 <x-table.table-sticky>
            <x-table.thead-sticky>
            <x-table.th label="S.No" label_ar="رقم" />
            <x-table.th label="Expertise Title" label_ar="عنوان الخبرة" />
            <x-table.th label="Action" label_ar="إجراء" />
            </x-table.thead-sticky>
        <x-table.tbody>
            @foreach ($expertises as $expertise)
                <tr>
                    <x-table.td>
                        {{ $expertise->expertise_id }}
                    </x-table.td>
                    <x-table.td>
                        {{ $expertise->expertise_title }}
                    </x-table.td>
                    <x-table.td action_col="true">
                        <x-action.view route_name="expertises.show" param="{{ $expertise->id }}" />
                        <x-action.edit route_name="expertises.edit" param="{{ $expertise->id }}" />
                        <x-action.delete route_name="expertises.destroy" param="{{ $expertise->id }}" />
                    </x-table.td>


                </tr>
            @endforeach
        
        </x-table.tbody>
    </x-table.table-sticky>

    <x-pagination>
        {{ $expertises->links() }}
    </x-pagination>
@endsection
