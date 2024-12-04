<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="px-12 py-3">
        <div class="flex flex-wrap mx-auto space-y-6">
            <div class="flex flex-wrap justify-center w-full">
            <div class=" mx-4 p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="mx-4 p-4 sm:p-8 bg-white  shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            </div>

            <div class=" flex justify-center w-full py-4 ">
                <div class="w-1/2 py-2 bg-white flex justify-center shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
