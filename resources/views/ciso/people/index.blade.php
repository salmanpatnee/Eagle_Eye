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

        @if (!$filtersApplied)
            <div class="expert-empty-state">
                <div class="expert-empty-inner">
                    <div class="expert-empty-orb"></div>
                    <div class="expert-empty-orb expert-empty-orb--2"></div>

                    <div class="expert-empty-icon-wrap">
                        <svg class="expert-empty-icon" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="8" y="14" width="48" height="6" rx="3" fill="currentColor" opacity="1"/>
                            <rect x="16" y="29" width="32" height="6" rx="3" fill="currentColor" opacity="0.7"/>
                            <rect x="24" y="44" width="16" height="6" rx="3" fill="currentColor" opacity="0.4"/>
                            <circle cx="52" cy="52" r="10" fill="none" stroke="currentColor" stroke-width="3"/>
                            <line x1="59" y1="59" x2="64" y2="64" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                    </div>

                    <div class="expert-empty-text">
                        <h2 class="expert-empty-heading">Select filters to view expert resources</h2>
                        <p class="expert-empty-sub">Use nationality, industry, certification, expertise, or other filters above.</p>
                        <div class="expert-empty-chips">
                            <span class="expert-empty-chip">Nationality</span>
                            <span class="expert-empty-chip">Industry</span>
                            <span class="expert-empty-chip">Certification</span>
                            <span class="expert-empty-chip">Expertise</span>
                            <span class="expert-empty-chip">Designation</span>
                            <span class="expert-empty-chip">Experience</span>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .expert-empty-state {
                    position: relative;
                    margin: 1rem 1.5rem;
                    overflow: hidden;
                    border-radius: 0.75rem;
                    border: 1px solid #e5e7eb;
                    background: linear-gradient(160deg, #f8f9ff 0%, #eef0f8 50%, #f0f4ff 100%);
                    padding: 2rem;
                    text-align: center;
                }

                .expert-empty-inner {
                    position: relative;
                    z-index: 2;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: center;
                    gap: 1.25rem;
                }

                .expert-empty-orb { display: none; }
                .expert-empty-orb--2 { display: none; }

                .expert-empty-icon-wrap {
                    flex-shrink: 0;
                    width: 44px;
                    height: 44px;
                    border-radius: 10px;
                    background: #00053C;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    box-shadow: 0 4px 16px rgba(0, 5, 60, 0.2);
                }

                .expert-empty-icon {
                    width: 22px;
                    height: 22px;
                    color: #ffffff;
                }

                @keyframes expert-float {
                    0%, 100% { transform: translateY(0px); }
                    50%       { transform: translateY(-4px); }
                }

                .expert-empty-label { display: none; }

                .expert-empty-text {
                    text-align: left;
                }

                .expert-empty-heading {
                    font-size: 0.95rem;
                    font-weight: 700;
                    color: #00053C;
                    line-height: 1.3;
                    margin: 0 0 0.2rem;
                }

                .expert-empty-sub {
                    font-size: 0.8rem;
                    color: #6b7280;
                    line-height: 1.5;
                    margin: 0 0 0.6rem;
                }

                .expert-empty-chips {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 0.35rem;
                }

                .expert-empty-chip {
                    display: inline-block;
                    padding: 0.15rem 0.6rem;
                    border-radius: 9999px;
                    font-size: 0.7rem;
                    font-weight: 600;
                    letter-spacing: 0.02em;
                    border: 1px solid rgba(0, 5, 60, 0.18);
                    color: #00053C;
                    background: rgba(0, 5, 60, 0.04);
                }
            </style>
        @else

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

        @endif
    </div>
@endsection
