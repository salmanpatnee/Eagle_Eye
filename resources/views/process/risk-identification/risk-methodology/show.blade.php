@extends('layouts.app-full')
@section('title', 'Risk Methodology')
@section('title_ar', 'منهجية المخاطر')
@section('content')

    <div class="report">
        <header class="text-center my-12">
            @if ($organization->organization_logo != null)
                <img src="{{ asset('storage/' . $organization->organization_logo) }}" alt="Organization Logo" width="250"
                    class="mb-6 mx-auto">
            @endif
            <p class="text-lg font-bold text-gray-900 mb-0 rtl:text-right" lang="ar" dir="rtl">
                {{ $organization->organization_name_arabic }}</p>
            <p class="text-lg font-bold text-gray-900 mb-0">{{ $organization->organization_name_english }}</p>
            @if ($riskMethodology->risk_methodology_id == 'RM-001')
                <p class="text-lg font-bold text-gray-900 mb-0">Risk Methodology Report Based on ISO-27005</p>
            @elseif ($riskMethodology->risk_methodology_id == 'RM-002')
                <p class="text-lg font-bold text-gray-900 mb-0">Risk Methodology Report Based on ISO-31000</p>
            @else
                <p class="text-lg font-bold text-gray-900 mb-0">Risk Methodology Report</p>
            @endif
            <p class="text-lg font-bold text-gray-900">{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
        </header>

        <div class="px-7 mt-5">
            <div class="container fs-5">
                <!-- Introduction Section -->
                <section class="mb-2">
                    <p class="text-lg mb-2"><b style="font-weight: bold">Risk Methodology ID</b>:
                        {{ $riskMethodology->risk_methodology_id }}
                    </p>
                    <p class="text-lg mb-2"><b style="font-weight: bold">Risk Methodology Name</b>:
                        {{ $riskMethodology->risk_methodology_name }}</p>
                </section>
                <hr class="my-6">
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Background:</h3>
                    <p class="text-justify" style="font-size: 20px; text-align: justify; line-height: 30px;">
                        {{ $riskMethodology->background }}</p>
                </section>
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Source:</h3>
                    <p class="text-justify" style="font-size: 20px; text-align: justify; line-height: 30px;">
                        {{ $riskMethodology->risk_methodology_source }}</p>

                </section>
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Objectives:</h3>
                    <ul>
                        @forelse ($riskMethodology->objectives as $objective)
                            <li style="font-size: 20px; text-align: justify; line-height: 30px;">
                                {{ $objective->objective }}</li>
                        @empty
                    </ul>
                    @endforelse
                </section>
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Scope:</h3>
                    <p class="text-justify" style="font-size: 20px; text-align: justify; line-height: 30px;">
                        {{ $riskMethodology->scope }}</p>
                </section>
                <hr class="my-6">
                <section class="mb-2">

                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Risk Assessment Process
                        Overview:</h3>
                    <p class="text-justify mb-2" style="font-size: 20px; text-align: justify; line-height: 30px;">The risk
                        assessment process consists of the following steps:</p>

                    <small class="font-bold text-lg mt-3 inline-block">Context Establishment</small>
                    <p class="text-base">{!! html_entity_decode($riskMethodology?->context) !!}</p>
                    <small class="font-bold text-lg mt-3 inline-block">Risk Identification</small>
                    <p class="text-base">{!! html_entity_decode($riskMethodology?->risk_identification) !!}</p>
                    <small class="font-bold text-lg mt-3 inline-block">Risk Analysis</small>
                    <p class="text-base">{!! html_entity_decode($riskMethodology?->risk_analysis) !!}</p>
                    <small class="font-bold text-lg mt-3 inline-block">Risk Evaluation</small>
                    <p class="text-base">{!! html_entity_decode($riskMethodology?->risk_evaluation) !!}</p>
                </section>
                <hr class="my-6">

                <section id="heatmap">
                    <table class="min-w-full border border-gray-300 rounded-lg shadow-sm bg-white">
                        <thead>
                            <tr class="bg-gray-100">
                                <th rowspan="2"
                                    class="px-4 py-2 text-left font-semibold text-gray-700 align-middle border-b border-gray-300">
                                    Impact</th>
                                <th colspan="5"
                                    class="px-4 py-2 text-center font-semibold text-gray-700 border-b border-gray-300">
                                    Likelihood (Probability)</th>
                            </tr>
                            <tr class="bg-gray-50">
                                <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">1
                                    (Rare)</th>
                                <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">2
                                    (Unlikely)
                                </th>
                                <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">3
                                    (Possible)
                                </th>
                                <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">4
                                    (Likely)</th>
                                <th class="px-2 py-1 text-center font-medium text-gray-600 border-b border-gray-200">5
                                    (Certain)
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riskAppetites->chunk(5) as $chunk)
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

                <hr class="my-6">
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Documentation and Review:</h3>



                    {!! html_entity_decode($riskMethodology?->documentation) !!}
                </section>
                <section class="mb-2">
                    <h3 class="text-brand-500 h4" style="font-size: 24px; font-weight: 500">Alignment with ISO/IEC 27005 /
                        31000:</h3>
                    {!! html_entity_decode($riskMethodology?->alignment_iso) !!}
                </section>
            </div>
        </div>
    </div>

@endsection
