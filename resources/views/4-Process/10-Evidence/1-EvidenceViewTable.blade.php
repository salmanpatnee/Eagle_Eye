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
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <style>
        h1 {
            font-size: 1.7em;
            margin: 0 0 0 10px;
        }

        .btn {
            color: #fff;
        }

        .btn-dark,
        .btn-dark:hover,
        .btn-dark:active {
            color: #fff;
            background-color: #000;
            border-color: #000;
        }

        .modal-header {

            background: linear-gradient(to right, #203864, #2e74b6);
        }

        .modal-title {

            color: #fff;
        }

        div#selectedCategoriesText {
            margin-top: 1em;
            color: cornflowerblue;
        }

        /* Apply basic styles to the table */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        /* Style for table header */
        th {
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Style for table rows */
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        /* Add hover effect to table rows */
        tr:hover {
            background-color: #f5f5f5;
        }

        .remove-btn {
            color: red;
        }

        .upload-file-wrap {
            border: 1px solid #ccc;
            margin: 1em;
            border-radius: 10px;
            padding: 1em;
            background-color: #fafafa;
            width: 100%;
        }

        .upload-file-wrap label {
            /* text-align: center; */
            display: block;
            margin-bottom: 1em;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <header>
            <div class="Header">
                <a href="/compliance" class="text-white">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">إدارة الأدلة</p>
                    <p class="EngTxt">Evidence Management</p>
                </div>
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
        <ul class="side-menu top">
            <li class="active">
                <a href="/evidence-view">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تقرير الأدلة</h3>
                        <span class="text">Evidence Report</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/evidence-input">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تسجيل الأدلة</h3>
                        <span class="text">Record an Evidence</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="/evidence-list">
                    <i class='bx bxs-dashboard'></i>
                    <div class="MenuTxt">
                        <h3>تحرير الأدلة</h3>
                        <span class="text">Edit an Evidence</span>
                    </div>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->


    <!-- CONTENT -->
    <form action="{{ route('evidence.update.attachment') }}" method="post">
        @method('PATCH')
        @csrf
        <input type="hidden" name="AttachId" value="{{ $evidence[0]->artifact_id }}">
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">قائمة القطع الأثرية</p>
                    <p class="PageHeadEngTxt">Artifacts Lists</p>
                </div>
                <div class="ButtonContainer">
                    <a href="/evidence-view" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="/evidence-input" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="#" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="button" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>

            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence ID</p>
                            <p class="FieldHeadArbTxt">رمز الأدلة</p>
                        </div>
                        <p><input type="text" name="EviId" id="EviId" class="sh-tx" placeholder="Enter ID"
                                value="{{ $evidence[0]->evidence_id }}" readonly>
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Name</p>
                            <p class="FieldHeadArbTxt">اسم الأدلة</p>
                        </div>
                        <p><input type="text" name="EviName" id="EviName" class="sh-tx" placeholder="Write Name"
                                value="{{ $evidence[0]->evidence_name }}" readonly>
                        </p>
                    </div>
                </div>
                <div class="ContentTable">
                    <table>
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Artifact ID</th>
                                <th>Artifact Name</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evidence as $index => $attachment)
                                <tr id="{{ $attachment->attachment_file_id }}">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $attachment->artifact_id }}</td>
                                    <td>
                                        <a href="{{ asset('storage/files/' . $attachment->path) }} " download=""
                                            style="color: blue">
                                            {{ $attachment->name }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>


    <div class="modal fade" id="attachmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Select Artifacts</h4>
                </div>
                <div class="modal-body"
                    style="
                max-height: 250px;
                overflow-y: auto;
            ">
                    @foreach ($attachments as $attachment)
                        <div class="checkbox" data-control_id="{{ $attachment->artifact_id }}">
                            <label>
                                <input type="checkbox" class="attachnames"
                                    name="attachnames{{ $attachment->artifact_id }}"
                                    id="attachnames-{{ $attachment->artifact_id }}"
                                    value="{{ $attachment->artifact_id }}">
                                {{ $attachment->artifact_id }} - {{ $attachment->artifact_name }}
                            </label>
                            <a href="{{ route('attachment.show', $attachment->id) }}" style="color: blue"
                                target="_blank">View
                                Attachments</a>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Select Artifacts</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        $(document).ready(function() {
            $('.remove-btn').click(function(event) {
                event.preventDefault();

                if (!confirm("Are you sure you want to remove?")) {
                    return false;
                }

                var attachmentFileId = $(this).data('id');

                $.ajax({
                    url: '/evidence-list/delete-attachment/' + attachmentFileId,
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        selectedValue: attachmentFileId
                    },
                    success: function(response) {
                        console.log("Success");
                        $("tr#" + attachmentFileId).fadeOut();
                    },
                    error: function(xhr, status, error) {
                        console.error(error); // Handle any errors
                    }
                });
            });
        });

        const inputElement = document.querySelector('input[type="file"]');
        FilePond.create(inputElement).setOptions({
            server: {
                process: '/uploads',
                revert: '/tmp/delete',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            },
        });

        function updateSelectedArtifacts() {
            var selectedOptionsText = [];

            $('.attachnames:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#selectedattachment').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#selectedattachmenttext').text(selectedOptionsText.length + " Attachment Selected.");
            } else {
                $('#selectedattachmenttext').text("No Attachments Selected.");
            }
        }

        $('.attachnames').change(function() {
            updateSelectedArtifacts();
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>




</body
