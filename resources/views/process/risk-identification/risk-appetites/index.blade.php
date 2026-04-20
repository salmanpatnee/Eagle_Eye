@extends('layouts.risk-appetite')
@section('title', 'Risk Appetite')
@section('title_ar', 'الرغبة في المخاطرة')

@section('content')
    <div>

        <x-table.action-wrapper title="Risk Appetite Heatmap">
            <x-action.button label="Update Risk Appetite" label_ar="تحديث الرغبة في المخاطرة" route_name="risk-appetites.list" />
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
                                    <a href="{{ route('risk-appetites.edit', $data->id) }}" class="block space-y-1 hover:opacity-80">
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                ID:</span> {{ $data->risk_appetite_id }}</p>
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                Name:</span> {{ $data->risk_appetite_name }}</p>
                                        <p class="text-xs"><span class="font-semibold">Risk
                                                Score:</span> {{ $data->risk_score }}</p>
                                    </a>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
