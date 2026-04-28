<section class="space-y-6" x-data="{ confirmingUserDeletion: {{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }} }">
    <header>
        <h2 class="text-xl font-bold text-red-600 dark:text-red-400">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-red-600/70 dark:text-red-400/70">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button @click="confirmingUserDeletion = true" class="bg-red-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-red-700 transition shadow-sm">
        {{ __('Delete Account') }}
    </button>

    <div x-show="confirmingUserDeletion" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm" x-transition.opacity>
        <div @click.away="confirmingUserDeletion = false" class="bg-soft dark:bg-darkbg rounded-2xl border border-red-500/30 p-6 max-w-lg w-full mx-4 shadow-2xl relative" x-transition.scale.90>
            <form method="post" action="{{ $destroyRoute ?? route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-2xl font-bold text-red-600 dark:text-red-400 mb-2">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="text-sm text-accent/80 dark:text-soft/80 mb-6">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div>
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="w-full bg-white dark:bg-black/20 border border-red-500/30 rounded-xl p-3 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 text-accent dark:text-soft transition" placeholder="{{ __('Password') }}" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
                </div>

                <div class="mt-8 flex justify-end gap-3">
                    <button type="button" @click="confirmingUserDeletion = false" class="px-5 py-2.5 rounded-lg text-sm font-medium border border-primary/20 hover:bg-primary/10 transition text-accent dark:text-soft">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="px-5 py-2.5 rounded-lg text-sm font-medium bg-red-600 text-white hover:bg-red-700 transition shadow-sm">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
