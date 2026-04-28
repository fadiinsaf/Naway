<section>
    <header>
        <h2 class="text-xl font-bold text-accent dark:text-soft">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-accent/70 dark:text-soft/70">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-primary/10">
            <button type="submit" class="bg-primary text-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                {{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-medium text-green-600 dark:text-green-400"
                ><i class="fa-solid fa-check-circle mr-1"></i> {{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
