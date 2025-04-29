<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">
    <!-- Boxicons Icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        ul li {
            line-height: 2em;
        }

        section#heatmap {
            margin-block: 3em;
            width: 97%;
        }

        section#heatmap th,
        section#heatmap td {
            border: 1px solid #fff;
            padding: 8px;
            font-size: 13px;
        }

        section#heatmap th {
            background-color: #fff;
            color: #505050;
            padding: 1em 0;
            text-align: center;
        }

        section#heatmap tr.heads th {
            background: #E6E7E8;
            text-transform: uppercase;
        }

        section#heatmap td p {
            line-height: 2em;
        }

        td.impact {
            font-weight: 500;
            background-color: white;
            padding: 1.5em 0;
        }

        .very-low {
            background-color: #00b050;
        }

        .low {
            background-color: #a8d08d;
        }

        .medium {
            background-color: #ffff00;
        }

        .high {
            background-color: #ffc000;
        }

        .critical {
            background-color: #ff0000;
            color: white;
        }

        div#riskAppetiteContent {
            background-color: #fff;
        }

        button.btn {
            background-color: black;
            padding: .5em;
            width: 120px;
            margin: .5em;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .text-end {
            text-align: right;
        }

        .bg-accent {
            background-color: #224070;
        }

        .text-accent {
            color: #224070;
        }

        .text-justify {
            text-align: justify;
        }
    </style>
</head>

<body>
    <div class="dheadersec">
        <div class="dheaderleft">
            <div class="dheadericon">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
            </div>
            <div class="dheadertext">
                <p>العمليات</p>
                <p>Processes</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            @include('partials.roles')
            <div class="dheaderright">
                <button type="dbutton" class="dbutton" onclick="goBack()">
                    <p>للخلف</p>
                    <p>Back</p>
                </button>
            </div>
        </div>
    </div>
    <div class="report">
        <header class="text-center my-5">
            @if ($organization->organization_logo == null)
                <p class="sh-tx">No Logo</p>
            @else
                <img src="{{ asset('storage/' . $organization->organization_logo) }}" alt="Organization Logo"
                    class="mb-4">
            @endif
            <p class="lead text-dark fs-5 fw-bold mb-0">{{ $organization->organization_name_arabic }}</p>
            <p class="lead text-dark fs-5 fw-bold mb-0">{{ $organization->organization_name_english }}</p>
            <p class="lead text-dark fs-5 fw-bold mb-0">Risk Methodology Report </p>
            <p class="lead text-dark fs-5 fw-bold">{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
        </header>

        <main>
            <div class="container fs-5">
                <!-- Introduction Section -->
                <section class="mb-2">
                    <p><b>Risk Methodology ID</b>: {{ $riskMethodology->risk_methodology_id }}</p>
                </section>
                <hr>
                <section class="mb-2">
                    <h3 class="text-accent h4">Background:</h3>
                    <p class="text-justify">{{ $riskMethodology->background }}</p>
                </section>
                <section class="mb-2">
                    <h3 class="text-accent h4">Source:</h3>
                    <p class="text-justify">{{ $riskMethodology->risk_methodology_source }}</p>
                </section>
                <section class="mb-2">
                    <h3 class="text-accent h4">Objectives:</h3>

                    <ul>
                        @forelse ($riskMethodology->objectives as $objective)
                            <li>{{ $objective->objective }}</li>
                        @empty
                    </ul>
                    @endforelse
                </section>
                <section class="mb-2">
                    <h3 class="text-accent h4">Scope:</h3>
                    <p class="text-justify">{{ $riskMethodology->scope }}</p>
                </section>
                <hr>
                <section class="mb-2">
                    <h3 class="text-accent h4">Risk Assessment Process Overview:</h3>

                    <p>The risk assessment process consists of the following steps:</p>
                    <small class="fw-bold">Context Establishment</small>
                    <p>{!! html_entity_decode($riskMethodology?->context) !!}</p>
                    <small class="fw-bold">Risk Identification</small>
                    <p>{!! html_entity_decode($riskMethodology?->risk_identification) !!}</p>
                    <small class="fw-bold">Risk Analysis</small>
                    <p>{!! html_entity_decode($riskMethodology?->risk_analysis) !!}</p>
                    <small class="fw-bold">Risk Evaluation</small>
                    <p>{!! html_entity_decode($riskMethodology?->risk_evaluation) !!}</p>
                </section>
                <hr>
                <section id="heatmap" class="mb-2">
                    <h3 class="text-accent h4">Risk Heatmap and Risk Rating Matrix:</h3>

                    <table class="w-100">
                        <tr class="heads">
                            <th rowspan="2">Impact</th>
                            <th colspan="5">Likelihood (Probability)</th>
                        </tr>
                        <tr>
                            <th>1 (Rare)</th>
                            <th>2 (Unlikely)</th>
                            <th>3 (Possible)</th>
                            <th>4 (Likely)</th>
                            <th>5 (Certain)</th>
                        </tr>
                        @foreach ($riskAppetites->chunk(5) as $chunk)
                            <tr>
                                <td class="impact">{{ $loop->index + 1 }} ({{ $impacts[$loop->index] }})</td>
                                @foreach ($chunk as $data)
                                    <td class="{{ $data->risk_appetite_color }}">
                                        <p><b>Risk ID:</b> {{ $data->risk_appetite_id }}</p>
                                        <p><b>Risk Name:</b> {{ $data->risk_appetite_name }}</p>
                                        <p><b>Risk Score:</b> {{ $data->risk_score }}</p>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                    </table>
                </section>
                <hr>
                <section class="mb-2">
                    <h3 class="text-accent h4">Documentation and Review:</h3>

                    {!! html_entity_decode($riskMethodology?->documentation) !!}
                </section>
                <section class="mb-2">
                    <h3 class="text-accent h4">Alignment with ISO/IEC 27005:</h3>

                    {!! html_entity_decode($riskMethodology?->alignment_iso) !!}
                </section>
            </div>
        </main>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
