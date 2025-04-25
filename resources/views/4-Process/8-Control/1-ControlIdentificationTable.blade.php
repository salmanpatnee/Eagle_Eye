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

<body class="bg-white">


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
                    <p class="ArbTxt">تحديد الضوابط</p>
                    <p class="EngTxt">Control Identification</p>
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
        @include('4-Process/8-Control/ControlSidebar')
    </section>
    <!-- SIDEBAR -->


    <!-- CONTENT -->
    <div class="IndiTable">
        <div class="TableHeading">
            <div class="PageHead">
                <p class="PageHeadArbTxt">تعريف الضوابط</p>
                <p class="PageHeadEngTxt">Control Definition</p>
            </div>
            <div class="ButtonContainer">
                <a href="/control-identification-list" class="MoreButton">
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
                            <p class="FieldHeadEngTxt">Control ID</p>
                            <p class="FieldHeadArbTxt">رمز الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_id }}</p>
                        <div class="FieldHead" style="margin-top: 1em">
                            <p class="FieldHeadEngTxt">Control Name</p>
                            <p class="FieldHeadArbTxt">اسم الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead" style="margin-top: 5em">
                            <p class="FieldHeadEngTxt">Control Name Arabic</p>
                            <p class="FieldHeadArbTxt">اسم الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_name_ar }}</p>
                    </div>
                </div>

                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Description</p>
                            <p class="FieldHeadArbTxt">وصف الضوابط</p>
                        </div>
                        <p class="bg-tx">{{ $control->control_description }}</p>

                        <div class="FieldHead" style="margin-top: 1em;">
                            <p class="FieldHeadEngTxt">Control Description Arabic</p>
                            <p class="FieldHeadArbTxt">وصف الضوابط</p>

                            {{-- @dd(strpos($control->control_description_ar, ":")) --}}
                            @if ($control->control_description_ar && strpos($control->control_description_ar, ':') != false)
                                @php
                                    [$beforeColon, $afterColon] = explode(':', $control->control_description_ar, 2);
                                @endphp
                            @endif
                        </div>
                        @if ($control->control_description_ar && strpos($control->control_description_ar, ':') != false)
                            <p class="bg-tx ar">{{ $beforeColon }}: <br>
                                {{ trim($afterColon) }}</p>
                        @else
                            <p class="bg-tx ar">{{ $control->control_description_ar }}</p>
                        @endif


                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Classification Name</p>
                            <p class="FieldHeadArbTxt">اسم التصنيف</p>
                        </div>
                        <p class="sh-tx">{{ $control->classification_id }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Owner Name</p>
                            <p class="FieldHeadArbTxt">اسم مالك الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->owner?->owner_name }}</p>
                    </div>
                </div>

                <div class="ContentTable">
                    <div class="column">

                    </div>
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Name</p>
                                <p class="FieldHeadArbTxt">اسم الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $control->custodian_name_name }}</p>
                        </div> --}}
                </div>
                <div class="ContentTable">
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodian Role</p>
                                <p class="FieldHeadArbTxt">دور الوصي</p>
                            </div>
                            <p class="sh-tx">{{ $control->custodian_role_title }}</p>
                        </div> --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Level</p>
                            <p class="FieldHeadArbTxt">ضوابط مستوى</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_level_title }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Main Control</p>
                            <p class="FieldHeadArbTxt">ضوابط الرئيسي</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_parent }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">

                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Type</p>
                            <p class="FieldHeadArbTxt">نوع الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->type->control_type_name }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Nature</p>
                            <p class="FieldHeadArbTxt">طبيعة الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_nature }}</p>
                    </div>

                </div>
                <div class="ContentTable">

                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Criticality</p>
                            <p class="FieldHeadArbTxt">الضوابط الحساسة</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_criticality }}</p>
                    </div>
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">ISO Related Control</p>
                            <p class="FieldHeadArbTxt">ISO الضوابط المتعلقة بمعيار</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_iso_name }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Reference</p>
                            <p class="FieldHeadArbTxt">مرجع الضوابط</p>
                        </div>
                        <p class="sh-tx">{{ $control->control_reference }}</p>
                    </div>
                    <div class="column">

                    </div>

                </div>
                <div class="ContentTable">
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Best Practice Name</p>
                                <p class="FieldHeadArbTxt">اسم أفضل الممارسات</p>
                            </div>
                            <p class="sh-tx">{{ $control->best_practices_name }}</p>
                        </div> --}}
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Main Domain Name</p>
                                <p class="FieldHeadArbTxt">المكون الأساسي</p>
                            </div>
                            <p class="sh-tx">{{ $control->main_domain_name }}</p>
                        </div> --}}
                </div>
                <div class="ContentTable">
                    {{-- <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Sub-Domain Name</p>
                                <p class="FieldHeadArbTxt">المكون الفرعي</p>
                            </div>
                            <p class="sh-tx">{{ $control->sub_domain_name }}</p>
                        </div> --}}
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Implementation Mandatories</p>
                            <p class="FieldHeadArbTxt">التزامات التنفيذ</p>
                        </div>
                        <p class="bg-tx">{{ $control->implementation_mandatories }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Maturity Level Required </p>
                            <p class="FieldHeadArbTxt">مستوى النضج</p>
                        </div>
                        <p class="bg-tx">{{ $control->maturity_level }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Implementation Guidelines</p>
                            <p class="FieldHeadArbTxt">إرشادات التنفيذ</p>
                        </div>
                        <p class="bg-tx">{{ $control->implementation_guidelines }}</p>
                    </div>
                </div>
                <div class="ContentTablebg">
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Dependency</p>
                            <p class="FieldHeadArbTxt">ضوابط التبعية</p>
                        </div>
                        <p class="bg-tx">{{ $control->control_dependency }}</p>
                    </div>
                </div>
            </div>





            <div class="ContentTableSection">
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Categories</p>
                            <p class="FieldHeadArbTxt">اسم الفئة</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->categories as $category)
                                <li>{{ $category->category_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Best Practice</p>
                            <p class="FieldHeadArbTxt">أفضل الممارسات</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->bestPractices as $bestPractice)
                                <li>{{ $bestPractice->best_practices_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Custodian Name</p>
                            <p class="FieldHeadArbTxt">اسم الوصي</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->custodians as $custodian)
                                <li>{{ $custodian->custodian_role_title }}</li>
                            @endforeach
                        </ol>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Domain</p>
                            <p class="FieldHeadArbTxt">أفضل الممارسات</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->domains as $doman)
                                <li>{{ $doman->main_domain_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Sub Domain</p>
                            {{-- <p class="FieldHeadArbTxt">اسم الوصي</p> --}}
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->subDomains as $subDomain)
                                <li>{{ $subDomain->sub_domain_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Risk</p>
                            {{-- <p class="FieldHeadArbTxt">أفضل الممارسات</p> --}}
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <ol class="resource-list">
                            @foreach ($control->risks as $risk)
                                <li>{{ $risk->risk_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----1---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Critical Assets?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالأصول الحساسة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_critical_asset }}</p>
                    </div>
                    {{-- ----2---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Cloud?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالسحابة؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_cloud }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----3---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Telework?</p>
                            <p class="FieldHeadArbTxt">الضوابط مرتبطة حصريًا بالعمل عن بعد؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_telework }}</p>
                    </div>
                    {{-- ----4---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Social Media?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_social_media }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----5---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Data Privacy?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا خصوصية البيانات ؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_data_privicy }}</p>
                    </div>
                    {{-- ----6---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to PII?</p>
                            <p class="FieldHeadArbTxt">؟(PII) الضوابط المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                            </p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_pii }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----7---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to PCI/DSS?</p>
                            <p class="FieldHeadArbTxt">؟PCI/DSS الضوابط المرتبطة حصريًا</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_pci_dss }}</p>
                    </div>
                    {{-- ----8---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to E-Commerce?</p>
                            <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_e_commerce }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----9---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Infrastructure?</p>
                            <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالبنية التحتية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_infrastructure }}</p>
                    </div>
                    {{-- ----10---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Application?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالتطبيق؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_application }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----11---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to HR?</p>
                            <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالموارد البشرية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_hr }}</p>
                    </div>
                    {{-- ----12---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Physical Security?</p>
                            <p class="FieldHeadArbTxt">الضوابط المتعلقة حصرا بالأمن المادي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_physical_security }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----13---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Third Party?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بطرف خارجي؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_third_party }}</p>
                    </div>
                    {{-- ----14---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Operational Technology?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_operational }}</p>
                    </div>
                </div>
                <div class="ContentTable">
                    {{-- ----15---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to Payments?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصرا بالمدفوعات؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_payment }}</p>
                    </div>
                    {{-- ----16---- --}}
                    <div class="column">
                        <div class="FieldHead">
                            <p class="FieldHeadEngTxt">Control Exclusively Related to E-Banking?</p>
                            <p class="FieldHeadArbTxt">الضوابط المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                        </div>
                        <div style="margin-bottom: 10px"></div>
                        <p class="sh-tx">{{ $control->control_e_banking }}</p>
                    </div>
                </div>
            </div>
        </table>
    </div>
    @include('components.delete-confirmation-modal')

    <script src="/Css/4-Process/1-Form/1-Form.js"></script>
    <script src="/Css/7-Sidebar/2-Sidebar.js"></script>

    <button type="button" class="RightButton" onclick="goBack()">
        <p>للخلف</p>
        <p>Back</p>
    </button>
    <script>
        document.getElementById('btnDelete').addEventListener('click', function(event) {
    event.preventDefault();
    window.deleteConfirmationModal.show(document.getElementById('deleteForm'));
});
    </script>
</body>

</html>
