@extends('layouts.user')
@section('title', 'Users')
@section('content')
    <div>
        <x-table.action-wrapper title="User Details">
            <x-action.button label="View" route_name="users.index" />
            <x-action.button label="Edit" route_name="users.edit" route_param="{{ $user->id }}" />
        </x-table.action-wrapper>

        <div class="border-gray-100 border-t p-3">
            <x-info-row>
                <x-info-col label="Full Name">
                    {{ $user->first_name . ' ' . $user->last_name }}
                </x-info-col>

                <x-info-col label="User Name">
                    {{ $user->username }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Email">
                    {{ $user->email }}
                </x-info-col>

                <x-info-col label="Role">
                    {{ $user->role->role_name ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Payment Date">
                    {{ $user->userPayments->sortByDesc('paid_at')->first()?->paid_at?->format('d M Y') ?? '—' }}
                </x-info-col>

                <x-info-col label="Expires On">
                    {{ $user->payment_expires_at?->format('d M Y') ?? '—' }}
                </x-info-col>
            </x-info-row>

            <x-info-row>
                <x-info-col label="Payment Status">
                    @if ($user->payment_status === 'active' && $user->hasActivePayment())
                        <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Active</span>
                    @elseif ($user->payment_status === 'active')
                        <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-800">Expired</span>
                    @else
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">None</span>
                    @endif
                </x-info-col>
            </x-info-row>

        </div>
    </div>
@endsection
