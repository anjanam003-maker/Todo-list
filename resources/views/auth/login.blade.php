<x-guest-layout>
    <div class="space-y-6">
        <div>
            <h2 class="text-2xl font-semibold tracking-tight text-gray-900">{{ __('Welcome back') }}</h2>
            <p class="mt-1 text-sm text-gray-600">{{ __('Log in to manage your tasks.') }}</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" />
                    @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-[#e36d9b] hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-[#e36d9b] focus:ring-offset-2" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                </div>

                <x-text-input id="password" class="mt-1 block w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center gap-2">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#e36d9b] shadow-sm focus:ring-[#e36d9b]" name="remember">
                    <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-md bg-[#e36d9b] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#d85d8d] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#e36d9b] focus-visible:ring-offset-2 transition">
                {{ __('Log in') }}
            </button>
        </form>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-600">
                {{ __('New here?') }}
                <a href="{{ route('register') }}" class="font-medium text-[#e36d9b] hover:underline rounded-md focus:outline-none focus:ring-2 focus:ring-[#e36d9b] focus:ring-offset-2">
                    {{ __('Create an account') }}
                </a>
            </p>
        @endif
    </div>
</x-guest-layout>
