@extends('layouts.hr')
@section('title', 'Certifications')
@section('content')
    <div>
        <x-table.action-wrapper title="{{ $certification?->certification_id ? 'Update' : 'New' }} Certification">
            <x-action.button label="View" route_name="certifications.index" />
        </x-table.action-wrapper>

        <form action="{{ isset($certification) ? route('certifications.update', $certification->id) : route('certifications.store') }}" method="POST">
            @csrf
            @if (isset($certification))
                @method('PUT')
            @endif
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Certification ID" name="certification_id" required="true" :readonly="$certification?->certification_id"
                            placeholder="Enter Certification ID" :value="$certification?->certification_id" />
                    </div>
                    <div>
                        <x-form.field label="Certification Title" name="certification_title" required="true"
                            placeholder="Enter Certification Title" :value="$certification?->certification_title" />
                    </div>
                </x-form.grid-col>
                <x-form.grid-col>
                    <div>
                        <x-form.field label="Institute" name="institute"
                            placeholder="Enter Institute" :value="$certification?->institute" />
                    </div>
                    <div>

                    </div>
                </x-form.grid-col>

                <div class="flex justify-end">
                    <x-form.submit label="Certification" :isUpdate="$certification?->certification_id" />
                </div>
            </div>
        </form>

    </div>
@endsection