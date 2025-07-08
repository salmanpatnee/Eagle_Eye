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
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/css/6-Header/headertwo.css') }}">
    <style>
        .upload-file-wrap {
            border: 1px solid #ccc;
            margin: 1em;
            border-radius: 10px;
            padding: 1em;
            background-color: #fafafa;
        }

        .upload-file-wrap label {
            /* text-align: center; */
            display: block;
            margin-bottom: 1em;
        }
    </style>
</head>

<body>


    <!-- SIDEBAR -->
    <div class="headersec">
        <div class="headerleft">
            @include('4-Process/headerleft')
            @include('4-Process/11-Attachment/attachmentheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">

        <section id="sidebar">
            <ul class="side-menu top">
                <li>
                    <a href="{{ route('artifacts.index') }}">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>قائمة المرفقات</h3>
                            <span class="text">Artifact List</span>
                        </div>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('artifacts.create') }}">
                        <i class='bx bxs-label'></i>
                        <div class="MenuTxt">
                            <h3>أضف المرفقات</h3>
                            <span class="text">Update Artifact</span>
                        </div>
                    </a>
                </li>
            </ul>
        </section>
        <!-- SIDEBAR -->



        <!-- CONTENT -->

        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">إدارة المقتنيات</p>
                    <p class="PageHeadEngTxt">Artifact Management</p>
                </div>
                <div class="ButtonContainer" style="margin-right: 30px;">
                    <a href="{{ route('artifacts.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('artifacts.create') }}" class="MoreButton">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <button type="submit" class="MoreButton" form="form">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </button>
                    <form action="{{ route('artifacts.delete', $artifact->id) }}" method="POST" id="delete_form">
                        @method('DELETE')
                        @csrf
                        
                        
                        <button type="button" onclick="showDeleteModal()" class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}" form="delete">
                            <p class="ButtonArbTxt">يمسح</p>
                            <p class="ButtonEngTxt">Delete</p>
                        </button>
                    </form>


                </div>
            </div>
            <form id="form" action="{{ route('artifacts.update', $artifact->id) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <table cellspacing="0">
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Artifact ID</p>
                                    <p class="FieldHeadArbTxt">رمز المرفقات</p>
                                </div>
                                <p><input type="text" name="artifact_id" id="artifact_id" class="sh-tx"
                                        placeholder="Enter Artifact ID" required value="{{ $artifact->artifact_id }}"
                                        readonly></p>
                                <x-error name="artifact_id" />
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Artifact Name</p>
                                    <p class="FieldHeadArbTxt">اسم المرفقات</p>
                                </div>
                                <p><input type="text" name="artifact_name" id="artifact_name" class="bg-tx"
                                        placeholder="Enter Artifact Name"
                                        value="{{ old('artifact_name', $artifact->artifact_name) }}" required></p>
                                <x-error name="artifact_name" />
                            </div>
                        </div>
                        <div class="ContentTablebg">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Artifact Description</p>
                                    <p class="FieldHeadArbTxt">وصف المرفقات</p>
                                </div>
                                <p><input type="text" name="artifact_description" id="artifact_description"
                                        class="bg-tx" placeholder="Enter Artifact Description"
                                        value="{{ old('artifact_description', $artifact->artifact_description) }}">
                                </p>
                            </div>
                        </div>
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Creation Date</p>
                                    <p class="FieldHeadArbTxt">تاريخ إنشاء</p>
                                </div>
                                <p><input type="date" name="artifact_creation_date" id="artifact_creation_date"
                                        class="sh-tx" required
                                        value="{{ old('artifact_creation_date', $artifact->artifact_creation_date) }}">
                                </p>
                                <x-error name="artifact_creation_date" />
                            </div>
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">System Name</p>
                                    <p class="FieldHeadArbTxt">اسم النظام</p>
                                </div>
                                <div style="font-size: 11px; margin-top= -10px;">
                                    <p>(If Applicable)</p>
                                    <p style="text-align:right; margin-top:-13px">(إذا كان قابلا للتطبيق)</p>
                                </div>
                                <p><input type="text" name="artifact_system_name" id="artifact_system_name"
                                        class="sh-tx" placeholder="Enter Attachment System Name"
                                        value="{{ old('artifact_system_name', $artifact->artifact_system_name) }}">
                                </p>
                            </div>
                        </div>
                        <div class="upload-file-wrap">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Add new attachment</p>
                                <p class="FieldHeadArbTxt">إرفاق ملفات</p>
                            </div>
                            {{-- <label for="fileAttachment">File Attachment</label> --}}
                            <input type="file" class="filepond" name="fileAttachment" multiple credits="false"
                                id="fileAttachment">
                        </div>


                    </div>

                    <table cellspacing="0">
                    </table>

                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Classification</p>
                                    <p class="FieldHeadArbTxt">التصنيف</p>
                                </div>
                                <p>
                                    <select name="classification_id" id="classification_id" class="sh-tx">
                                        <option value="" disabled selected hidden>Select Option</option>
                                        @foreach ($classifications as $classification)
                                            <option value="{{ $classification->classification_id }}"
                                                {{ old('classification_id', $artifact->classification_id) == $classification->classification_id ? 'selected' : '' }}>
                                                {{ $classification->classification_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="multiselect">
                                <div class="AttchFieldHead">
                                    <p class="CatFieldHeadEngTxt">Category</p>
                                    <p class="CatFieldHeadArbTxt" style="margin-right: 0">الفئة</p>
                                </div>
                                <div class="selectBox" onclick="showCheckboxes()">
                                    <select name="artifact_category_id" id="artifact_category_id" class="sh-tx">
                                        <option>Select Categories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}"
                                                {{ old('artifact_category_id', $artifact->artifact_category_id) == $category->category_id ? 'selected' : '' }}>
                                                {{ $category->category_id }} -
                                                {{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <div class="overSelect"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ContentTableSection">
                        <div class="ContentTable">
                            {{-- ----1---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Critical Assets?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصرا بالأصول الحساسة؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_critical_asset" id="artifact_critical_asset" class="sh-tx">
                                    <option
                                        {{ old('artifact_critical_asset', $artifact->artifact_critical_asset) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_critical_asset', $artifact->artifact_critical_asset) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----2---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Cloud?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصريًا بالسحابة؟</p>
                                </div>
                                <div style="margin-bottom: 35px"></div>
                                <select name="artifact_cloud" id="artifact_cloud" class="sh-tx">
                                    <option
                                        {{ old('artifact_cloud', $artifact->artifact_cloud) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_cloud', $artifact->artifact_cloud) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----3---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Asset Exclusively Related to Attachment?</p>
                                    <p class="FieldHeadArbTxt">المرفقات مرتبطة حصريًا بالعمل عن بعد؟</p>
                                </div>
                                <div style="margin-bottom: 35px"></div>
                                <select name="artifact_telework" id="artifact_telework" class="sh-tx">
                                    <option
                                        {{ old('artifact_telework', $artifact->artifact_telework) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_telework', $artifact->artifact_telework) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----4---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Social Media?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_social_media" id="artifact_social_media" class="sh-tx">
                                    <option
                                        {{ old('artifact_social_media', $artifact->artifact_social_media) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_social_media', $artifact->artifact_social_media) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----5---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Data Privacy?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصريًا خصوصية البيانات ؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_data_privacy" id="artifact_data_privacy" class="sh-tx">
                                    <option
                                        {{ old('artifact_data_privacy', $artifact->artifact_data_privacy) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_data_privacy', $artifact->artifact_data_privacy) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----6---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to PII?</p>
                                    <p class="FieldHeadArbTxt">؟(PII) المرفقات المرتبطة حصريًا بمعلومات تحديد الهوية
                                        الشخصية
                                    </p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_pii" id="artifact_pii" class="sh-tx">
                                    <option
                                        {{ old('artifact_pii', $artifact->artifact_pii) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_pii', $artifact->artifact_pii) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----7---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to PCI/DSS?</p>
                                    <p class="FieldHeadArbTxt">؟PCI/DSS المرفقات المرتبطة حصريًا</p>
                                </div>
                                <div style="margin-bottom: 34px"></div>
                                <select name="artifact_pci_dss" id="artifact_pci_dss" class="sh-tx">
                                    <option
                                        {{ old('artifact_pci_dss', $artifact->artifact_pci_dss) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_pci_dss', $artifact->artifact_pci_dss) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----8---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to E-Commerce?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_e_commerce" id="artifact_e_commerce" class="sh-tx">
                                    <option
                                        {{ old('artifact_e_commerce', $artifact->artifact_e_commerce) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_e_commerce', $artifact->artifact_e_commerce) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----9---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Infrastructure?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المتعلقة حصرا بالبنية التحتية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_infrastructure" id="artifact_infrastructure" class="sh-tx">
                                    <option
                                        {{ old('artifact_infrastructure', $artifact->artifact_infrastructure) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_infrastructure', $artifact->artifact_infrastructure) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----10---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Application?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصرا بالتطبيق؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_application" id="artifact_application" class="sh-tx">
                                    <option
                                        {{ old('artifact_application', $artifact->artifact_application) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_application', $artifact->artifact_application) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----11---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to HR?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المتعلقة حصرا بالموارد البشرية؟</p>
                                </div>
                                <div style="margin-bottom: 34px"></div>
                                <select name="artifact_hr" id="artifact_hr" class="sh-tx">
                                    <option {{ old('artifact_hr', $artifact->artifact_hr) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option {{ old('artifact_hr', $artifact->artifact_hr) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----12---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Physical Security?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المتعلقة حصرا بالأمن المادي؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_physical_asset" id="artifact_physical_asset" class="sh-tx">
                                    <option
                                        {{ old('artifact_physical_asset', $artifact->artifact_physical_asset) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_physical_asset', $artifact->artifact_physical_asset) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----13---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Third Party?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصرا بطرف خارجي؟</p>
                                </div>
                                <div style="margin-bottom: 34px"></div>
                                <select name="artifact_third_party" id="RiskThirdParty" class="sh-tx">
                                    <option
                                        {{ old('artifact_third_party', $artifact->artifact_third_party) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_third_party', $artifact->artifact_third_party) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----14---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Operational
                                        Technology?
                                    </p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_opertaional_tech" id="artifact_opertaional_tech"
                                    class="sh-tx">
                                    <option
                                        {{ old('artifact_opertaional_tech', $artifact->artifact_opertaional_tech) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_opertaional_tech', $artifact->artifact_opertaional_tech) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="ContentTable">
                            {{-- ----13---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to Payments?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصرا بالمدفوعات؟</p>
                                </div>
                                <div style="margin-bottom: 34px"></div>
                                <select name="artifact_payment" id="artifact_payment" class="sh-tx">
                                    <option
                                        {{ old('artifact_payment', $artifact->artifact_payment) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_payment', $artifact->artifact_payment) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                            {{-- ----14---- --}}
                            <div class="column">
                                <div class="FieldHead">
                                    <p class="FieldHeadEngTxt">Attachment Exclusively Related to E-Banking?</p>
                                    <p class="FieldHeadArbTxt">المرفقات المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟
                                    </p>
                                </div>
                                <div style="margin-bottom: 10px"></div>
                                <select name="artifact_e_banking" id="artifact_e_banking" class="sh-tx">
                                    <option
                                        {{ old('artifact_e_banking', $artifact->artifact_e_banking) == 'No' ? 'selected' : '' }}
                                        value="No" selected>No</option>
                                    <option
                                        {{ old('artifact_e_banking', $artifact->artifact_e_banking) == 'Yes' ? 'selected' : '' }}
                                        value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
        </div>
        </table>
        </form>
    </div>
    @include('components.delete-confirmation-modal')
    
    {{-- <script src="/Css/4-Process/1-Form/1-Form.js"></script> --}}
    {{-- <script src="/Css/7-Sidebar/2-Sidebar.js"></script> --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
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
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
        function showDeleteModal() {
    window.deleteConfirmationModal.show(document.getElementById('delete_form'));
}
    </script>
</body>

</html>
