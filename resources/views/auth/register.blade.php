<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="width: 23rem;">
        @csrf

        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
      

        <!-- Name -->
        {{-- <x-md-input name="name" label="nom" type="text"/> --}}

       
         <!-- prenom -->
         <x-md-input name="prenom" label="Prenom" type="text"/>

        <!-- Email Address -->
        <x-md-input name="email" label="Email" type="text"/>


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
