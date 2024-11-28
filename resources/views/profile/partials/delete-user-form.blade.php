<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Delete Account
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
        </p>
    </header>

    <button
        class="px-4 py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
        onclick="document.getElementById('confirmation-modal').classList.remove('hidden')"
    >
        Delete Account
    </button>

    <div id="confirmation-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white rounded-lg p-6 w-96">
            <h2 class="text-lg font-medium text-gray-900">
                Are you sure you want to delete your account?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4 border-gray-300 rounded-md shadow-sm"
                        placeholder="Password"
                    />
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end gap-4">
                    <button
                        type="button"
                        class="px-4 py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        onclick="document.getElementById('confirmation-modal').classList.add('hidden')"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="px-4 py-2 bg-red-600 text-white font-medium rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    >
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
