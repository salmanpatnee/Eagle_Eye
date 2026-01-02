@extends('layouts.hr')
@section('title', 'HR Experts')
@section('title_ar', 'خبراء الموارد البشرية')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ isset($humanResource) ? 'Update' : 'New' }} HR Expert" title_ar="{{ isset($humanResource) ? 'تحديث' : 'جديد' }} خبير الموارد البشرية">
            <x-action.button label="View" label_ar="منظر" route_name="hr-experts.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($humanResource) ? route('hr-experts.update', $humanResource->id) : route('hr-experts.store') }}" method="POST">
            @csrf
            @if (isset($humanResource))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 bg-white rounded-lg shadow-sm">
                
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Expert ID" label_ar="رمز خبراء الموارد البشرية" name="expert_id" required="true" 
                            placeholder="Enter Expert ID" :value="$humanResource->expert_id ?? ''" :readonly="$humanResource?->expert_id"/>
                    </div>
                    <div>
                        <x-form.field label="Name" label_ar="الاسم خبراء الموارد البشرية" name="name" required="true" 
                            placeholder="Enter Name" :value="$humanResource->name ?? ''" />
                    </div>
                    
                </x-form.grid-col>

                {{-- <x-form.grid-col>
                    <div>
                        <x-form.field label="Email" label_ar="البريد الإلكتروني" name="email" type="email" required="true" 
                            placeholder="Enter Email" :value="$humanResource->email ?? ''" />
                    </div>
                    <div>
                         <x-form.field label="Phone" label_ar="رقم الهاتف" name="phone" 
                            placeholder="Enter Phone" :value="$humanResource->phone ?? ''" />
                    </div>
                    
                </x-form.grid-col> --}}

                <x-form.grid-col>
                    <div>
                        <x-form.field label="LinkedIn Profile" label_ar="ملف LinkedIn" name="linkedin_profile" 
                            placeholder="Enter URL" :value="$humanResource->linkedin_profile ?? ''" />
                    </div>
                     <div>
                        <x-form.field label="Experience (Years)" label_ar="الخبرة (سنوات)" name="experience" required="true" 
                            placeholder="Enter Experience" :value="$humanResource->experience ?? ''" />
                    </div>
                     
                </x-form.grid-col>

                

                <x-form.grid-col>
                    <div>
                        <x-form.select label="Organization" label_ar="منظمة" name="organization_id" required="true"
                            :data="$organizations" id_key="organization_id" value_key="organization_name" 
                            :value="$humanResource->organization_id ?? ''" />
                    </div>
                    <div>
                        <x-form.multiselect label="Certifications" label_ar="الشهادات" name="certifications[]"
                            :data="$certifications" id_key="certification_id" value_key="certification_title"
                            :value="isset($humanResource) ? $humanResource->certifications->pluck('certification_id')->toArray() : []" required="true"/>
                    </div>
                    
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.multiselect label="Expertise" label_ar="الخبرات" name="experties[]" required="true"
                            :data="$experties" id_key="expertise_id" value_key="expertise_title"
                            :value="isset($humanResource) ? $humanResource->experties->pluck('expertise_id')->toArray() : []" />
                    </div>
                     <div>
                        <x-form.select label="Industry" label_ar="الصناعة" name="industry_id" required="true"
                            :data="$industries" id_key="industry_id" value_key="industry_name" 
                            :value="$humanResource->industry_id ?? ''" />
                    </div>
                   
                </x-form.grid-col>
                <x-form.grid-col>
                     <div>
                        <x-form.select label="Nationality" label_ar="جنسية" name="nationality_id" required="true"
                            :data="$nationalities" id_key="id" value_key="name" hide_keys="true"
                            :value="$humanResource->nationality_id ?? ''" />
                    </div>
                    <div>
                        <x-form.select label="Designation" label_ar="تعيين" name="designation_id" required="true"
                            :data="$designations" id_key="id" value_key="designation_name"  hide_keys="true"
                            :value="$humanResource->designation_id ?? ''" />
                    </div>
                </x-form.grid-col>  

                <div class="flex justify-end">
                    <x-form.submit label="HR Expert" label_ar="خبير الموارد البشرية" :isUpdate="isset($humanResource)" />
                </div>
            </div>
        </form>

    </div>
@endsection
