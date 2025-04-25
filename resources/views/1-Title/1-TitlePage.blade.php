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
            background-image: url('https://vciso.compliance360grc.com/Images/1-BackgroundImage-3.png');
            background-size: 100% 100%;
            width: 90%;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-landing .container {
            width: 100%;
            display: flex;
            align-items: end;
            justify-content: center;
            height: 100%;
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
            width: 25%;
            animation: float 6s ease-in-out infinite;
        }

        a.title-button p {
            margin: 0;
        }

        .mb-1,
        a.title-button p.mb-1 {
            margin-bottom: 1em;
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
    </style>
</head>

<body class="page-landing">
    <div class="container">
        <a href="/login" class="title-button mb-2">
            <p class="title-line2">مرحبا</p>
            <p class="title-line2 mb-1">اضغط هنا للدخول</p>
            <p class="title-line3">Welcome</p>
            <p class="title-line1">Click here to Enter!</p>
        </a>
    </div>

    <!-- Javascript File-->
    <script src="script.js"></script>

    <!-- Ionicon file-->
    {{-- <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> --}}
    {{-- <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> --}}
</body>

</html>
