<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Entrer le code de votre application d\'authentification pour compléter la connexion.') }}
    </div>

    <form method="POST" action="{{ route('2fa.verify') }}">
        @csrf

        <div>
            <x-input-label for="one_time_password" :value="__('Authentication Code')" />
            <x-text-input id="one_time_password" class="block mt-1 w-full" type="text" name="one_time_password" required autofocus autocomplete="one-time-code" />
            <x-input-error :messages="$errors->get('one_time_password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Verify') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
