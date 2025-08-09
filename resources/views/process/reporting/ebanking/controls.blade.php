@extends('layouts.mis')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
    <div>
        <x-table.action-wrapper title="Controls Related to Ebanking Assets">

        </x-table.action-wrapper>

        <x-table.table>
            <x-table.thead>
                <x-table.th label="S.No" />
                <x-table.th label="Control ID" label_ar="رمز الضوابط" />
                <x-table.th label="Control Name" label_ar="اسم الضوابط" />
                <x-table.th label="Maturity Level" label_ar="مستوى النضج" />
            </x-table.thead>

            <x-table.tbody>

                @forelse ($result as $row)
                    <tr>
                        <x-table.td class="text-center">
                            {{ $loop->index + 1 }}
                        </x-table.td>
                        <x-table.td>
                            <a href="{{ route('controls.show', $row->id) }}">{{ $row->control_id }}</a>
                        </x-table.td>
                        <x-table.td>{{ $row->control_name }}</x-table.td>
                        <x-table.td>{{ $row->maturity_level }}</x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table>
    </div>
@endsection
