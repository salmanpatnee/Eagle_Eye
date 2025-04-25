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
    <link rel="stylesheet" href="{{ asset('/css/6-Header/1-header.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/7-Sidebar/1-Sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/4-Process/2-Table/IndividualTable.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/5-Threat/threatheader')
        </div>
        @include('4-Process/backbutton')
    </div>
    <section id="sidebar">
        <ul class="side-menu top">
            <li>
                <a href="/threat-agent-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Record</span>
                </a>
            </li>
            <li>
                <a href="/threat-agent-type-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Type</span>
                </a>
            </li>
            <li>
                <a href="/threat-agent-sub-type-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Sub-Type</span>
                </a>
            </li>
            <li>
                <a href="/threat-agent-rating-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Rating</span>
                </a>
            </li>
            <li>
                <a href="/threat-agent-vector-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Vector</span>
                </a>
            </li>
            <li class="active">
                <a href="/threat-agent-source-input">
                    <i class='bx bxs-label'></i>
                    <span class="text">Threat Agent Source</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <h1>Threat Agent Source</h1>
            <div class="ButtonContainer">
                <a href="/threat-agent-source-list" class="DeleteButton">View Information</a>
            </div>
        </div>
        <table cellspacing="0">
            <form action="/threat-agent-source-input/post" method="post">
                @csrf
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Threat Agent Source ID</h4>
                            <p><input type="text" name="threatAgentSourceId" id="threatAgentSourceId" class="sh-tx"
                                    placeholder="Enter Threat Agent Source ID"></p>
                        </div>
                        <div class="column">
                            <h4>Threat Agent Source Name</h4>
                            <p><input type="text" name="threatAgentSourceName" id="threatAgentSourceName"
                                    class="sh-tx" placeholder="Enter Threat Agent Source Name"></p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <h4>Threat Agent Source Description</h4>
                            <p><input type="text" name="threatAgentSourceDes" id="threatAgentSourceDes"
                                    class="bg-tx" placeholder="Write Threat Agent Source Description"></p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="SubmitButton">Update Information</button>
            </form>
        </table>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
</body
