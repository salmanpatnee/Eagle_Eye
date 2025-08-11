@extends('layouts.iso')
@section('title', 'Regulatory Reports')
@section('title_ar', 'التقارير التنظيمية')
@section('content')
    <div>
        <x-table.action-wrapper title="">
        </x-table.action-wrapper>

        <div class="col-span-12 space-y-6 xl:col-span-7 mb-8">

            <form action="{{ route('regulatory-reports.show') }}" method="GET">
                <input type="hidden" name="best_practice" id="best_practice" value="{{ $bestPracticeId }}">
                <div class="p-2 sm:p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-9 sm:grid-cols-3 md:gap-9 px-4">
                        <div></div>
                        @if ($bestPracticeId === 'NCA-CCC-2020')
                            <div class="bg-brand-950 border-4 p-8 rounded-2xl text-white w-full">
                                <x-form.select label="Control Cloud Type" label_ar="التحكم في نوع السحابة"
                                    name="cloud_control_type" placeholder="Control Cloud Type" :data="$cloudTypes"
                                    id_key="value" value_key="label" onchange="this.form.submit()" hide_keys="true"
                                    class="text-white" />
                            </div>

                            {{-- <div>
                                <p>Control Cloud Type</p>
                                <select name="cloud_control_type" id="cloud_control_type" required>
                                    <option value="csp">Cloud Service Provider (CSP)</option>
                                    <option value="cst">Cloud Service Tenants (CST)</option>
                                </select>
                            </div> --}}
                        @endif
                        @if ($bestPracticeId === 'NCA-ECC-2018')
                            <div class="bg-brand-950 border-4 p-8 rounded-2xl text-white w-full">
                                <x-form.select label="Select Version" label_ar="حدد الإصدار" name="version"
                                    placeholder="Select Version" :data="$versions" id_key="value" value_key="label"
                                    onchange="this.form.submit()" hide_keys="true" class="text-white" />
                            </div>
                        @endif
                        <div></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
