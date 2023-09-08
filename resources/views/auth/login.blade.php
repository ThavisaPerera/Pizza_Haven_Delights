<x-guest-layout >
    <x-authentication-card >
        <x-slot name="logo">
            <div class="logo-container" style=" display: inline-flex; align-items: center;">
                <img width="90" src="images/cat-1-1.png" alt="Logo">
                <span class="logo-text" style="margin-left: 10px; font-weight: bold; font-size: 32px; font-family: 'Playfair Display', serif;">Pizza Haven Delight</span>
            </div>
        </x-slot>

        <div>
            <h3 style="font-size: 24px; color: #000000; font-weight: bold; align-items: center;">Log-In</h3>
        </div><br>
        
        <x-validation-errors class="mb-4"/>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <x-label for="email" value="{{ __('Email') }}" style=" color: #000000; font-weight: bold;"/>
                <x-input id="email" class="block mt-1 w-full custom-input" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            </div>
            

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" style=" color: #000000;  font-weight: bold;"/>
                <x-input id="password" class="block mt-1 w-full custom-input" type="password" name="password" autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4 login-button">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<style>

    .custom-input {
        border: 2px solid #ccc;
        padding: 10px;
        border-radius: 5px;
    }

    .login-button {
        background-color: #ff6f00;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
