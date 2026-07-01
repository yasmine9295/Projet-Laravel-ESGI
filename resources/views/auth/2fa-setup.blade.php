<x-app-layout>
    <div class="max-w-2xl mx-auto py-10">
        <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg p-6">
            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">{{ __('Two-Factor Authentication Setup') }}</h1>

            @if ($hasSecret)
                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Ton 2FA est activé. Scan le QR code ci-dessous avec ton application d\'authentification ou entre la clé secrète manuellement.') }}</p>

                @if ($qrCodeUrl)
                    <div class="mt-4">
                        <img src="{{ $qrCodeUrl }}" alt="{{ __('QR Code') }}">
                    </div>
                @endif

                <div class="mt-4">
                    <x-input-label for="secret" :value="__('Secret Key')" />
                    <x-text-input id="secret" class="block mt-1 w-full" type="text" value="{{ $secret }}" readonly />
                </div>
            @else
                <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Générer une clé secrète et scanner le code QR avec votre application d\'authentification.') }}</p>
            @endif

            <form method="POST" action="{{ route('2fa.setup.store') }}" class="mt-6">
                @csrf
                <x-primary-button>
                    {{ $hasSecret ? __('Regenerate 2FA Secret') : __('Generate 2FA Secret') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
