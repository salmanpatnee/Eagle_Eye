@extends('layouts.app-full')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
<style>
    @media (max-width: 768px) and (min-width: 320px) {
    .report-head {
        flex-direction: column;
    }
}
</style>

    <div>
        <x-table.action-wrapper title="">
        </x-table.action-wrapper>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4 space-between ">

                <a href="{{ route('asset-smart-search.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide1.JPG') }}" alt="Asset Smart Search"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <div></div>

                <a href="{{ route('exceptions-report.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide2.JPG') }}" alt="Management by Exceptions (MBE)"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>


            </div>
        </div>

        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">الأصول الحرجة</span>
            <span>Critical Assets</span>
        </h2>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-critical-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide3.JPG') }}" alt="List of Critical Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-critical-risk-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide4.JPG') }}" alt="Risk Related to Critical Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-critical-control-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide5.JPG') }}" alt="Controls Related to Critical Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>

        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">الأصول الحساسة</span>
            Cloud Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-cloud-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide6.JPG') }}" alt="List of Cloud Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-cloud-risk-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide7.JPG') }}" alt="List of Risk Related to Cloud Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-cloud-control-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide8.JPG') }}" alt="List of Controls Related to Cloud Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>


        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">أصول العمل عن بعد</span>
            Telework Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-telework-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide9.JPG') }}" alt="List of Telework Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-telework-risk-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide10.JPG') }}" alt="List of Risk Related to Telework Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-telework-control-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide11.JPG') }}"
                        alt="List of Controls Related to Telework Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>



        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">أصول التواصل الاجتماعي
            </span>
            Social Media Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-social-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide12.JPG') }}" alt="List of Social Media Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-social-risk-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide13.JPG') }}"
                        alt="List of Risk Related to Social Media Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-social-control-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide14.JPG') }}"
                        alt="List of Controls Related to Social Media Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>




        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">أصول خصوصية البيانات
            </span>
            Data Privacy Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-data-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide15.JPG') }}" alt="List of Data Privacy Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-data-risk-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide16.JPG') }}"
                        alt="List of Risk Related to Data Privacy Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-data-control-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide17.JPG') }}"
                        alt="List of Controls Related to Data Privacy Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>


        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">معلومات تحديد الهوية الشخصية الأصول
            </span>
            Personally Identifiable Information Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-pii-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide18.JPG') }}" alt="List of PII Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-risk-pii-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide19.JPG') }}" alt="List of Risk Related to PII Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-control-pii-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide20.JPG') }}" alt="List of Controls Related to PII Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>


        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">أصول الدفع
            </span>
            Payment Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-payment-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide21.JPG') }}" alt="List of Payment Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-risk-payment-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide22.JPG') }}" alt="List of Risk Related to Payment Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-control-payment-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide23.JPG') }}"
                        alt="List of Controls Related to Payment Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>



        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">معيار أمان بيانات صناعة بطاقات الدفع أصول
            </span>
            Payment Card Industry Data Security Standard Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-pci-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide24.JPG') }}"
                        alt="List of PCI Data Security Standard Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-risk-pci-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide25.JPG') }}"
                        alt="List of Risk Related to PCI Data Security Standard Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-control-pci-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide26.JPG') }}"
                        alt="List of Controls Related to PCI Data Security Standard Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>



        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">أصول التجارة الإلكترونية
            </span>
            E-Commerce Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <a href="{{ route('mis-e-commerce-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide27.JPG') }}" alt="List of E-Commerce Assets"
                        class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-risk-e-commerce-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide28.JPG') }}"
                        alt="List of Risk Related to E-Commerce Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
                <a href="{{ route('mis-control-e-commerce-assets.index') }}" target="_blank" class="block">
                    <img src="{{ asset('Images/mis-report/Slide29.JPG') }}"
                        alt="List of Controls Related to E-Commerce Assets" class="w-full h-auto rounded-lg shadow-md">
                </a>
            </div>
        </div>



        <h2 class="report-head flex flex-col dark:text-white sm:flex-row sm:items-center gap-1">
            <span class="font-bold dark:text-white" lang="ar" dir="rtl">الأصول المصرفية الإلكترونية
            </span>
            E-Banking Assets
        </h2>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
            <a href="{{ route('mis-e-banking-assets.index') }}" target="_blank" class="block">
                <img src="{{ asset('Images/mis-report/Slide30.JPG') }}" alt="List of E-Banking Assets"
                    class="w-full h-auto rounded-lg shadow-md">
            </a>
            <a href="{{ route('mis-risk-e-banking-assets.index') }}" target="_blank" class="block">
                <img src="{{ asset('Images/mis-report/Slide31.JPG') }}" alt="List of Risk Related to E-Banking Assets"
                    class="w-full h-auto rounded-lg shadow-md">
            </a>
            <a href="{{ route('mis-control-e-banking-assets.index') }}" target="_blank" class="block">
                <img src="{{ asset('Images/mis-report/Slide32.JPG') }}"
                    alt="List of Controls Related to E-Banking Assets" class="w-full h-auto rounded-lg shadow-md">
            </a>
        </div>
    </div>
@endsection
