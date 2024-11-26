<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information Update Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')

                    @if (session('status') === 'profile-updated')
                        <p class="text-green-600 text-sm mt-4">
                            {{ __('Your profile has been updated successfully!') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Password Update Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')

                    @if (session('status') === 'password-updated')
                        <p class="text-green-600 text-sm mt-4">
                            {{ __('Password updated successfully!') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- Delete User Account Section -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')

                    @if (session('status') === 'account-deleted')
                        <p class="text-green-600 text-sm mt-4">
                            {{ __('Your account has been deleted successfully.') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
