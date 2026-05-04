<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight text-gray-900">{{ __('Create your account') }}</h2>
            <p class="mt-1 text-sm text-gray-600">{{ __('Start organizing your tasks in seconds.') }}</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="mt-1 block w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="mt-1 block w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="mt-1 block w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-md bg-[#e36d9b] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#d85d8d] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#e36d9b] focus-visible:ring-offset-2 transition">
                {{ __('Create account') }}
            </button>
        </form>

        <p class="text-center text-sm text-gray-600">
            {{ __('Already registered?') }}
            <a href="{{ route('login') }}" class="font-medium text-[#e36d9b] hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-[#e36d9b] focus:ring-offset-2">
                {{ __('Log in') }}
            </a>
        </p>
    </div>
</x-guest-layout>
