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
    {{-- <link rel="stylesheet" href="{{ asset('/css/6-Header/1-MainPageHeader.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <style>
        .process-filter {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-block: 3rem;
        }

        .process-filter select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            width: 500px;
            /* Adjust the width as needed */
            transition: all 0.3s ease;
        }

        /* Hover and focus styles */
        select:hover {
            border-color: #007BFF;
        }

        select:focus {
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
    </style>
</head>

<body class="processpage">
    <header>
        <div class="header-content" id="header">
            <div>
                <a href="/home">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
            </div>
            <div>
                <a href="/vciso">
                    <button class="RightButton">
                        <p class="RightButtonArbTxt">ارجع</p>
                        <p class="RightButtonTxt">Back</p>
                    </button>
                </a>
                <!--<a href="" onclick="document.querySelector('#logout-form').submit(); return false;">-->
                <!--    <button class="RightButton">-->
                <!--        <p class="RightButtonArbTxt">تسجيل الخروج</p>-->
                <!--        <p class="RightButtonTxt">Logout</p>-->
                <!--    </button>-->
                <!--</a>-->
                <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                    @csrf
                    <button type="submit"> Log Out</button>
                </form>
            </div>
        </div>
    </header>


    <div class="process-filter">
        <select name="process" id="process" onchange="window.location.href=this.value;">
            <option value="">Select an Option to Filter</option>
            @foreach ($allProcess as $item)
                <option value="{{ route('process.view.show', $item->process_id) }}">{{ $item->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <div class="sectionhead">
            <p>GRC Domain Resources (Capacity Building Framework)</p>
            <p>موارد الحوكمة والمخاطر والامتثال (إطار بناء القدرات)</p>
        </div>
    </div>

    <div class="processes">

        @php $i = 0; @endphp
        @foreach ($allProcess as $item)
            <a href="{{ route('process.view.show', $item->process_id) }}" class="boxhyperlink">
                <div class="{{ $i % 2 == 0 ? 'domainbox' : 'domainboxlight' }}">
                    <i class='bx bx-box'></i>
                    <p class="domainarbtext">{{ $item->title_ar }}</p>
                    <div class="domainseperatorline"></div>
                    <p class="domainengtext">{{ $item->title }}</p>
                </div>
            </a>
            @php $i++; @endphp
            @if ($i % 3 == 0)
    </div>
    <div class="processes">
        @endif
        @endforeach
    </div>

</body>

</html>
