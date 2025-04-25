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
                <a href="/compliance">
                    <i class='bx bx-home'></i>
                </a>
                <p class="bold-arbtext">العمليات</p>
                <p class="bold-text">Processes</p>
                <i class='bx bx-right-arrow-alt'></i>
                <div class="HeadingTxt">
                    <p class="ArbTxt">تحديد المخاطر</p>
                    <p class="EngTxt">Risk Identification</p>
                </div>

                <div class="text-center d-flex gap-3" style="margin-left: auto">
                    @include('partials.roles')
                    <div class="RightButtonContainer">
                        <button type="button" class="RightButton" onclick="goBack()">
                            <p>للخلف</p>
                            <p>Back</p>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @include('4-Process/7-Risk/risksidebar')
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تحديد المخاطر</p>
                <p class="PageHeadEngTxt">Risk Identification</p>
            </div>
            <div class="ButtonContainer">
                <a href="/risk-identification-list" class="MoreButton">
                    <p class="ButtonArbTxt">منظر</p>
                    <p class="ButtonEngTxt">View</p>
                </a>
                <a href="{{ route($routeName . '.create') }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">يضيف</p>
                    <p class="ButtonEngTxt">Add</p>
                </a>
                <a href="{{ route($routeName . '.edit', $data->$primaryKey) }}"
                    class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                    <p class="ButtonArbTxt">تحديث</p>
                    <p class="ButtonEngTxt">Update</p>
                </a>
                <form method="POST" action="{{ route($routeName . '.delete') }}" id="deleteForm">
                    <input type="hidden" name="record" value="{{ $data->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" id="btnDelete"
                        class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يمسح</p>
                        <p class="ButtonEngTxt">Delete</p>
                    </button>
                </form>
            </div>
        </div>
        <table cellspacing="0">
            <div class="ContentTableSection">
                
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk ID</p>
                            <p class="FieldHeadArbTxt">رمز المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->risk_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Name</p>
                            <p class="FieldHeadArbTxt">اسم المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->risk_name }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Description</p>
                            <p class="FieldHeadArbTxt">وصف المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk->risk_description }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Objectives</p>
                            <p class="FieldHeadArbTxt">أهداف المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk->risk_objectives }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Profile</p>
                            <p class="FieldHeadArbTxt">تفاصيل المخاطر</p>
                        </div>
                        <p class="bg-tx">{{ $risk->risk_profile }}</p>
                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Group Name</p>
                            <p class="FieldHeadArbTxt">اسم مجموعة المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->group?->risk_group_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم صاحب المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->owner?->owner_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Type Name</p>
                            <p class="FieldHeadArbTxt">اسم نوع المخاطرة</p>
                        </div>
                        <p class="sh-tx">{{ $risk->type?->risk_type_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Sub-Type Name</p>
                            <p class="FieldHeadArbTxt">اسم النوع الفرعي للمخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->subType?->risk_sub_type_name }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Classification Name</p>
                            <p class="FieldHeadArbTxt">اسم التصنيف</p>
                        </div>
                        <p class="bg-tx">{{ $risk->classification?->classification_name }}</p>
                    </div>

                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Threat Agents</p>
                            <p class="FieldHeadArbTxt">وكيل التهديد</p>
                        </div>
                        <ol class="resource-list">

                            @foreach ($risk->agents as $agent)
                                <li>{{ $agent->threat_agent_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Vulnerability</p>
                            <p class="FieldHeadArbTxt">نقاط الضعف</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->vulnerabilities as $vulnerability)
                                <li>{{ $vulnerability->va_id }} - {{ $vulnerability->va_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Categories</p>
                            <p class="FieldHeadArbTxt">فئات</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->categories as $category)
                                <li>{{ $category->category_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Asset Group</p>
                            <p class="FieldHeadArbTxt">مجموعة الأصول</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->assetGroups as $group)
                                <li>{{ $group->asset_group_name }}</li>
                            @endforeach
                        </ol>
                    </div>

                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Key Risk Indicators</p>
                            <p class="FieldHeadArbTxt">مؤشرات المخاطر الرئيسية</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->kris as $kri)
                                <li>{{ $kri->key_risk_indicator_id }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Key Performance Indicator</p>
                            <p class="FieldHeadArbTxt">مؤشر الأداء الرئيسي</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->kpis as $kpi)
                                <li>{{ $kpi->key_performance_indicatory_id }}</li>
                            @endforeach
                        </ol>
                    </div>

                </div>
                <div class="ContentTablebg">

                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Acceptance</p>
                            <p class="FieldHeadArbTxt">قبول المخاطر </p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->acceptances as $acceptance)
                                <li>{{ $acceptance->risk_acceptance_id }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Departments</p>
                            <p class="FieldHeadArbTxt">قسم</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->departments as $department)
                                <li>{{ $department->department_name }}</li>
                            @endforeach
                        </ol>
                    </div>

                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Custodian Name</p>
                            <p class="FieldHeadArbTxt">اسم الوصي</p>
                        </div>
                        <ol class="resource-list">
                            @foreach ($risk->custodians as $custodian)
                                <li>{{ $custodian->custodian_role_title }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>

            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Inherent Score</p>
                            <p class="FieldHeadArbTxt">المخاطر الكامنة</p>
                        </div>
                        <p class="sh-tx">{{ $risk->inherent->risk_inherent_score }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Consequences</p>
                            <p class="FieldHeadArbTxt">آثار المخاطر</p>
                        </div>
                        <p class="sh-tx">{{ $risk->risk_consequences }}</p>
                    </div>
                </div>
            </div>
            <div class="ContentTableSection">
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Critical Assets?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالأصول الحساسة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_critical_asset }}</p>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Cloud?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالسحابة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_cloud }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----3---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Telework?</p>
                            <p class="FieldHeadArbTxt">المخاطر مرتبطة حصريًا بالعمل عن بعد؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_telework }}</p>
                    </div>
                    {{-- ----4---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Social Media?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_social_media }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----5---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Data Privacy?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا خصوصية البيانات ؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_data_privicy }}</p>
                    </div>
                    {{-- ----6---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to PII?</p>
                            <p class="FieldHeadArbTxt">؟(PII) المخاطر المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                            </p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_pii }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----7---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to PCI/DSS?</p>
                            <p class="FieldHeadArbTxt">؟PCI/DSS المخاطر المرتبطة حصريًا</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_pci_dss }}</p>
                    </div>
                    {{-- ----8---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to E-Commerce?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_e_commerce }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----9---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Infrastructure?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالبنية التحتية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_infrastructure }}</p>
                    </div>
                    {{-- ----10---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Application?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالتطبيق؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_application }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----11---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to HR?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالموارد البشرية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_hr }}</p>
                    </div>
                    {{-- ----12---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Physical Security?</p>
                            <p class="FieldHeadArbTxt">المخاطر المتعلقة حصرا بالأمن المادي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_physical_security }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Third Party?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بطرف خارجي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_third_party }}</p>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Operational Technology?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_operational }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to Payments?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصرا بالمدفوعات؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_payment }}</p>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk Exclusively Related to E-Banking?</p>
                            <p class="FieldHeadArbTxt">المخاطر المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $risk->risk_e_banking }}</p>
                    </div>
                </div>
            </div>
        </table>
    </div>
    </form>


    @include('components.delete-confirmation-modal')
    <script src="{{ asset('js/delete-confirmation.js') }}"></script>
    <script>
         document.getElementById('btnDelete').addEventListener('click', function(event) {
            event.preventDefault();
            window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
        });

        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
