<section>
    <header>
        <h2 class="text-xl font-bold text-accent dark:text-soft">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-accent/70 dark:text-soft/70">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ $updateRoute ?? route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex items-center gap-6">
            <div class="shrink-0">
                @if($user->profile_image)
                    <img src="{{ Storage::url($user->profile_image) }}" alt="Profile Picture" class="w-20 h-20 rounded-full object-cover border border-primary/30 shadow-sm">
                @else
                    <div class="w-20 h-20 rounded-full bg-primary/10 border border-primary/30 flex items-center justify-center shadow-sm">
                        <i class="fa-solid fa-user text-primary text-3xl"></i>
                    </div>
                @endif
            </div>
            <div class="flex-1">
                <label for="profile_image" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Profile Picture') }}</label>
                <input id="profile_image" name="profile_image" type="file" accept="image/*" class="w-full text-sm text-accent/70 dark:text-soft/70 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-soft hover:file:bg-accent transition cursor-pointer" />
                <x-input-error class="mt-2 text-red-500" :messages="$errors->get('profile_image')" />
            </div>
        </div>

        <div>
            <label for="name" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-accent/80 dark:text-soft/80">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-primary hover:text-accent dark:hover:text-soft rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <label for="speciality" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Speciality') }}</label>
            <input id="speciality" name="speciality" type="text" 
                class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition disabled:opacity-50" 
                value="{{ $user->role === 'admin' ? 'admin' : old('speciality', $user->speciality) }}" 
                {{ $user->role === 'admin' ? 'disabled' : '' }} />
            
            @if($user->role === 'admin')
                <input type="hidden" name="speciality" value="admin">
                <p class="text-xs text-primary mt-1">Admin speciality cannot be changed.</p>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('speciality')" />
        </div>

        <div>
            <label for="country" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('Country') }}</label>
            <input id="country" name="country" type="text" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" value="{{ old('country', $user->country) }}" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>

        <div>
            <label for="city" class="block font-medium text-sm text-accent/80 dark:text-soft/80 mb-1">{{ __('City') }}</label>
            <input id="city" name="city" type="text" class="w-full bg-white dark:bg-black/20 border border-primary/30 rounded-xl p-3 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-accent dark:text-soft transition" value="{{ old('city', $user->city) }}" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div class="flex items-center gap-4 pt-4 border-t border-primary/10">
            <button type="submit" class="bg-primary text-soft px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-accent transition shadow-sm">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
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
