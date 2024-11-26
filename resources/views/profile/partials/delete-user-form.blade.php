<script src="//unpkg.com/alpinejs" defer></script>

<section class="space-y-6" x-data="{ showModal: false }">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <!-- Updated Delete Account Button -->
    <button type="button" @click="showModal = true"
        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
        {{ __('Delete Account') }}
    </button>

    <!-- Delete Account Modal -->
    <div x-show="showModal" x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="bg-white w-full max-w-lg p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                @csrf
                @method('delete')

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <button type="button" @click="showModal = false"
                        class="bg-gray-300 text-black px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors ml-3">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
