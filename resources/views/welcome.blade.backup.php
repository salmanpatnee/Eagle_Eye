<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tag  -->
    <title>Compliance 360</title>
    <meta name="title" content="Saturn-V GRC Tool">
    <meta name="description" content="Zain Cloud GRC Tool">

    <link rel="stylesheet" href="css/1-Title/1-TitleIndex.css">
    <style>
        .page-landing {
            background-image: url('https://virtualciso.compliance360grc.com/Images/1-BackgroundImage-3.png');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0a0028;
            /* fallback solid color */
        }



        .page-landing .container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: end;
            height: 100%;
            flex-direction: column;
            gap: 50px;
        }

        .title-button {
            position: initial;
            display: inline-block;
            border-radius: 20px;
            /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#1e5799+0,0a0028+100 */
            background: linear-gradient(to bottom, #1e5799 0%, #0a0028 100%);
            /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */

            border: 2px solid white;
            color: #ffffff;
            text-align: center;
            font-size: 28px;
            padding: 10px 25px;
            transition: all 0.5s;
            cursor: pointer;
            min-width: 25%;
            width: auto;
            animation: float 6s ease-in-out infinite;
        }




        a.title-button p {
            margin: 0;
        }

        .mb-1,
        a.title-button p.mb-1 {
            margin-bottom: 1em;
        }

        .title-logo {
            display: none;
            max-width: 200px;
            margin-top: 3em;
        }

        .mb-2 {
            margin-bottom: 2em;
        }

        @keyframes float {
            0% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }

            50% {
                box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
                transform: translatey(-20px);
            }

            100% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }
        }

        /* Hide background image and use solid color on tablet and mobile */
        @media (max-width: 1024px) {
            .page-landing {
                background-image: url("{{ asset('Images/riyadh.jpg') }}");
                background-color: #0a0028 !important;
                background-size: cover;
                position: relative;
            }

            .page-landing::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(10, 0, 40, 0.6);
                /* semi-transparent dark overlay */
                z-index: 0;
            }

            .container {
                position: relative;
                z-index: 1;
            }

            .page-landing .container {
                justify-content: center;
            }

            .title-button {
                min-width: 50%;
            }

            .title-logo {
                display: block;
            }
        }
    </style>
</head>

<body class="page-landing">
    <div class="container">
        <div class="title-logo">
            <img src="/Images/Eagle_Eye_Logo.png" alt="CISO 360 Logo"
                style="max-width: 250px; width: 100%; height: auto;">
        </div>
        <a href="/login" class="title-button mb-2">
            {{-- <p class="title-line2"></p> --}}
            <p class="title-line2 mb-1"> مرحبا اضغط هنا للدخول</p>
            {{-- <p class="title-line3"></p> --}}
            <p class="title-line1">Welcome Click here to Enter!</p>
        </a>
    </div>

    <!-- Javascript File-->
    <script src="script.js"></script>

    <!-- Ionicon file-->
    {{-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> --}}
    {{-- <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> --}}
</body>

</html>
