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
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تقرير الأدلة</p>
                <p class="PageHeadEngTxt">Evidence Report</p>
            </div>
            <div class="ButtonContainer">
                <a href="{{route('evidences.index')}}" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route($routeName . '.create') }}"
                class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                <p class="ButtonArbTxt">يضيف</p>
                <p class="ButtonEngTxt">Add</p>
            </a>
            <a href="{{ route($routeName. '.edit', $data->$primaryKey) }}"
                class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                <p class="ButtonArbTxt">تحديث</p>
                <p class="ButtonEngTxt">Update</p>
            </a>
            <form method="POST" action="{{ route($routeName.'.delete') }}" id="deleteForm">
                <input type="hidden" name="record" value="{{ $data->id }}">
                <button type="button" id="btnDelete"
                    class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يمسح</p>
                    <p class="ButtonEngTxt">Delete</p>
                </button>
                @csrf
                @method('DELETE')
            </form>
            </div>
        </div>
        <table cellspacing="0">
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence ID</p>
                            <p class="FieldHeadArbTxt">رمز الأدلة</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->evidence_id }}</p>
                        </p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Name</p>
                            <p class="FieldHeadArbTxt">اسم الأدلة</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->evidence_name }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Description</p>
                            <p class="FieldHeadArbTxt">وصف الأدلة</p>
                        </div>
                        <p class="bg-tx">{{ $evidence->evidence_description }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Classification Name</p>
                            <p class="FieldHeadArbTxt">اسم التصنيف</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->classification?->classification_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Nature</p>
                            <p class="FieldHeadArbTxt">طبيعة الدليل</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->evidence_nature }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Type</p>
                            <p class="FieldHeadArbTxt">نوع الأدلة</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->evidence_type }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم مالك</p>
                        </div>
                        <p class="sh-tx">{{ $evidence->owner?->owner_name }}</p>
                    </div>
                    
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Source</p>
                            <p class="FieldHeadArbTxt">مصدر الأدلة</p>
                        </div>
                        <p class="bg-tx">{{ $evidence->evidence_source }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                
                    <div class="column">
                        <x-label label="Controls" label_ar="" />
                        <ol class="resource-list">
                            @foreach ($evidence->controls as $control)
                                <li>
                                    <a href="{{ route('controlmaster.show', $control->control_id) }}"
                                        target="_blank">
                                        {{ $control->control_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                    <div class="column">
                        <x-label label="Artifacts" label_ar="" />
                        <ol class="resource-list">
                            @foreach ($evidence->artifacts as $artifact)
                                <li>
                                    <a href="{{ route('artifacts.show', $artifact->id) }}"
                                        target="_blank">
                                        {{ $artifact->artifact_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="ContentTable">
                
                    <div class="column">
                        <x-label label="Categories" label_ar="اسم الفئة" />
                        <ol class="resource-list">
                            @foreach ($evidence->categories as $category)
                                <li>
                                    <a href="{{ route('controlmaster.show', $category->category_id) }}"
                                        target="_blank">
                                        {{ $category->category_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                   
                </div>
 
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Critical Assets?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصرا بالأصول الحساسة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->evidence_critical_asset }}</p>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Cloud?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصريًا بالسحابة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->evidence_cloud }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----3---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Telework?</p>
                            <p class="FieldHeadArbTxt">الأدلة مرتبطة حصريًا بالعمل عن بعد؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->evidence_telework }}</p>
                    </div>
                    {{-- ----4---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Social Media?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_social_media }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----5---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Data Privacy?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصريًا خصوصية البيانات ؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_data_privicy }}</p>
                    </div>
                    {{-- ----6---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to PII?</p>
                            <p class="FieldHeadArbTxt">؟(PII) الأدلة المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                            </p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->evidence_pii }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----7---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to PCI/DSS?</p>
                            <p class="FieldHeadArbTxt">؟PCI/DSS الأدلة المرتبطة حصريًا</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->evidence_pci_dss }}</p>
                    </div>
                    {{-- ----8---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to E-Commerce?</p>
                            <p class="FieldHeadArbTxt">الأدلة المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_e_commerce }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----9---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Infrastructure?</p>
                            <p class="FieldHeadArbTxt">الأدلة المتعلقة حصرا بالبنية التحتية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_infrastructure }}</p>
                    </div>
                    {{-- ----10---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Application?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصرا بالتطبيق؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_application }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----11---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to HR?</p>
                            <p class="FieldHeadArbTxt">الأدلة المتعلقة حصرا بالموارد البشرية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->Evidence_hr }}</p>
                    </div>
                    {{-- ----12---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Physical Security?</p>
                            <p class="FieldHeadArbTxt">الأدلة المتعلقة حصرا بالأمن المادي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->physical_security }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Third Party?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصرا بطرف خارجي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->third_party }}</p>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Operational Technology?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->operational_technology }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to Payments?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصرا بالمدفوعات؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->payment }}</p>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Evidence Exclusively Related to E-Banking?</p>
                            <p class="FieldHeadArbTxt">الأدلة المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $evidence->e_banking }}</p>
                    </div>
                </div>
            </div>
        </table>
    </div>
    </form>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
});

    </script>
</body>
</html>
