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

        .text-danger {
            color: red;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 100vh;
                margin: 200px auto;
            }
        }
    </style>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to generate the ID with a sequence
            function generateID() {
                // Get the input element
                var inputElement = document.getElementById('evidence_id');

                // Generate a unique sequential number
                var sequenceNumber = parseInt(localStorage.getItem('sequenceNumber')) || 1;

                // Ensure the number is three digits by padding with zeros
                var formattedNumber = ('00' + sequenceNumber).slice(-3);

                // Combine the number with the prefix
                var generatedID = 'EVD-' + formattedNumber;

                // Update the input field value
                inputElement.value = generatedID;

                // Increment and store the sequence number for the next use
                localStorage.setItem('sequenceNumber', sequenceNumber + 1);
            }

            // Call the generateID function when the page loads
            generateID();
        });
    </script> --}}
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
                @include('partials.roles')
                <div class="RightButtonContainer">
                    <button type="button" class="RightButton" onclick="goBack()">
                        <p>للخلف</p>
                        <p>Back</p>
                    </button>
                </div>
            </div>
        </header>
        @include('4-Process/10-Evidence/sidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <form action="{{ route('evidences.store') }}" method="post">
        @csrf
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تسجيل الأدلة</p>
                    <p class="PageHeadEngTxt">Evidence Recording</p>
                </div>
                <div class="ButtonContainer">
                    <a href="{{ route('evidences.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <button type="submit" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </button>
                    <a href="" class="DisabledButton">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <button type="" class="DisDeleteButton">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <x-input label="Evidence ID" label_ar="رمز الأدلة" name="evidence_id" placeholder="Enter ID"
                            required />
                    </div>
                    <div class="column">
                        <x-input label="Evidence Name" label_ar="اسم الأدلة" name="evidence_name"
                            placeholder="Evidence Name" required />
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <x-input label="Evidence Description" label_ar="وصف الأدلة" name="evidence_description"
                            placeholder="Write Description" class="bg-tx" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Classification Name" label_ar="اسم التصنيف" />
                        <select name="classification_id" id="ClassName" class="sh-tx">
                            <option value="">Select Option</option>
                            @foreach ($classifications as $classification)
                                <option value="{{ $classification->classification_id }}">
                                    {{ $classification->classification_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-error name="classification_id" />
                    </div>
                    <div class="column">
                        <x-label label="Categories" label_ar="اسم الفئة" />
                        <x-modal-button modal_id="categoriesModal" label="Add Category" name="categories"
                            :data="isset($categoryIds) ? json_encode($categoryIds) : ''" />
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Evidence Nature" label_ar="اسم الفئة" />
                        <select name="evidence_nature" id="evidence_nature" class="sh-tx">
                            <option value="Document">Document</option>
                            <option value="Record">Record</option>
                        </select>
                    </div>
                    <div class="column">
                        <x-label label="Evidence Type" label_ar="نوع الأدلة" />
                        <select name="evidence_type" id="evidence_type" class="sh-tx">
                            <option value="Document">Document</option>
                            <option value="Screenshot">Screenshot</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <x-input label="Evidence Source" label_ar="مصدر الأدلة" name="evidence_source"
                            placeholder="Enter Source Name" class="bg-tx" />

                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Owner Name" label_ar="اسم مالك" />
                        <select name="owner_id" id="owner_id" class="sh-tx">
                            <option value="" disabled selected hidden>Select Option</option>
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->owner_role_id }}">
                                    {{ $owner->owner_name }}
                                </option>
                            @endforeach
                        </select>
                        <x-error name="owner_id" />
                    </div>
                    <div class="column">
                        <x-label label="Artifact Name" label_ar="اسم المرفقات" />
                        <x-modal-button modal_id="attachmentsModal" label="Add Artifact" name="attachments"
                            :data="isset($attachmentIds) ? json_encode($attachmentIds) : ''" />
                        {{-- <x-label label="Best Practice Name" label_ar="اسم أفضل الممارسات" />

                        <p>
                            <select name="best_practices_id" id="best_practices_id" class="sh-tx">
                                <option value="" disabled selected hidden>Select Option</option>
                                @foreach ($bestPractices as $bestPractice)
                                    <option value="{{ $bestPractice->best_practices_id }}">
                                        {{ $bestPractice->best_practices_name }}
                                    </option>
                                @endforeach
                            </select>
                        </p>
                        <x-error name="best_practices_id" /> --}}
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <x-label label="Mapping Controls" label_ar="ضوابط رسم الخرائط" />
                        <x-modal-button modal_id="controlsModal" label="Add Control" name="controls"
                            :data="isset($controlIds) ? json_encode($controlIds) : ''" />
                    </div>
                    <div class="column">

                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Critical Assets?"
                            label_ar="الأدلة المرتبطة حصرا بالأصول الحساسة؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="evidence_critical_asset" id="evidence_critical_asset" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Cloud?"
                            label_ar="الأدلة المرتبطة حصريًا بالسحابة؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="evidence_cloud" id="evidence_cloud" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----3---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Telework?"
                            label_ar="الأدلة مرتبطة حصريًا بالعمل عن بعد؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="evidence_telework" id="evidence_telework" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----4---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Social Media?"
                            label_ar="الأدلة المرتبطة حصريًا بوسائل التواصل الاجتماعي؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_social_media" id="Evidence_social_media" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----5---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Data Privacy?"
                            label_ar="الأدلة المرتبطة حصريًا خصوصية البيانات ؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_data_privacy" id="Evidence_data_privacy" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----6---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to PII?"
                            label_ar="؟(PII) الأدلة المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="evidence_pii" id="evidence_pii" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----7---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to PCI/DSS?"
                            label_ar="؟PCI/DSS الأدلة المرتبطة حصريًا" />


                        <div style="margin-bottom: 10px"></div>
                        <select name="evidence_pci_dss" id="evidence_pci_dss" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----8---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to E-Commerce?"
                            label_ar="الأدلة المتعلقة حصرا بالتجارة الإلكترونية؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_e_commerce" id="Evidence_e_commerce" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----9---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Infrastructure?"
                            label_ar="الأدلة المتعلقة حصرا بالبنية التحتية؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_infrastructure" id="Evidence_infrastructure" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----10---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Application?"
                            label_ar="الأدلة المرتبطة حصرا بالتطبيق؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_application" id="Evidence_application" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----11---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to HR?"
                            label_ar="الأدلة المتعلقة حصرا بالموارد البشرية؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="Evidence_hr" id="Evidence_hr" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----12---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Physical Security?"
                            label_ar="الأدلة المتعلقة حصرا بالأمن المادي؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="physical_security" id="physical_security" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Third Party?"
                            label_ar="الأدلة المرتبطة حصرا بطرف خارجي؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="third_party" id="third_party" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Operational Technology?"
                            label_ar="الأدلة المرتبطة حصريًا بالتكنولوجيا التشغيلية؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="operational_technology" id="operational_technology" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to Payments?"
                            label_ar="الأدلة المرتبطة حصرا بالمدفوعات؟" />

                        <div style="margin-bottom: 10px"></div>
                        <select name="payment" id="payment" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <x-label label="Evidence Exclusively Related to E-Banking?"
                            label_ar="الأدلة المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟" />
                        <div style="margin-bottom: 10px"></div>
                        <select name="e_banking" id="e_banking" class="sh-tx">
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                </div>
            </div>
            </table>
        </div>
    </form>
    <x-modal id="categoriesModal" title="Select Category" :data="$categories" :selectedvalues="isset($categoryIds) ? $categoryIds : []"
        checkboxClass="categoryCheckbox" id_key="category_id" value_key="category_name" />

    <x-modal id="controlsModal" title="Select Control" :data="$controls" :selectedvalues="isset($controlIds) ? $controlIds : []"
        checkboxClass="controlCheckbox" id_key="control_id" value_key="control_name" />

    <x-modal id="attachmentsModal" title="Select Attachment" :data="$artifacts" :selectedvalues="isset($attachmentIds) ? $attachmentIds : []"
        checkboxClass="attachmentCheckbox" id_key="artifact_id" value_key="artifact_name" />


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script>
        // $('#contmodal').on('shown.bs.modal', function(e) {
        //     let best_practices_id = $("#BestPracName").val();
        //     let controlOptions = $("div.best_practice_controls");

        //     controlOptions.each(function() {
        //         //$(this).hide();
        //         if ($(this).data("best_practices_id") !== best_practices_id) {
        //             $(this).find("input[type=checkbox].controlnames").prop('checked', false).trigger(
        //                 'change');
        //         }
        //     });

        //     if (best_practices_id != null) {
        //         controlOptions = controlOptions.filter(function() {
        //             return $(this).data("best_practices_id") === best_practices_id;
        //         });
        //     }

        //     controlOptions.each(function() {
        //         $(this).show();
        //     });
        // });

        $('.attachmentCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.attachmentCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });

            $('#attachments').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#attachmentsText').text(selectedOptionsText.length + " Attachment Selected.");
            } else {
                $('#attachmentsText').text("Attachment selected.");
            }
        });

        $('.controlCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.controlCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#controls').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#controlsText').text(selectedOptionsText.length + " Control Selected.");
            } else {
                $('#controlsText').text("Control selected.");
            }
        });

        $('.categoryCheckbox').change(function() {
            var selectedOptionsText = [];
            var selectedOptions = [];

            $('.categoryCheckbox:checked').each(function() {
                selectedOptionsText.push($(this).val());
            });


            $('#categories').val(JSON.stringify(selectedOptionsText));

            if (selectedOptionsText.length) {
                $('#categoriesText').text(selectedOptionsText.length + " Category Selected.");
            } else {
                $('#categoriesText').text("Category selected.");
            }
        });
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>




</body>

</html>
