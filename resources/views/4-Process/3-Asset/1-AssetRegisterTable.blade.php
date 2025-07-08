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
            @include('4-Process/3-Asset/assetheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>
    <div class="wrapper">
        @include('4-Process/3-Asset/AssetSidebar')
    
        <!-- SIDEBAR -->
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">تسجيل الأصول</p>
                    <p class="PageHeadEngTxt">Asset Registration</p>
                </div>
                
                <div class="ButtonContainer">
                    <a href="/asset-register-list" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('assetreg.create') }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('assetreg.edit', $asset->asset_id) }}"
                        class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    

                    <form method="POST" action="{{ route('assetreg.delete') }}" id="deleteForm">
                        <input type="hidden" name="record" value="{{$asset->asset_id}}">
                        <button type="button" id="btnDelete" class="{{ auth()->user()->can('delete-data') && auth()->user()->can('manage-asset') ? 'DeleteButton' : 'DisabledButton' }}">
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
                                <p class="FieldHeadEngTxt">Asset ID</p>
                                <p class="FieldHeadArbTxt">رمز الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Name</p>
                                <p class="FieldHeadArbTxt">اسم الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Description</p>
                                <p class="FieldHeadArbTxt">وصف الأصول</p>
                            </div>
                            <p class="bg-tx">{{ $asset->asset_description }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset IP Address</p>
                                <p class="FieldHeadArbTxt">عنوان IP للأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_ip_address }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Client Server Name</p>
                                <p class="FieldHeadArbTxt">اسم خادم الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_host_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset URL</p>
                                <p class="FieldHeadArbTxt">عنوان URL للأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_url }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Categories</p>
                                <p class="FieldHeadArbTxt">اسم فئة</p>
                            </div>
                            <ol class="resource-list">
                                @foreach ($asset->categories as $category)
                                <li>{{ $category->category_name }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    {{-- <div class="ContentTable">
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Custodians</p>
                            </div>
                            <ol class="resource-list">
                                @foreach ($asset->custodians as $custodian)
                                <li>{{ $custodian->custodian_name_name }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div> --}}
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Group Name</p>
                                <p class="FieldHeadArbTxt">اسم مجموعة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->assetGroup?->asset_group_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف</p>
                            </div>
                            <p class="sh-tx">{{ $asset->classification?->classification_id }}</p>
                            {{-- <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Owner Name</p>
                                <p class="FieldHeadArbTxt">اسم مالك الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->owner->owner_name }}</p> --}}
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Type Name</p>
                                <p class="FieldHeadArbTxt">اسم نوع الأصل</p>
                            </div>
                            <p class="sh-tx">{{ $asset->assetType?->asset_type_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Sub-Type Name</p>
                                <p class="FieldHeadArbTxt">اسم النوع الفرعي للأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->assetSubType?->asset_sub_type_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Location Name</p>
                                <p class="FieldHeadArbTxt">اسم الموقع</p>
                            </div>
                            <p class="sh-tx">{{ $asset->location?->location_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Status Name</p>
                                <p class="FieldHeadArbTxt">اسم حالة الأصل</p>
                            </div>
                            <p class="sh-tx">{{ $asset->assetStatus?->asset_current_status }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            {{-- <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification Name</p>
                                <p class="FieldHeadArbTxt">اسم التصنيف</p>
                            </div>
                            <p class="sh-tx">{{ $asset->classification?->classification_id }}</p> --}}
                        </div>
                        <div class="column">
                            
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Confidentiality</p>
                                <p class="FieldHeadArbTxt">السرية</p>
                            </div>
                            <p class="sh-tx">{{ $asset->cs_confidentiality }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Integrity</p>
                                <p class="FieldHeadArbTxt">النزاهة</p>
                            </div>
                            <p class="sh-tx">{{ $asset->cs_integrity }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Availability</p>
                                <p class="FieldHeadArbTxt">التوافر</p>
                            </div>
                            <p class="sh-tx">{{ $asset->cs_availability }}</p>
                        </div>
                        <div class="column">
                            {{-- <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Value</p>
                                <p class="FieldHeadArbTxt">قيمة الأصول</p>
                            </div>
                            <p class="sh-tx">{{ $asset->asset_value }}</p> --}}
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Risk Rating</p>
                                <p class="FieldHeadArbTxt">تقييم المخاطرة</p>
                            </div>
                            <p class="sh-tx">{{ $asset->risk_rating }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Regulatory Rating</p>
                                <p class="FieldHeadArbTxt">تقييم تنظيمات</p>
                            </div>
                            <p class="sh-tx">{{ $asset->regulatory_rating }}</p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection">
                    <div class="ContentTable">
                        {{-- ----1---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Critical Assets?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالأصول الحساسة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->critical_asset }}</p>
                        </div>
                        {{-- ----2---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Cloud?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالسحابة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cloud_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----3---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Telework?</p>
                                <p class="FieldHeadArbTxt">الأصول مرتبطة حصريًا بالعمل عن بعد؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->telework_asset }}</p>
                        </div>
                        {{-- ----4---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Social Media?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->social_media_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----5---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Data Privacy?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا خصوصية البيانات ؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->data_privacy_asset }}</p>
                        </div>
                        {{-- ----6---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to PII?</p>
                                <p class="FieldHeadArbTxt">؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                                </p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->data_pii_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----7---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to PCI/DSS?</p>
                                <p class="FieldHeadArbTxt">؟PCI/DSS الأصول المرتبطة حصريًا </p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->pci_dss_asset }}</p>
                        </div>
                        {{-- ----8---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Commerce?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالتجارة الإلكترونية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->e_commerce_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----9---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Infrastructure?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالبنية التحتية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->infrastructure_assets }}</p>
                        </div>
                        {{-- ----10---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Application?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالتطبيق؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->application_assets }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----11---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to HR?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالموارد البشرية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->hr_asset }}</p>
                        </div>
                        {{-- ----12---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Physical Security?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالأمن المادي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->physical_assets }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----13---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Third Party?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بطرف خارجي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->third_party_asset }}</p>
                        </div>
                        {{-- ----14---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Operational Technology?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->operational_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        {{-- ----15---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Banking?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->e_banking_asset }}</p>
                        </div>
                        {{-- ----16---- --}}
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Payments?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالمدفوعات؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->payment_asset }}</p>
                        </div>
                    </div>
                </div>
    
                <div class="ContentTableSection" id="CsccStandOneSection" style="display: none;">
                    {{-- -----------------1-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on National Security?</p>
                                <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على الأمن القومي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_1_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_1_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------2-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on the Reputation of the
                                    Kingdom and its Public Image?</p>
                                <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على سمعة المملكة وصورتها
                                    العامة؟</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_2_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_2_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------3-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Big Financial Loss because of Critical Asset?</p>
                                <p class="FieldHeadArbTxt">خسارة مالية كبيرة بسبب الأصول الحرجة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_3_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_3_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------4-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on Services Provided to a
                                    Large Number of Users?</p>
                                <p class="FieldHeadArbTxt">التأثير السلبي للأصول الحيوية على الخدمات المقدمة لعدد كبير
                                    من المستخدمين؟</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_4_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_4_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------5-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Life Loss because of Critical Asset?</p>
                                <p class="FieldHeadArbTxt">خسارة الحياة بسبب الأصول الحرجة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_5_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_5_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------6-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Unauthorized Disclosure of Confidential or Strictly
                                    Classified Data because of Critical Assets?</p>
                                <p class="FieldHeadArbTxt">الكشف غير المصرح به عن بيانات سرية أو مصنفة بشكل صارم بسبب
                                    الأصول الحرجة؟</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_6_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_6_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------7-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Critical Assets on the Business of a
                                    Vital Sector (or more)?</p>
                                <p class="FieldHeadArbTxt">؟(أو أكثر) التأثير السلبي للأصول الحيوية على أعمال القطاع
                                    الحيوي</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_7_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->cscc_standard_7_value }}</p>
                        </div>
                    </div>
                </div>
                <div class="ContentTableSection" id="OsmaccStandOneSection" style="display: none;">
                    {{-- -----------------1-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on National Security?
                                </p>
                                <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على الأمن
                                    القومي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_1_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_1_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------2-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on the Reputation of
                                    the Kingdom and its Public Image?</p>
                                <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على سمعة
                                    المملكة وصورتها العامة؟</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_2_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 25px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_2_value }}</p>
                        </div>
                    </div>
                    {{-- -----------------3-------------- --}}
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Negative Impact of Social Media Assets on the Interests of
                                    the Kingdom?</p>
                                <p class="FieldHeadArbTxt">التأثير السلبي لأصول وسائل التواصل الاجتماعي على مصالح
                                    المملكة؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_3_applicable }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Value</p>
                                <p class="FieldHeadArbTxt">قيمة</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $asset->osmacc_standard_3_value }}</p>
                        </div>
                    </div>
                </div>
            </table>
        </div>
    </div>
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
