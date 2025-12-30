@extends('layouts.artifact')
@section('title', 'Artifact Management')
@section('title_ar', 'إدارة المقتنيات')
@section('content')
    <div>
        <x-table.action-wrapper title="Artifact Details">
            <x-action.button label="View" label_ar="منظر" route_name="artifacts.index" />
            <x-action.button label="Edit" label_ar="تحرير" route_name="artifacts.edit" route_param="{{ $artifact->id }}" />
        </x-table.action-wrapper>


        <div class="border-gray-100 border-t p-3">

            <x-info-row>
                <x-info-col label="Artifact ID" label_ar="رمز المرفقات">
                    {{ $artifact->artifact_id }}
                </x-info-col>
                <x-info-col label="Artifact Name" label_ar="اسم المرفقات">
                    {{ $artifact->artifact_name }}
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Artifact Description" label_ar="وصف المرفقات">
                {{ $artifact->artifact_description ?? '—' }}
            </x-info-col-lg>

            <x-info-row>
                <x-info-col label="Creation Date" label_ar="تاريخ الإنشاء">
                    {{ $artifact->artifact_creation_date ?? '—' }}
                </x-info-col>
                <x-info-col label="Classification" label_ar="اسم تصنيف">
                    {{ $artifact->classification?->classification_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Category" label_ar="فئة">
                    {{ $artifact->category?->category_name ?? '—' }}
                </x-info-col>
                <x-info-col label="System Name" label_ar="اسم النظام">
                    {{ $artifact->artifact_system_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Critical Assets?"
                    label_ar="الأصول المرتبطة حصرا بالأصول الحساسة؟">
                    {{ $artifact->artifact_critical_asset ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Cloud?" label_ar="الأصول المرتبطة حصريًا بالسحابة؟">
                    {{ $artifact->artifact_cloud ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Telework?" label_ar="الأصول مرتبطة حصريًا بالعمل عن بعد؟">
                    {{ $artifact->artifact_telework ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Social Media?"
                    label_ar="الأصول المرتبطة حصريًا بوسائل التواصل الاجتماعي؟">
                    {{ $artifact->artifact_social_media ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Data Privacy?"
                    label_ar="الأصول المرتبطة حصريًا خصوصية البيانات ؟">
                    {{ $artifact->artifact_data_privacy ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to PII?"
                    label_ar="؟(PII) الأصول المرتبطة حصريًا بمعلومات تحديد الهوية الشخصية">
                    {{ $artifact->artifact_pii ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to PCI/DSS?" label_ar="؟PCI/DSS الأصول المرتبطة حصريًا">
                    {{ $artifact->artifact_pci_dss ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to E-Commerce?"
                    label_ar="الأصول المتعلقة حصرا بالتجارة الإلكترونية؟">
                    {{ $artifact->artifact_e_commerce ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Infrastructure?"
                    label_ar="الأصول المتعلقة حصرا بالبنية التحتية؟">
                    {{ $artifact->artifact_e_commerce ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Application?" label_ar="الأصول المرتبطة حصرا بالتطبيق؟">
                    {{ $artifact->artifact_application ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to HR?" label_ar="الأصول المتعلقة حصرا بالموارد البشرية؟">
                    {{ $artifact->artifact_hr ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Physical Security?"
                    label_ar="الأصول المتعلقة حصرا بالأمن المادي؟">
                    {{ $artifact->artifact_physical_asset ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to Third Party?" label_ar="الأصول المرتبطة حصرا بطرف خارجي؟">
                    {{ $artifact->artifact_third_party ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Operational Technology?"
                    label_ar="الأصول المرتبطة حصريًا بالتكنولوجيا التشغيلية؟">
                    {{ $artifact->artifact_opertaional_tech ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Asset Exclusively Related to E-Banking?"
                    label_ar="الأصول المرتبطة حصريًا بالخدمات المصرفية الإلكترونية؟">
                    {{ $artifact->artifact_payment ?? '—' }}
                </x-info-col>
                <x-info-col label="Asset Exclusively Related to Payments?" label_ar="الأصول المرتبطة حصرا بالمدفوعات؟">
                    {{ $artifact->artifact_e_banking ?? '—' }}
                </x-info-col>
            </x-info-row>
        </div>
        <div>
            <x-table.table>
                <x-table.thead>
                    <x-table.th label="S.No" label_ar="رقم" />
                    <x-table.th label="Attachment Name" label_ar="اسم المرفقات" />
                    <x-table.th label="Action" label_ar="إجراء " />
                </x-table.thead>
                <x-table.tbody>
                    @foreach ($artifact->attachments as $attachment)
                        <tr>
                            <x-table.td> {{ $loop->index + 1 }}</x-table.td>
                            <x-table.td>{{ $attachment->name }}</x-table.td>

                            <x-table.td action_col="true">

                                <a href="{{ asset('storage/' . $attachment->path) }}" download
                                    class="inline-flex items-center justify-center p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition-colors">
                                    <x-icons.view />
                                </a>
                                <x-action.delete route_name="artifacts.attachments.destroy"
                                    param="{{ $attachment->id }}" />
                            </x-table.td>
                        </tr>
                    @endforeach
                </x-table.tbody>
            </x-table.table>
        </div>
    </div>
@endsection
