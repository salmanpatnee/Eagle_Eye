<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        * {
            padding: 0em;
            line-height: 0em;
        }

        body {
            /* min-height: 100vh; */
            margin: 0;
            background-image: url('Images/10-HomeBG.png');
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100vh;
        }

        .boxarea {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1100px;
            margin: 0 auto;
        }

        .boxarea>a {
            width: 33%;
        }

        a {
            text-decoration: none;
        }

        .box {
            background-color: rgb(15, 98, 254);
            color: white;
            /* width: 350px; */
            /* height: 170px; */
            border-radius: 20px;
            text-align: center;
            margin-inline: 20px;
            padding-block: 20px;
            padding-inline: 10px;
            transition: 0.3s;
        }

        .LockArea {
            text-align: right;
            margin-bottom: -27px;
        }

        .box:hover {
            transform: scale(1.1);
        }

        .head {
            font-size: 30px;
            font-weight: 800;
        }

        .descrp {
            font-size: 20px;
            font-weight: 700
        }

        .CisoIcon {
            width: 105px;
            height: auto;
        }

        .ComplianceIcon {
            width: 108px;
            height: auto;
        }

        .PitStop {
            width: 187px;
            height: auto;
        }

        .LockIcon {
            width: 30px;
            height: auto;
        }

        .LogoArea {
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
            width: 100%;
        }

        .Logo {
            width: 140px;
            height: 140px;
        }

        .Heading {
            background-color: rgb(15, 98, 254);
            /* width: 700px; */
            /* height: 50px; */
            border-radius: 20px;
            color: white;
            text-align: center;
            align-items: center;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            padding: 1em 1.5em;
        }

        .HeadingArea {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="LogoArea">
        <img class="Logo" src="Images/Eagle Eye Logo.png">
    </div>
    <div class="HeadingArea">
        <div class="Heading">
            <h1>Eagle Eye: The Complete Solution for CISO</h1>
        </div>
    </div>
    <div class="boxarea">
        <a href="/cs-induction">
            <div class="box">
                <img class="PitStop" src="Images/pitstop.jpg" alt="CISO 360">
                <p class="head">PitStop 360</p>
                <p class="descrp">CS Induction Program!</p>
            </div>
        </a>
        <a href="/vciso">
            <div class="box">
                <img class="CisoIcon" src="Images/ConfidentCISO.png" alt="CISO 360">
                <p class="head">CISO 360</p>
                <p class="descrp">CISO Decision Support System</p>
            </div>
        </a>
        <a href="/compliance">
            <div class="box">
                <div class="LockArea">
                    <img class="LockIcon" src="Images/13-LockIcon.png" alt="Compliance 360">
                </div>
                <img class="ComplianceIcon" src="Images/ComplianceICon.jpeg" alt="Compliance 360">
                <p class="head">Compliance 360</p>
                <p class="descrp">100% Out-of-the-Box Compliance!</p>

            </div>
        </a>
    </div>
</body>

</html>
