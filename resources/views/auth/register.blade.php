<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="logo-container" style=" display: inline-flex; align-items: center;">
                <img width="90" src="images/cat-1-1.png" alt="Logo">
                <span class="logo-text" style="margin-left: 10px; font-weight: bold; font-size: 32px; font-family: 'Playfair Display', serif;">Pizza Haven Delight</span>
            </div>
        </x-slot>

        <div>
            <h3 style="font-size: 24px; color: #000000; font-weight: bold; align-items: center;">Register</h3>
        </div><br>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div>
                <x-label for="name" value="{{ __('Name') }}" style=" color: #000000; font-weight: bold;"/>
                <x-input id="name" class="block mt-1 w-full custom-input" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" style=" color: #000000; font-weight: bold;" />
                <x-input id="email" class="block mt-1 w-full custom-input" type="text" name="email" :value="old('email')"  autocomplete="username" /> 
            </div>

            <div class="mt-4 ">
                <x-label for="phone" value="{{ __('Phone') }}" style=" color: #000000; font-weight: bold;" />
                <x-input id="phone" class="block mt-1 w-full custom-input " type="tel" name="phone" :value="old('phone')" autocomplete="phone" />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Address') }}" style=" color: #000000; font-weight: bold;" />
                <x-input id="address" class="block mt-1 w-full custom-input" type="text" name="address" :value="old('address')" autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" style=" color: #000000; font-weight: bold;" />
                <x-input id="password" class="block mt-1 w-full custom-input" type="password" name="password" autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" style=" color: #000000; font-weight: bold;" />
                <x-input id="password_confirmation" class="block mt-1 w-full custom-input" type="password" name="password_confirmation" autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 reg-button">
                    {{ __('Register') }}
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

    .reg-button {
        background-color: #ff6f00;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    
</style>
