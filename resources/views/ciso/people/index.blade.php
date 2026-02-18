@extends('layouts.app-full')
@section('title', 'Expert Resources')
@section('content')
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

        {{-- Mobile Card View (shown below md breakpoint) --}}
        <div class="mt-6 md:hidden space-y-4 px-4 sm:px-6">
            @forelse ($humanResource as $row)
                <div class="border border-gray-200 rounded-lg p-4 bg-white shadow-sm">
                    {{-- Card header: serial number + expert name + LinkedIn icon button --}}
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <span class="text-xs font-medium text-gray-600 uppercase tracking-wide">
                                #{{ ($humanResource->currentPage() - 1) * $humanResource->perPage() + $loop->index + 1 }}
                            </span>
                            <h3 class="text-sm font-semibold text-gray-900 mt-0.5">{{ $row?->name }}</h3>
                            <span class="text-xs text-gray-500">{{ $row?->expert_id }}</span>
                        </div>
                        @if ($row?->linkedin_profile)
                            <a href="{{ $row?->linkedin_profile }}" target="_blank" rel="noopener noreferrer"
                                class="flex-shrink-0 ml-2 text-blue-600 hover:text-blue-800 p-2 rounded-md hover:bg-blue-50"
                                aria-label="LinkedIn profile for {{ $row?->name }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                                </svg>
                            </a>
                        @endif
                    </div>

                    {{-- 2-column grid of labeled key/value pairs --}}
                    <dl class="grid grid-cols-2 gap-x-4 gap-y-2 text-sm">
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide">Nationality</dt>
                            <dd class="mt-0.5 text-gray-700">
                                {{ isset($row?->nationality) && !is_string($row?->nationality) ? $row?->nationality->name : $row?->nationality }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide">Industry</dt>
                            <dd class="mt-0.5 text-gray-700">{{ $row?->industry?->industry_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide">Organization</dt>
                            <dd class="mt-0.5 text-gray-700">{{ $row?->organization?->organization_name }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide">Designation</dt>
                            <dd class="mt-0.5 text-gray-700">{{ $row?->designation }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-medium uppercase tracking-wide">Experience</dt>
                            <dd class="mt-0.5 text-gray-700">{{ $row?->experience }}</dd>
                        </div>
                    </dl>

                    {{-- Multi-value fields in a separated section --}}
                    <div class="mt-3 pt-3 border-t border-gray-100 grid grid-cols-1 gap-3 sm:grid-cols-2 text-sm text-gray-700">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide mb-1" style="color: #000000;">Certification</p>
                            <x-table-list :data="$row?->certifications" id_key="certification_id"
                                value_key="certification_title" />
                        </div>
                        <div>
                            <p class="text-xs font-medium uppercase tracking-wide mb-1" style="color: #000000;">Expertise</p>
                            <x-table-list :data="$row?->experties" id_key="" value_key="expertise_title" />
                        </div>
                    </div>
                </div>
            @empty
                <div class="border border-gray-200 rounded-lg p-6 text-center text-gray-500">
                    No expert resources found
                </div>
            @endforelse
        </div>

        {{-- Desktop Table View (shown at md breakpoint and above) --}}
        <div class="mt-6 border border-gray-200 overflow-auto hidden md:block" style="max-height: 450px;">
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
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $row?->expert_id }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">{{ $row?->name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        {{ isset($row?->nationality) && !is_string($row?->nationality) ? $row?->nationality->name : $row?->nationality }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row?->industry?->industry_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row?->organization?->organization_name }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <x-table-list :data="$row?->certifications" id_key="certification_id"
                                            value_key="certification_title" />
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <x-table-list :data="$row?->experties" id_key="" value_key="expertise_title" />
                                    </span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row?->designation }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span
                                        class="block font-medium text-gray-700 text-theme-sm">{{ $row?->experience }}</span>
                                </td>
                                <td class="px-4 py-3 whitespace-nowrap" style="vertical-align: top;">
                                    <span class="block font-medium text-gray-700 text-theme-sm">
                                        <a style="color: blue; text-decoration: underline;"
                                            href="{{ $row?->linkedin_profile }}" target="_blank">
                                            {{ $row?->linkedin_profile }}
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
        </div>

        <x-pagination>
            {{ $humanResource->links() }}
        </x-pagination>
    </div>
@endsection
