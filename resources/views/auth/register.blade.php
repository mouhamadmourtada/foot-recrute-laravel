<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="width: 23rem;">
        @csrf

        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
      

        <!-- Name -->
        <x-md-input name="name" label="nom" type="text"/>

        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> --}}

        <!-- Email Address -->
        <x-md-input name="email" label="Email" type="text"/>

        {{-- <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        <x-md-input name="password" label="Mot de passe" type="password"/>

       

        <!-- Confirm Password -->
        <x-md-input name="password_confirmation" label="Confirmer mot de passe" type="password"/>

        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
