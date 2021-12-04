<x-app-layout title="Profile">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Profil
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            {{ __('Profil Bilgileri') }}
        </h4>

        @livewire('profile.update-profile-information-form')

        <x-section-border />
        @can('confirmedFarmer')
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            {{ __('Çiftçilik Onayı') }}
        </h4>
        <div class="flex bg-white shadow px-3 py-4">
            <form action="/farmers/licence" method="POST" enctype="multipart/form-data">
                @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Çifçilik Belgesi</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
                form-input" name="file" type="file" />
                <button class="px-4 py-2 mt-2 text-sm font-medium leading-5 text-white transition-colors duration-150
            bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
            focus:outline-none focus:shadow-outline-purple" id="farmerLisanceSubmitButton">
                    Gönder
                </button>
            </label>
            </form>
        </div>
        <x-section-border />
        @endcan
        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Update Password') }}
            </h4>

            @livewire('profile.update-password-form')
        </div>

        {{--@if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <x-section-border />

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Two Factor Authentication') }}
            </h4>

            @livewire('profile.two-factor-authentication-form')
        </div>
        @endif--}}

        <x-section-border />

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Browser Sessions') }}
            </h4>

            @livewire('profile.logout-other-browser-sessions-form')
        </div>

        <x-section-border />

        <div class="mt-10 sm:mt-0">
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                {{ __('Delete Account') }}
            </h4>

            @livewire('profile.delete-user-form')
        </div>

    </div>
</x-app-layout>
