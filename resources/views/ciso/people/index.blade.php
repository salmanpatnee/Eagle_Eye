@extends('layouts.app-full')
@section('title', 'Expert Resources')
{{-- @section('title_ar', 'موارد الخبراء') --}}
@section('content')
    @push('css')
        <script src="https://cdn.tailwindcss.com"></script>
    @endpush
    <div>
        <x-table.action-wrapper title="Expert Resources" />

        <form action="{{ route('people.index') }}" method="GET">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6">
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Nationality" name="nationality[]" :value="$nationality" :custom_data="$nationalities" />
                    </div>
                    <div>
                        <x-form.multiselect label="Industry" name="industry_name[]" :value="$industry" :data="$industries"
                            id_key="industry_id" value_key="industry_name" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Organization" name="organization_name[]" :value="$organization"
                            :data="$organizations" id_key="organization_id" value_key="organization_name" hide_keys="true" />
                    </div>
                </x-form.grid-3-col>
                <x-form.grid-3-col>
                    <div>

                        <x-form.multiselect label="Certification" name="certification_title[]" :value="$certification"
                            :data="$certifications" id_key="certification_id" value_key="certification_title" show_key="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Expertise" name="expertise_title[]" :value="$expertise" :data="$experties"
                            id_key="expertise_id" value_key="expertise_title" hide_keys="true" />
                    </div>
                    <div>

                        <x-form.multiselect label="Designation" name="designation[]" :value="$designation"
                            :custom_data="$designations" />
                    </div>
                    <div>
                        <x-form.multiselect label="Experience" name="experience[]" :value="$experience" :custom_data="$experienceRanges" />
                    </div>
                    <div class="flex items-center justify-center gap-5 mt-7">
                        <button class="action-btn text-center justify-center">Filter Resource</button>
                        <a href="{{ route('people.index') }}" class="action-btn-secondary text-center justify-center w-20">
                            Reset
                        </a>
                    </div>
                </x-form.grid-3-col>

            </div>

        </form>

        <!-- Data Table with Sticky Header -->
        <div class="mt-6 border border-gray-200" style="max-height: 350px; overflow: auto;">
            <div>
                <table class="w-full" style="border-collapse: collapse; vertical-align: top;">
                    <thead style="position: sticky; top: 0; z-index: 50;">
                        <tr style="background-color: #00053C;">
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="width: 60px; background-color: #00053C; vertical-align: top;">S.No</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Expert ID</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Expert Name</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Nationality</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Industry</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Organization</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Certification</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Expertise</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Designation</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">Experience</th>
                            <th class="px-4 py-3 text-left text-sm font-semibold whitespace-nowrap text-white"
                                style="background-color: #00053C; vertical-align: top;">LinkedIn Profile</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($humanResource as $row)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-4 py-3 text-center whitespace-nowrap"
                                    style="width: 60px; vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ ($humanResource->currentPage() - 1) * $humanResource->perPage() + $loop->index + 1 }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $row->expert_id }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $row->name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        {{ isset($row->nationality) && !is_string($row->nationality) ? $row->nationality->name : $row->nationality }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row->industry->industry_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row->organization->organization_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <x-table-list :data="$row->certifications" id_key="certification_id"
                                            value_key="certification_title" />
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <x-table-list :data="$row->experties" id_key="" value_key="expertise_title" />
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row->designation }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row->experience }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <a style="color: blue; text-decoration: underline;"
                                            href="{{ $row->linkedin_profile }}" target="_blank">
                                            {{ $row->linkedin_profile }}
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="px-4 py-8 text-center text-gray-500">
                                    No expert resources found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
