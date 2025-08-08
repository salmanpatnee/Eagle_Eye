@extends('layouts.app-full')
@section('title', 'Management Information System Reports')
@section('title_ar', 'تقارير نظم المعلومات الإدارية')
@section('content')
    <div>
        <x-table.action-wrapper title="">
        </x-table.action-wrapper>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 px-4">
                <div class="max-w-[380px] w-full mx-auto">
                    <x-report-card route_name="asset-smart-search.index" title="Asset Smart Search"
                        title_ar="البحث الذكي عن الأصول" />
                </div>
                <div class="max-w-[380px] w-full mx-auto">
                    <x-report-card route_name="exceptions-report.index" title="Management by Exceptions (MBE)"
                        title_ar="إدارة بواسطة الاستثناءات" />
                </div>
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">الأصول الحرجة</span>
            <span>Critical Assets</span>
        </h2>
        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Critical Assets" title_ar="قائمة الأصول الحرجة" />
                <x-report-card route_name="" title="Risk Related to Critical Assets"
                    title_ar="المخاطر المتعلقة بالأصول الحرجة" />
                <x-report-card route_name="" title="Controls Related to Critical Assets"
                    title_ar="الضوابط المتعلقة بالأصول الحرجة" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">الأصول الحساسة</span>
            Cloud Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Cloud Assets" title_ar="قائمة الأصول الحساسة" />
                <x-report-card route_name="" title="Risk Related to Cloud Assets"
                    title_ar="المخاطر المتعلقة بالأصول الحساسة" />
                <x-report-card route_name="" title="Controls Related to Cloud Assets"
                    title_ar="الضوابط المتعلقة بالأصول الحساسة" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">أصول العمل عن بعد</span>
            Telework Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Telework Assets" title_ar="قائمة أصول العمل عن بعد" />
                <x-report-card route_name="" title="Risk Related to Telework Assets"
                    title_ar="المخاطر المتعلقة  أصول العمل عن بعد" />
                <x-report-card route_name="" title="Controls Related to Telework Assets"
                    title_ar="الضوابط المتعلقة  أصول العمل عن بعد" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">أصول التواصل الاجتماعي
            </span>
            Social Media Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Social Media Assets" title_ar="قائمة أصول التواصل الاجتماعي" />
                <x-report-card route_name="" title="Risk Related to Social Media Assets"
                    title_ar="المخاطر المتعلقة  أصول التواصل الاجتماعي" />
                <x-report-card route_name="" title="Controls Related to Social Media Assets"
                    title_ar="الضوابط المتعلقة  أصول التواصل الاجتماعي" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">أصول خصوصية البيانات
            </span>
            Data Privacy Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Data Privacy Assets" title_ar="قائمة أصول خصوصية البيانات" />
                <x-report-card route_name="" title="Risk Related to Data Privacy Assets"
                    title_ar="المخاطر المتعلقة  أصول خصوصية البيانات" />
                <x-report-card route_name="" title="Controls Related to Data Privacy Assets"
                    title_ar="الضوابط المتعلقة  أصول خصوصية البيانات" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">معلومات تحديد الهوية الشخصية الأصول
            </span>
            Personally Identifiable Information Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of PII Assets"
                    title_ar="قائمة معلومات تحديد الهوية الشخصية الأصول" />
                <x-report-card route_name="" title="Risk Related to PII Assets"
                    title_ar="المخاطر المتعلقة  معلومات تحديد الهوية الشخصية الأصول" />
                <x-report-card route_name="" title="Controls Related to PII Assets"
                    title_ar="الضوابط المتعلقة  معلومات تحديد الهوية الشخصية الأصول" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">أصول الدفع
            </span>
            Payment Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of Payment Assets" title_ar="قائمة أصول الدفع" />
                <x-report-card route_name="" title="Risk Related to Payment Assets"
                    title_ar="المخاطر المتعلقة  أصول الدفع" />
                <x-report-card route_name="" title="Controls Related to Payment Assets"
                    title_ar="الضوابط المتعلقة  أصول الدفع" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">معيار أمان بيانات صناعة بطاقات الدفع أصول
            </span>
            Payment Card Industry Data Security Standard Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of PCI Data Security Standard Assets"
                    title_ar="قائمة معيار أمان بيانات صناعة بطاقات الدفع أصول" />
                <x-report-card route_name="" title="Risk Related to PCI Data Security Standard Assets"
                    title_ar="المخاطر المتعلقة  معيار أمان بيانات صناعة بطاقات الدفع أصول" />
                <x-report-card route_name="" title="Controls Related to PCI Data Security Standard Assets"
                    title_ar="الضوابط المتعلقة  معيار أمان بيانات صناعة بطاقات الدفع أصول" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">أصول التجارة الإلكترونية
            </span>
            E-Commerce Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of E-Commerce Assets"
                    title_ar="قائمة أصول التجارة الإلكترونية" />
                <x-report-card route_name="" title="Risk Related to E-Commerce Assets"
                    title_ar="المخاطر المتعلقة  أصول التجارة الإلكترونية" />
                <x-report-card route_name="" title="Controls Related to E-Commerce Assets"
                    title_ar="الضوابط المتعلقة  أصول التجارة الإلكترونية" />
            </div>
        </div>

        <h2 class="report-head flex flex-col sm:flex-row sm:items-center gap-1">
            <span class="font-bold" lang="ar" dir="rtl">الأصول المصرفية الإلكترونية
            </span>
            E-Banking Assets
        </h2>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3 md:gap-6 px-4">
                <x-report-card route_name="" title="List of E-Banking Assets"
                    title_ar="قائمة الأصول المصرفية الإلكترونية" />
                <x-report-card route_name="" title="Risk Related to E-Banking Assets"
                    title_ar="المخاطر المتعلقة  الأصول المصرفية الإلكترونية" />
                <x-report-card route_name="" title="Controls Related to E-Banking Assets"
                    title_ar="الضوابط المتعلقة  الأصول المصرفية الإلكترونية" />
            </div>
        </div>

    </div>
@endsection
