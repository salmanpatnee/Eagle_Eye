<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Three Ps</title>
    <style>
        * {
            margin: 0em;
            padding: 0em;
        }

        /* body {
            background-image: url("/Images/2-ThreePsBackground.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        } */

        body {
            min-height: 100vh;
            margin: 0;
            background-image: url('Images/2-ThreePsBackground.png');
            background-repeat: no-repeat;
            background-size: cover;
        }


        .MainArea {
            margin-top: 0px;
            margin-bottom: 10px;
        }

        i {
            color: black;
            font-size: 30px;
            text-align: center;
            padding-bottom: 10px;
        }

        a {
            text-decoration: none;
        }

        h1 {
            font-size: 2.5em;
        }

        .BoxOne {
            background-color: #b6e3fa;
            width: 250px;
            height: 150px;
            color: black;
            font-size: 20px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .RowOne,
        .RowTwo,
        .RowThree {
            display: flex;
            justify-content: center;
        }

        .BoxOne img {
            width: 60px;
            height: auto;
        }

        .RowTwo {
            margin-block: 18px;
            margin-inline: 200px;
        }

        .RowThree {
            padding-inline: 250px;
        }

        .BoxTwo {
            background-color: #b6e3fa;
            width: 300px;
            height: 120px;
            color: black;
            font-size: 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: 0.3s;
        }

        .BoxTwo:hover {
            transform: scale(1.1);
        }

        .BoxTwo img {
            width: 100px;
            height: auto;
            margin-top: -20px;
        }

        .BoxTwo .FireFlame {
            width: 50px;
            height: auto;
        }

        .TextEducation {
            margin-top: -30px;
        }

        .BoxFour,
        .BoxFive,
        .BoxSix {
            width: 300px;
            height: 150px;
            margin: 0px 15px 0px 15px;
            color: black;
            font-size: 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: 0.3s;
        }

        .BoxFour {
            background-color: #b6e3fa;
        }

        .BoxFive {
            background-color: #b6e3fa;
        }

        .BoxSix {
            background-color: #b6e3fa;
        }

        .BoxFour:hover,
        .BoxFive:hover,
        .BoxSix:hover {
            transform: scale(1.1);
        }

        .plus-shape {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-inline: 300px;
        }

        .horizontal-line,
        .horizontal-line-two,
        .vertical-line {
            position: absolute;
            background-color: rgb(255, 255, 255);
        }

        .horizontal-line {
            width: 600px;
            height: 2px;
            top: 50%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .horizontal-line-two {
            width: 520px;
            height: 2px;
            top: 112%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vertical-line {
            width: 2px;
            height: 186px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: -1;
        }

        .row-three-line {
            display: flex;
            text-align: center;
            justify-content: center;
            /* padding-inline: 250px; */
        }

        .short-horizontal-line {
            justify-content: center;
            width: 2px;
            height: 20px;
            background-color: rgb(255, 255, 255);
            overflow: visible;
        }

        .HomeIcon i {
            color: white;
            font-size: 40px;
            margin-left: 20px;
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="MainArea">
        <div class="HomeIcon">
            <a href="/home">
                <i class='bx bx-home'></i>
            </a>
        </div>
        <div class="RowOne">
            <div class="BoxOne">
                <div>
                    <img src="Images/14-Lifebuoy.png" alt="Lifebuoy">
                    <h2>CISO<h2>
                            <h2>Survival Lifeline</h2>
                </div>
            </div>
        </div>
        <div class="RowTwo">
            <a href="/ciso-education">
                <div class="BoxTwo">
                    <div>
                        <img src="Images/15-GraduationCap.png" alt="Graduation">
                        <h2 class="TextEducation">CISO Education</h2>
                    </div>
                </div>
            </a>
            <div class="plus-shape">
                <div class="horizontal-line"></div>
                <div class="vertical-line"></div>
                <div class="horizontal-line-two"></div>
            </div>
            <a href="/hot-topics">
                <div class="BoxTwo">
                    <div>
                        <img class="FireFlame" src="Images/16-FireFlame.png" alt="Graduation">
                        <h2>Hot Topics for CISO</h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="row-three-line">
            <div class="short-horizontal-line"></div>
            <div style="margin-inline: 257px" class="short-horizontal-line"></div>
            <div class="short-horizontal-line"></div>
        </div>
        <div class="RowThree">
            <a href="/hr-experts">
                <div class="BoxFour">
                    <div>
                        <i class='bx bxs-user' style='color:#1106f7'></i>
                        <h1>People</h1>
                        <h3>(Human Resource)</h3>
                    </div>
                </div>
            </a>
            <a href="/process">
                <div class="BoxFive">
                    <div>
                        <i class='bx bx-cog' style='color:#f79806'></i>
                        <h1>Processes</h1>
                        <h3>(Best Practices)</h3>
                    </div>
                </div>
            </a>
            <a href="/product">
                <div class="BoxSix">
                    <div>
                        <i class='bx bxs-box' style='color:#cb06f7'></i>
                        <h1>Products</h1>
                        <h3>(Technology)</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
