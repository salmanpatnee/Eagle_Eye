@extends('layouts.risk-appetite')
@section('title', 'Risk Appetite')
@section('title_ar', 'الرغبة في المخاطرة')

@section('content')
    <div>

        <x-table.action-wrapper title="Risk Appetite Heatmap">
            <x-action.button label="Update Risk Appetite" label_ar="تحديث الرغبة في المخاطرة" route_name="risk-appetites.list" />
        </x-table.action-wrapper>

        <section id="heatmap">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-white dark:bg-gray-800">
                <thead>
                    <tr>
                        <th rowspan="2"
                            class="px-4 py-2 text-left font-semibold text-gray-700 dark:text-gray-100 align-middle border-b border-gray-300 dark:border-gray-600">
                            Impact</th>
                        <th colspan="5" class="px-4 py-2 text-center font-semibold text-gray-700 dark:text-gray-100 border-b border-gray-300 dark:border-gray-600">
                            Likelihood (Probability)</th>
                    </tr>
                    <tr>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">1 (Rare)</th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">2 (Unlikely)
                        </th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">3 (Possible)
                        </th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">4 (Likely)</th>
                        <th class="px-2 py-1 text-center font-medium text-gray-600 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">5 (Certain)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (range(1, 5) as $impact)
                        <tr>
                            <td class="px-4 py-2 font-medium text-gray-700 dark:text-gray-100 border-b border-gray-200 dark:border-gray-600 align-middle">
                                {{ $impact }} ({{ $impacts[$impact - 1] }})
                            </td>
                            @foreach (range(1, 5) as $likelihood)
                                @php $data = $cells->get($impact.'-'.$likelihood); @endphp
                                <td
                                    class="px-2 py-2 border-b border-r border-gray-200 dark:border-gray-600 align-top {{ $data->risk_appetite_color ?? '' }}">
                                    @if ($data)
                                        <a href="{{ route('risk-appetites.edit', $data->id) }}" class="block space-y-1 hover:opacity-80">
                                            <p class="text-xs"><span class="font-semibold">Risk
                                                    ID:</span> {{ $data->risk_appetite_id }}</p>
                                            <p class="text-xs"><span class="font-semibold">Risk
                                                    Name:</span> {{ $data->risk_appetite_name }}</p>
                                            <p class="text-xs"><span class="font-semibold">Risk
                                                    Score:</span> {{ $data->risk_score }}</p>
                                        </a>
                                    @else
                                        <p class="text-xs text-gray-400 dark:text-gray-500">Not configured</p>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
@endsection
