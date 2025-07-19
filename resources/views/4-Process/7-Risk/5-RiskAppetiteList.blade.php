@extends('4-Process.7-Risk.layout.appetite')
@section('title', 'Risk Appetite')
@section('title_ar', 'الرغبة في المخاطرة')

@section('content')
    <div>

        <x-table.action-wrapper>
            {{-- <x-action.button label="Add Organization" label_ar="إضافة جهة" route_name="organizations.create" /> --}}
        </x-table.action-wrapper>

        <section id="heatmap">
            <table class="min-w-full border border-gray-300 rounded-lg shadow-sm bg-white">
                <thead>
                    <tr class="bg-gray-100">
                        <th rowspan="2"
                            class="px-4 py-2 text-left font-semibold text-gray-700 align-middle border-b border-gray-300">
                            Impact</th>
                        <th colspan="5" class="px-4 py-2 text-center font-semibold text-gray-700 border-b border-gray-300">
                            Likelihood (Probability)</th>
                    </tr>
                    <tr class="bg-gray-50">
                        <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">1 (Rare)</th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">2 (Unlikely)
                        </th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">3 (Possible)
                        </th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">4 (Likely)</th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">5 (Certain)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result->chunk(5) as $chunk)
                        <tr class="even:bg-gray-50">
                            <td class="px-4 py-2 font-medium border-b border-gray-200 align-middle">
                                {{ $loop->index + 1 }} ({{ $impacts[$loop->index] }})
                            </td>
                            @foreach ($chunk as $data)
                                <td
                                    class="px-2 py-2 border-b border-r border-gray-200 align-top {{ $data->risk_appetite_color }}">
                                    <div class="space-y-1">
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                ID:</span> {{ $data->risk_appetite_id }}</p>
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                Name:</span> {{ $data->risk_appetite_name }}</p>
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                Score:</span> {{ $data->risk_score }}</p>
                                    </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
