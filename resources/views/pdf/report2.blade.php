{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Report</title>

    <style>
        @font-face {
            font-family: 'DejaVu Sans';
            font-style: normal;
            font-weight: normal;
            src: url('{{ asset('fonts/DejaVuSans.ttf') }}') format('truetype');
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            direction: rtl;
            /* Ensure right-to-left text rendering */
        }

        h1 {
            font-family: 'DejaVu Sans', sans-serif;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h1>Welcome 2</h1>
    <h1>مرحباً</h1>
</body>

</html> --}}

@extends('pdf.partials.layout')
@section('title', 'NCA ECC 2018 Assessment and Compliance')


@section('header')
    <h1 class="arabic-text">الهيئة الوطنية للأمن السيبراني - الضوابط الأساسية للأمن السيبراني</h1>
    <p style="margin-top: 20px">Control Assessment Regulator Reports</p>
    <p>National Cybersecurity Authority - Essential Cybersecurity Controls (NCA-ECC)</p>
@endsection

@section('content')

    <table class="table mb-0">
        <tbody>
            <x-main-domain domain="١- حوكمة الأمن السيبراني (Cybersecurity Governance)" />
            <x-sub-domain subdomain="إستراتيجية الأمن السيبراني (Cybersecurity Strategy)" id="١-١" />
            <x-sub-domain-info
                info_ar="ضمان إسهام خطط العمل للأمن السيبراني والأهداف والمبادرات والمشاريع داخل الجهة في تحقيق المتطلبات
                            التشريعية والتنظيمية ذات العلاقة."
                info="Ensuring the contribution of cybersecurity work plans, objectives, initiatives and projects
                            within the entity to achieving the relevant legislative and regulatory requirements." />

            
        </tbody>
    </table>
@endsection
