@extends('layouts.hr')
@section('title', 'HR Experts')

@section('content')
    <div>
        <x-table.action-wrapper title="Expert Details">
            <x-action.button label="View" route_name="hr-experts.index" />
            <x-action.button label="Edit" route_name="hr-experts.edit" :route_param="$humanResource->id" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3 space-y-4">
             <x-info-row>
                <x-info-col label="Expert ID">
                    {{ $humanResource->expert_id }}
                </x-info-col>
                <x-info-col label="Name">
                    {{ $humanResource->name }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Organization">
                    {{ $humanResource->organization->organization_name ?? '' }}
                </x-info-col>
                <x-info-col label="Industry">
                    {{ $humanResource->industry->industry_name ?? '' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Nationality">
                    {{ $humanResource->nationality->name ?? '' }}
                </x-info-col>
                <x-info-col label="Designation">
                    {{ $humanResource->designation->designation_name ?? $humanResource->designation }}
                </x-info-col>
            </x-info-row>

            {{-- <x-info-row>
                <x-info-col label="Email">
                    {{ $humanResource->email }}
                </x-info-col>
                <x-info-col label="Phone">
                    {{ $humanResource->phone }}
                </x-info-col>
            </x-info-row> --}}

            <x-info-row>
                 <x-info-col label="Experience">
                    {{ $humanResource->experience }}
                </x-info-col>
                 <x-info-col label="LinkedIn">
                    @if($humanResource->linkedin_profile)
                        <a href="{{ $humanResource->linkedin_profile }}" target="_blank" class="text-blue-600 hover:underline">{{ $humanResource->linkedin_profile }}</a>
                    @endif
                </x-info-col>
            </x-info-row>

            <x-info-col-lg label="Certifications">
                @if($humanResource->certifications->count())
                    <div class="flex flex-wrap gap-2">
                        @foreach($humanResource->certifications as $cert)
                            <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $cert->certification_title }}</span>
                        @endforeach
                    </div>
                @else
                    -
                @endif
            </x-info-col-lg>

            <x-info-col-lg label="Expertise">
                @if($humanResource->experties->count())
                     <div class="flex flex-wrap gap-2">
                        @foreach($humanResource->experties as $exp)
                            <span class="inline-block bg-gray-100 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $exp->expertise_title }}</span>
                        @endforeach
                    </div>
                @else
                    -
                @endif
            </x-info-col-lg>

        </div>
    </div>
@endsection
