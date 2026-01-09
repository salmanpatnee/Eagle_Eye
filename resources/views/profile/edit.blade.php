@extends('layouts.profile')

@section('title', 'Update Profile')

@section('content')
    <div class="max-w-4xl mx-auto">
        <x-table.action-wrapper title="Update Profile">
            <x-action.button label="Back to CISO 360" route_name="vciso" />
        </x-table.action-wrapper>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6">
                @if(isset($show_password_update) && $show_password_update)
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    <strong>Password Update Required:</strong> Please update your password to continue using the system.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <x-form.grid-col>
                    <div>
                        <x-form.field label="First Name" name="first_name" required="true"
                            placeholder="Enter First Name" :value="old('first_name', $user->first_name)" />
                        @error('first_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-form.field label="Last Name" name="last_name" required="true"
                            placeholder="Enter Last Name" :value="old('last_name', $user->last_name)" />
                        @error('last_name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </x-form.grid-col>

                <x-form.grid-col>
                    <div>
                        <x-form.field label="Username" name="username" required="true"
                            placeholder="Enter Username" :value="old('username', $user->username)" />
                        @error('username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <x-form.field type="email" label="Email" name="email"
                            required="true" placeholder="Enter Email" :value="$user->email" readonly="true" />
                        <p class="text-red-600 text-sm mt-1">Cannot be changed</p>
                    </div>
                </x-form.grid-col>

                @if(isset($show_password_update) && $show_password_update)
                    <!-- Password update required fields -->
                    <div class="pt-6">
                        {{-- <h3 class="text-lg font-medium text-gray-900 mb-4 mt-4">Password Update Required</h3> --}}

                        <x-form.grid-col>
                            <div>
                                <x-form.label label="Current Password" for="current_password" required="true" />
                                <div class="relative mb-6">
                                    <input type="password" id="current_password" name="current_password"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500 pr-10"
                                        placeholder="Enter Current Password" required>
                                    <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 pr-1 flex items-center text-gray-500 hover:text-gray-700"
                                        onclick="togglePasswordVisibility('current_password')">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @error('current_password')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </x-form.grid-col>

                        <x-form.grid-col>
                            <div>
                                <x-form.label label="New Password" for="password" required="true" />
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500 pr-10"
                                        placeholder="Enter New Password" required>
                                    <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 pr-1 flex items-center text-gray-500 hover:text-gray-700"
                                        onclick="togglePasswordVisibility('password')">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @if ($errors->has('password'))
                                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('password') }}</p>
                                @else
                                    <p class="mt-1 text-sm text-gray-500">Password must be at least 8 characters and contain at least one special character and one number.</p>
                                @endif
                            </div>
                            <div>
                                <x-form.label label="Confirm New Password" for="password_confirmation" required="true" />
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500 pr-10"
                                        placeholder="Confirm New Password" required>
                                    <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 pr-1 flex items-center text-gray-500 hover:text-gray-700"
                                        onclick="togglePasswordVisibility('password_confirmation')">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <p class="text-red-600 text-sm mt-1">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                            </div>
                        </x-form.grid-col>
                    </div>
                @else
                    <!-- Regular password field (optional) - now with confirmation always visible -->
                    <x-form.grid-col>
                        <div>
                            <x-form.label label="New Password" for="optional_password" />
                            <div class="relative">
                                <input type="password" name="password"
                                    placeholder="Enter New Password (leave blank to keep current)" id="optional_password"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500 pr-10"
                                    value="{{ old('password') }}">
                                <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 pr-1 flex items-center text-gray-500 hover:text-gray-700"
                                    onclick="togglePasswordVisibility('optional_password')">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <x-form.label label="Confirm Password" for="optional_password_confirmation" />
                            <div class="relative">
                                <input type="password" name="password_confirmation"
                                    placeholder="Confirm New Password" id="optional_password_confirmation"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500 pr-10"
                                    value="{{ old('password_confirmation') }}">
                                <button type="button" class="absolute top-1/2 right-3 -translate-y-1/2 pr-1 flex items-center text-gray-500 hover:text-gray-700"
                                    onclick="togglePasswordVisibility('optional_password_confirmation')">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            @error('password_confirmation')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </x-form.grid-col>
                    <x-form.grid-col>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="role">
                                Role
                            </label>
                            <input
                                type="text"
                                id="role"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-brand-500 focus:border-brand-500"
                                value="{{ $user->role->role_name ?? 'N/A' }}"
                                readonly
                            />
                            <p class="text-red-600 text-sm mt-1">Cannot be changed</p>
                        </div>
                    </x-form.grid-col>
                @endif

                <div class="flex justify-end">
                    <x-form.submit label="Update Profile"  isUpdate="1" />
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    if (!field) return;

    const isPassword = field.getAttribute('type') === 'password';
    field.setAttribute('type', isPassword ? 'text' : 'password');

    // Find the button - it should be in the parent div with relative positioning
    const wrapper = field.parentElement;
    const button = wrapper ? wrapper.querySelector('button[type="button"]') : null;

    if (button) {
        const svg = button.querySelector('svg');
        const path = svg ? svg.querySelector('path') : null;

        if (path) {
            if (!isPassword) {
                // Change to eye-slash icon (closed eye)
                path.setAttribute('d', 'M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M21 12a9 9 0 01-9 9m4.5-1.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm0 0c0-.668.295-1.28 1.025-1.875M12 12a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z');
            } else {
                // Change back to eye icon (open eye)
                path.setAttribute('d', 'M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z M15 12a3 3 0 11-6 0 3 3 0 016 0z');
            }
        }
    }
}

// No JavaScript needed for conditional display as confirm password field should always be visible
</script>
@endpush