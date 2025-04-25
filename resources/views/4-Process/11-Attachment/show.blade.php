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
            @include('4-Process/11-Attachment/attachmentheader')
        </div>
        <div class="text-center d-flex gap-3">
            @include('partials.roles')
            @include('4-Process/backbutton')
        </div>
    </div>

    <div class="wrapper">

        @include('4-Process/11-Attachment/sidebar')
        <!-- SIDEBAR -->
    
    
        <div class="IndiTable">
            <div class="TableHeading">
                <div class="PageHead">
                    <p class="PageHeadArbTxt">إدارة المرفقات</p>
                    <p class="PageHeadEngTxt">Artifact Management</p>
                </div>
    
                <div class="ButtonContainer" >
                    <a href="{{ route('artifacts.index') }}" class="MoreButton">
                        <p class="ButtonArbTxt">منظر</p>
                        <p class="ButtonEngTxt">View</p>
                    </a>
                    <a href="{{ route('artifacts.create') }}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">يضيف</p>
                        <p class="ButtonEngTxt">Add</p>
                    </a>
                    <a href="{{ route('artifacts.edit', $artifact->id) }}" class="{{ auth()->user()->can('manage-asset') ? 'MoreButton' : 'DisabledButton' }}">
                        <p class="ButtonArbTxt">تحديث</p>
                        <p class="ButtonEngTxt">Update</p>
                    </a>
                    <form action="{{route('artifacts.delete', $artifact->id)}}" method="POST" id="deleteForm">
                        @method('DELETE')
                        @csrf
                        <button type="button" id="btnDelete" class="{{ auth()->user()->can('delete-data') ? 'DeleteButton' : 'DisabledButton' }}">
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
                                <p class="FieldHeadEngTxt">Artifact ID</p>
                                <p class="FieldHeadArbTxt">رمز المرفقات</p>
                            </div>
                            <p class="sh-tx">{{ $artifact?->artifact_id }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Artifact Name</p>
                                <p class="FieldHeadArbTxt">اسم المرفقات</p>
                            </div>
                            <p class="sh-tx">{{ $artifact?->artifact_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTablebg">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Artifact Description</p>
                                {{-- <p class="FieldHeadArbTxt">وصف الأصول</p> --}}
                            </div>
                            <p class="bg-tx">{{ $artifact?->artifact_description }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Creation Date</p>
                                <p class="FieldHeadArbTxt">رمز المرفقات</p>
                            </div>
                            <p class="sh-tx">{{ $artifact?->artifact_creation_date }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Classification</p>
                                {{-- <p class="FieldHeadArbTxt">اسم المرفقات</p> --}}
                            </div>
                            <p class="sh-tx">{{ $artifact->classification?->classification_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Category</p>
                                <p class="FieldHeadArbTxt">رمز المرفقات</p>
                            </div>
                            <p class="sh-tx">{{ $artifact->category?->category_name }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">System </p>
                                {{-- <p class="FieldHeadArbTxt">اسم المرفقات</p> --}}
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_system_name }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Critical Assets?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالأصول الحساسة؟
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_critical_asset }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Cloud?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالسحابة؟
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_cloud }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Telework?</p>
                                <p class="FieldHeadArbTxt">الأصول مرتبطة حصريًا بالعمل عن بعد؟
    
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_telework }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Social Media?
    
                                </p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟
    
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_social_media }}</p>
                        </div>
                    </div>
    
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Data Privacy?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا خصوصية البيانات ؟
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_data_privacy }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to PII?    
    
                                </p>
                                <p class="FieldHeadArbTxt">؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_pii }}</p>
                        </div>
                    </div>
    
                    <div class="ContentTable">
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to PCI/DSS?</p>
                                <p class="FieldHeadArbTxt">؟PCI/DSS الأصول المرتبطة حصريًا
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_pci_dss }}</p>
                        </div>
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Commerce?    
    
                                </p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالتجارة الإلكترونية؟
    
    
                                </p>
                            </div>
                            <p class="sh-tx">{{ $artifact->artifact_e_commerce }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Infrastructure?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالبنية التحتية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $artifact->artifact_e_commerce }}</p>
                        </div>
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Application?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالتطبيق؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $artifact->artifact_application }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to HR?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالموارد البشرية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $artifact->artifact_hr }}</p>
                        </div>
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Physical Security?</p>
                                <p class="FieldHeadArbTxt">الأصول المتعلقة حصرا بالأمن المادي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $artifact->artifact_physical_asset }}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Third Party?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بطرف خارجي؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{ $artifact->artifact_third_party }}</p>
                        </div>
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Operational Technology?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{$artifact->artifact_opertaional_tech}}</p>
                        </div>
                    </div>
                    <div class="ContentTable">
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to E-Banking?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{$artifact->artifact_payment}}</p>
                        </div>
                        
                        <div class="column">
                            <div class="FieldHead">
                                <p class="FieldHeadEngTxt">Asset Exclusively Related to Payments?</p>
                                <p class="FieldHeadArbTxt">الأصول المرتبطة حصرا بالمدفوعات؟</p>
                            </div>
                            <div style="margin-bottom: 10px"></div>
                            <p class="sh-tx">{{$artifact->artifact_e_banking}}</p>
                        </div>
                    </div>
                </div>
            </table>
    
            <div class="ListTable" id="attachments">
                <table cellspacing="0">
                    <tr>
                        <th>
                            <p class="ListHeadArbTxt">رمز </p>
                            <p class="ListHeadEngTxt">S.No</p>
                        </th>
                        <th>
                            <p class="ListHeadArbTxt">اسم المرفقات</p>
                            <p class="ListHeadEngTxt">Attachment Name</p>
                        </th>
                        <th></th>
                    </tr>
    
                    @forelse ($artifact->attachments as $attachment)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                {{ $attachment->name }}
                            </td>
                            <td class="flex items-center justify-end">
                                <small class="me-1">
                                    <a href="{{ asset('storage/' . $attachment->path) }}" download>View</a>
                                </small>
                                <small>
                                    <form method="POST" action="{{route('artifacts.attachments.destroy', $attachment->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn-transparent" type="submit">Delete</button>
                                    </form>
                                </small>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">
                                <p>No attachments yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
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
