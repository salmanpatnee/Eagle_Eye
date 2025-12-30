@extends('layouts.ciso-full')
@section('title', 'Expert Resources')
@section('title_ar', 'موارد الخبراء')
@section('content')
    <div>
        <x-table.action-wrapper title="Expert Resources" />

        <form action="{{ route('hr-expert.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Nationality" label_ar="جنسية" name="nationality[]" :value="$nationality"
                            :custom_data="$nationalities" />
                    </div>
                    <div>
                        <x-form.multiselect label="Industry" label_ar="الصناعة" name="industry_name[]" :value="$industry"
                            :data="$industries" id_key="industry_id" value_key="industry_name" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Organization" label_ar="منظمة" name="organization_name[]"
                            :value="$organization" :data="$organizations" id_key="organization_id" value_key="organization_name"
                            hide_keys="true" />
                    </div>
                </x-form.grid-3-col>
                <x-form.grid-3-col>
                    <div>

                        <x-form.multiselect label="Certification" label_ar="شهادة" name="certification_title[]"
                            :value="$certification" :data="$certifications" id_key="certification_id" value_key="certification_title"
                            hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Expertise" label_ar="خبرة" name="expertise_title[]" :value="$expertise"
                            :data="$experties" id_key="expertise_id" value_key="expertise_title" hide_keys="true" />
                    </div>
                    <div>

                        <x-form.multiselect label="Designation" label_ar="تعيين" name="designation[]" :value="$designation"
                            :custom_data="$designations" />
                    </div>
                </x-form.grid-3-col>

            </div>
            <div class="flex items-center justify-center gap-5 border-t border-gray-100 p-4">
                <button class="action-btn text-center justify-center">Filter Resource</button>
                {{-- <button class="action-btn-secondary text-center justify-center w-20">
                    <a href="{{ route('hr-expert.index') }}">Reset</a>
                </button> --}}

            </div>
        </form>

        <!-- Scrollable table container with fixed height, inner scroll and always visible scrollbar -->
        <div class="relative">
            <!-- Left fade effect -->
            <div class="pointer-events-none absolute inset-y-0 left-0 z-10 hidden w-24 lg:block">
                <div class="h-full w-full bg-gradient-to-r from-white dark:from-gray-800 to-transparent"></div>
            </div>

            <!-- Right fade effect -->
            <div class="pointer-events-none absolute inset-y-0 right-0 z-10 hidden w-24 lg:block">
                <div class="h-full w-full bg-gradient-to-l from-white dark:from-gray-800 to-transparent"></div>
            </div>

            <div class="overflow-x-auto overflow-y-auto max-h-[350px]">
                <x-table.table>
                    <x-table.thead>
                        <x-table.th label="S.No" label_ar="رقم" />
                        <x-table.th label="Expert ID" />
                        <x-table.th label="Expert Name" />
                        <x-table.th label="Nationality" />
                        <x-table.th label="Industry" />
                        <x-table.th label="Organization" />
                        <x-table.th label="Certification" />
                        <x-table.th label="Expertise" />
                        <x-table.th label="Designation" />
                        <x-table.th label="Experience" />
                        <x-table.th label="Expert Roles" />
                        <x-table.th label="LinkedIn Profile" />
                    </x-table.thead>
                    <x-table.tbody>
                        @forelse ($humanResource as $row)
                            <tr>
                                <x-table.td><x-table.serial :loop="$loop" :paginator="$humanResource" /></x-table.td>
                                <x-table.td> {{ $row->expert_id }}</x-table.td>
                                <x-table.td> {{ $row->name }}</x-table.td>
                                <x-table.td> {{ $row->nationality }}</x-table.td>
                                <x-table.td> {{ $row->industry->industry_name }}</x-table.td>
                                <x-table.td> {{ $row->organization->organization_name }}</x-table.td>
                                <x-table.td>
                                    <div style="width: 250px;">
                                        <x-table-list :data="$row->certifications" id_key="certification_id"
                                            value_key="certification_title" />
                                    </div>
                                </x-table.td>
                                <x-table.td>
                                    <div style="width: 250px;">
                                        <x-table-list :data="$row->experties" id_key="" value_key="expertise_title" />
                                    </div>
                                </x-table.td>
                                <x-table.td>
                                    <div style="width: 250px;">{{ $row->designation }}</div>
                                </x-table.td>
                                <x-table.td> {{ $row->experience }}</x-table.td>
                                <x-table.td>
                                    <x-table-list :data="$row->roles" id_key="" value_key="role_title" />
                                </x-table.td>
                                <x-table.td> <a style="color: blue; text-decoration: underline;" href="{{ $row->linkedin_profile }}" target="_blank">
                                        {{ $row->linkedin_profile }}
                                    </a></x-table.td>
                                @php $id = $row->expert_id @endphp

                            </tr>
                        @endforeach
                    </x-table.tbody>
                </x-table.table>
            </div>
        </div>

        <x-pagination>
            {{ $humanResource->links() }}
        </x-pagination>
    </div>
@endsection

@push('css')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush