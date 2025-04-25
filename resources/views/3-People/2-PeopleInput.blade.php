<!DOCTYPE html5>
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
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <h1>People</h1>
                <i class='bx bx-right-arrow-alt'></i>
                <h1>Resource Registration</h1>
                <div class="RightButtonContainer">
                    <a href="/people">
                        <button class="RightButton">Back</button>
                    </a>
                    <a href="" onclick="document.querySelector('#logout-form').submit(); return false;">
                        <button class="RightButton">Log Out</button>
                    </a>
                    <form id="logout-form" method="POST" action="{{ route('login.destroy') }}" style="display: none;">
                        @csrf
                        <button type="submit"> Log Out</button>
                    </form>
                </div>
            </div>
        </header>
        <ul class="side-menu top">
            <li class="active">
                <a href="/expert-input">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Add Resource</span>
                </a>
            </li>
            <li>
                <a href="/expert-organization-input">
                    <i class='bx bxs-report'></i>
                    <span class="text">Organizations</span>
                </a>
            </li>
            <li>
                <a href="/expert-industry-input">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Industries</span>
                </a>
            </li>
            <li>
                <a href="/expert-role-input">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Expert Roles</span>
                </a>
            </li>
            <li>
                <a href="/expert-expertise-input">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Expertise</span>
                </a>
            </li>
            <li>
                <a href="/expert-education-input">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Education</span>
                </a>
            </li>
            <li>
                <a href="/expert-certification-input">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Certification</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <form action="/expert-input/post" method="post">
        @csrf
        <div class="IndiTable">
            <div class="TableHeading">
                <h1>Add Resource</h1>
                <div class="ButtonContainer">
                    <a href="/people" class="MoreButton">View</a>
                    <button type="submit" class="MoreButton">Add</button>
                    <a href="/people-input" class="DisabledButton">Update</a>
                    <button type="" class="DisDeleteButton">Delete</button>
                </div>
            </div>
            <table cellspacing="0">
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Expert ID</h4>
                            <p><input type="text" name="ExperID" id="ExperID" class="sh-tx"
                                    placeholder="Enter Expert ID" placeholder="Enter Expert ID"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Expert First Name</h4>
                            <p><input type="text" name="ExpFirstName" id="ExpFirstName" class="sh-tx"
                                    placeholder="Write Expert First Name"></p>
                        </div>
                        <div class="column">
                            <h4>Expert Last Name</h4>
                            <p><input type="text" name="ExpLastName" id="ExpLastName" class="sh-tx"
                                    placeholder="Write Expert Last Name"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Social Profile Link</h4>
                            <p><input type="text" name="ExpSocialLink" id="ExpSocialLink" class="sh-tx"
                                    placeholder="i.e. LinkedIn Profile Link"></p>
                        </div>
                        <div class="column">
                            <h4>Organization Name</h4>
                            <p>
                                <select name="OrgNames" id="OrgNames" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($OrgNames as $OrgName)
                                        <option value="{{ $OrgName->expert_organization_id }}">
                                            {{ $OrgName->expert_organization_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Industry</h4>
                            <p>
                                <select name="IndsNames" id="IndsNames" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($IndsNames as $IndsName)
                                        <option value="{{ $IndsName->industry_id }}">
                                            {{ $IndsName->industry_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <h4>Expert Title</h4>
                            <p><input type="text" name="ExpTitle" id="ExpTitle" class="sh-tx"
                                    placeholder="Enter Expert Title"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Expert Role</h4>
                            <p>
                                <select name="ExpRole" id="ExpRole" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($ExpRoles as $ExpRole)
                                        <option value="{{ $ExpRole->expert_role_id }}">
                                            {{ $ExpRole->expert_role_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <h4>Experience</h4>
                            <p><input type="number" name="Experience" id="Experience" class="sh-tx"
                                    placeholder="Expert Experience"></p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Expertise</h4>
                            <p>
                                <select name="ExpertiesNames" id="ExpertiesNames" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($ExpertiesNames as $ExpertiesName)
                                        <option value="{{ $ExpertiesName->expert_experties_id }}">
                                            {{ $ExpertiesName->expert_experties_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                        <div class="column">
                            <h4>Education</h4>
                            <p>
                                <select name="ExpEdu" id="ExpEdu" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($ExpEduNames as $ExpEduName)
                                        <option value="{{ $ExpEduName->education_id }}">
                                            {{ $ExpEduName->education_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <h4>Certification</h4>
                            <p>
                                <select name="CerNames" id="CerNames" class="sh-tx"
                                    onchange="updateAssetRegGroupmentId()">
                                    <option value="" disabled selected hidden>Select Option</option>
                                    @foreach ($CerNames as $CerName)
                                        <option value="{{ $CerName->certification_name }}">
                                            {{ $CerName->certification_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </form>


</body>
