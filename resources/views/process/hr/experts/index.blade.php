@extends('layouts.hr')
@section('title', 'HR Experts')

@section('content')
    <div>
        <x-table.action-wrapper title="Expert Resources">
            <x-action.button label="Add Expert" route_name="hr-experts.create" />
        </x-table.action-wrapper>

        {{-- <form action="{{ route('hr-experts.index') }}" method="GET" class="mb-6">
            <div class="space-y-6 border-t border-gray-100 p-2 sm:p-6 bg-white rounded-lg shadow-sm">
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Nationality" name="nationality[]" :value="$nationality"
                            :custom_data="$nationalities" />
                    </div>
                    <div>
                        <x-form.multiselect label="Industry" name="industry_name[]" :value="$industry"
                            :data="$industries" id_key="industry_id" value_key="industry_name" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Organization" name="organization_name[]"
                            :value="$organization" :data="$organizations" id_key="organization_id" value_key="organization_name"
                            hide_keys="true" />
                    </div>
                </x-form.grid-3-col>
                <x-form.grid-3-col>
                    <div>
                        <x-form.multiselect label="Certification" name="certification_title[]"
                            :value="$certification" :data="$certifications" id_key="certification_id" value_key="certification_title"
                            hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Expertise" name="expertise_title[]" :value="$expertise"
                            :data="$experties" id_key="expertise_id" value_key="expertise_title" hide_keys="true" />
                    </div>
                    <div>
                        <x-form.multiselect label="Designation" name="designation[]" :value="$designation"
                            :custom_data="$designations" />
                    </div>
                </x-form.grid-3-col>

                <div class="flex items-center justify-center gap-5 border-t border-gray-100 pt-4">
                    <button class="action-btn text-center justify-center">Filter Resource</button>
                    <a href="{{ route('hr-experts.index') }}" class="action-btn-secondary text-center justify-center w-20 flex items-center">Reset</a>
                </div>
            </div>
        </form> --}}

        {{-- <x-table.table> --}}
        <x-table.table-sticky>
            {{-- <x-table.thead> --}}
            <x-table.thead-sticky>
                <x-table.th label="S.No" />
                <x-table.th label="Name" />
                <x-table.th label="Organization" />
                <x-table.th label="Industry" />
                <x-table.th label="Designation" />
                <x-table.th label="Action" />
            </x-table.thead-sticky>
            {{-- </x-table.thead> --}}
            <x-table.tbody>
                @foreach ($humanResource as $expert)
                    <tr>
                        <x-table.td> <x-table.serial :loop="$loop" :paginator="$humanResource" /></x-table.td>
                        <x-table.td>{{ $expert->name }}</x-table.td>
                        <x-table.td>{{ $expert->organization->organization_name ?? '' }}</x-table.td>
                        <x-table.td>{{ $expert->industry->industry_name ?? '' }}</x-table.td>
                        <x-table.td>{{ $expert->designation->name ?? $expert->designation }}</x-table.td>

                        <x-table.td action_col="true">
                            <x-action.view route_name="hr-experts.show" param="{{ $expert->id }}" />
                            <x-action.edit route_name="hr-experts.edit" param="{{ $expert->id }}" />
                            <x-action.delete route_name="hr-experts.destroy" param="{{ $expert->id }}" />
                        </x-table.td>
                    </tr>
                @endforeach
            </x-table.tbody>
        </x-table.table-sticky>
        {{-- </x-table.table> --}}

        <x-pagination>
            {{ $humanResource->links() }}
        </x-pagination>

    </div>
@endsection
