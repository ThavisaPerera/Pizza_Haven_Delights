<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="logo-container" style=" display: inline-flex; align-items: center;">
                <img width="90" src="images/cat-1-1.png" alt="Logo">
                <span class="logo-text" style="margin-left: 10px; font-weight: bold; font-size: 32px; font-family: 'Playfair Display', serif;">Pizza Haven Delight</span>
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-center mt-4" style=" background-color: #ff6f00; color: white; border: none; paddigit remote add origin https://github.com/ThavisaPerera/Pizza_Haven_Delights.gitng: 10px 20px; border-radius: 5px; cursor: pointer;">
                <x-button id="fog-button">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
