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
                </div>
            </div>
        </header>
        <ul class="side-menu top">
            <li>
                <a href="/expert-input">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Add Resource</span>
                </a>
            </li>
            <li class="active">
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
    <div class="IndiTable">
        <form method="POST" action="{{ route('delete.expertOrg') }}">
            @csrf
            @method('DELETE')
            <div class="TableHeading">
                <h1>Organization Registration</h1>
                <div class="ButtonContainer">
                    <a href="" class="DisabledButton">View</a>
                    <a href="/expert-organization-input" class="MoreButton">Add</a>
                    <a href="" class="DisabledButton">Update</a>
                    <button type="submit" class="DeleteButton">Delete</button>
                </div>
            </div>
            <div class="ListTable">
                <table cellspacing="0">
                    <tr>
                        <th style="padding-right: 0px;"></th>
                        <th style="padding-right: 0px;">Organization ID</th>
                        <th style="padding-right: 100px;">Organization Name</th>
                        <th style="padding-right: 0px;">Website URL</th>
                    </tr>
                    @foreach ($columns as $data)
                        <tr>
                            <td><input type="checkbox" name="selecteddelete[]"
                                    value="{{ $data->expert_organization_id }}">
                            </td>
                            <td><a
                                    href="/expert-organization-table/{{ $data->expert_organization_id }}">{{ $data->expert_organization_id }}</a>
                            </td>
                            <td>{{ $data->expert_organization_name }}</td>
                            <td>{{ $data->expert_organization_website_url }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </form>
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
</body>
</html>
