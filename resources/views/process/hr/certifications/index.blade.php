@extends('layouts.hr')
@section('title', 'Certifications')
@section('title_ar', 'الشهادات')

@section('content')
    <div>
        <x-table.action-wrapper title="All Certifications">
            <x-action.button label="Add Certification" label_ar="إضافة شهادة" route_name="certifications.create" />
        </x-table.action-wrapper>

      <x-table.table-sticky>
            <x-table.thead-sticky>
                <x-table.th label="S.No" label_ar="رقم" />
                <x-table.th label="Certification ID" label_ar="رمز الشهادة" />
                <x-table.th label="Certification Title" label_ar="عنوان الشهادة" />
                <x-table.th label="Institute" label_ar="المعهد" />
                <x-table.th label="Action" label_ar="إجراء " />
            </x-table.thead-sticky>
            <x-table.tbody>
                @foreach ($certifications as $certification)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$certifications" /></x-table.td>
                        <x-table.td>{{ $certification->certification_id }}</x-table.td>
                        <x-table.td>{{ $certification->certification_title }}</x-table.td>
                        <x-table.td>{{ $certification->institute }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="certifications.show" param="{{ $certification->id }}" />
                            <x-action.edit route_name="certifications.edit" param="{{ $certification->id }}" />
                            <x-action.delete route_name="certifications.destroy" param="{{ $certification->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
       </x-table.table-sticky>

        <x-pagination>
            {{ $certifications->links() }}
        </x-pagination>

    </div>
@endsection