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
            <li class="active">
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
            <li>
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
            <h1>Threat Agents List</h1>
            <div class="ButtonContainer">
                <a href="/threat-agent-input" class="MoreButton">Add Information</a>
                <a href="/asset-type-input" class="DeleteButton">Delete Information</a>
            </div>
        </div>
        {{-- <div class="ListTable">
			<table cellspacing="0">
				<tr>
					<th style="padding-right: 0px;"></th>
					<th style="padding-right: 0px;">Asset Type ID</th> <!-- Corrected typo here -->
					<th style="padding-right: 100px;">Asset Type Name</th>
				</tr>
				@foreach ($AssetType as $AssetType)
				<tr>
					<td><input type="checkbox"></td>
					<td><a href="/asset-type-table/{{ $AssetType->asset_type_id   }}">{{ $AssetType->asset_type_id }}</a></td>
					<td>{{ $AssetType->asset_type_name }}</td> <!-- Corrected typo here -->
				</tr>
				@endforeach
			</table>
		</div> --}}
    </div>


    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
</body
