<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Control vs Evidence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/report.css') }}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,300;1,400;1,500&display=swap");

        @import url("https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&display=swap");

        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            /* font-family: 'DejaVu Sans', sans-serif; */

            background: #fff;
            font-family: "Roboto", sans-serif;
            font-size: 12px;
            margin: 0;
        }

        td a {
            color: #000 !importants;
            margin-bottom: .5em;
            display: inline-block;
            text-decoration: none;
        }

        th {
            white-space: nowrap;
        }

        .tablehead tr th,
        .tablebody tr td {
            padding-inline: 10px;
            padding-block: 20px;
        }

        .report-header {
            text-align: center;
        }

        .arabic-text {
            font-family: "Noto Sans Arabic", sans-serif;
        }

        .report-header h2 {
            color: #000;
            font-size: 22px;
            font-weight: 700;
            line-height: 25px;
        }
    </style>
</head>

<body>
    <main>
        <header class="report-header" style="margin-bottom: 30px;">
            @if ($organizationData)
                @if ($organizationData->organization_logo != null)
                    <img src="{{ asset('storage/' . $organizationData?->organization_logo) }}" alt="Organization Logo"
                        width="200" class="mb-4">
                @endif
                <h2 style="font-weight: bold; font-size: 18px;" class="arabic-text mt-0">
                    {{ $organizationData->organization_name_arabic }}</h2>
                <h2 style="font-weight: bold; font-size: 18px; font-family: 'Roboto'" class="mt-0">
                    {{ $organizationData->organization_name_english }}</h2>
                <h2 style="font-weight: bold; font-size: 18px; font-family: 'Roboto'" class="mt-0">Audit vs Control
                </h2>
                <h2 style="font-weight: bold; font-size: 18px; font-family: 'Roboto' margin-bottom:30px;"
                    class="mt-0">
                    {{ \Carbon\Carbon::now()->format('F j, Y') }}</h2>
            @endif
        </header>
        <div class="tablearea">
            <table class="table" style="border: 1px solid #000; border-collapse: collapse; width: 100%;">
                <thead class="tablehead">
                    <tr>
                        <th
                            style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                            {{-- <p>رقم</p> --}}
                            <p>S.No</p>
                        </th>
                        <th style="column-width: 200px;">
                            {{-- <p>رمز الضوابط</p> --}}
                            <p>Audit ID</p>
                        </th>
                        <th
                            style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                            {{-- <p>اسم الضوابط</p> --}}
                            <p>Audit Name</p>
                        </th>
                        <th
                            style="background-color: #203864; color: #fff; font-weight: bold; text-align: left; padding: 10px; border: 1px solid #ddd;">
                            {{-- <p>الأدلة</p> --}}
                            <p>Controls</p>
                        </th>
                    </tr>
                </thead>
                <tbody class="tablebody">
                    @forelse ($auditFindingsWithControls as $row)
                        <tr style="border: 1px solid #000;">

                            <td style="border: 1px solid #000; padding: 12px; font-size: 12px; text-align: left;">
                                {{ $loop->index + 1 }}</td>
                            <td style="border: 1px solid #000; padding: 12px; font-size: 12px; text-align: left;">
                                <a href="{{ route('audit-findings.show', $row->audit_finding_id) }}"
                                    style="text-decoration: none;">
                                    {{ $row->audit_finding_id }}
                                </a>
                            </td>
                            <td style="border: 1px solid #000; padding: 12px; font-size: 12px; text-align: left;">
                                {{ $row->audit_finding_name }}
                            </td>
                            <td style="border: 1px solid #000; padding: 12px; font-size: 12px; text-align: left;">
                                @foreach ($row->Controls as $control)
                                    <p><a href="{{ route('controlmaster.show', $control->control_id) }}"
                                            style="text-decoration: none;">{{ $control->control_id }}
                                            - {{ $control->control_name }}</a> </p>
                                @endforeach
                            </td>


                        </tr>

                    @empty
                        <div class="alert alert-error">
                            <p>No results were found.</p>
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
