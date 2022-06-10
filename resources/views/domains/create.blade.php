<x-app-layout>
    @section('title')
        {{ __('Add Domain') }} | {{ config('app.name', 'Domain Ping Monitor') }}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Domain') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('domains.store') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Website Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Domain -->
                        <div class="mt-4">
                            <x-label for="domain" :value="__('Domain')" />

                            <x-input id="domain" class="block mt-1 w-full" type="text" name="domain" :value="old('domain')" required />
                        </div>

                        <!-- IP Address -->
                        <div class="mt-4">
                            <x-label for="ip_address" :value="__('IP Address')" />

                            <x-input id="ip_address" class="block mt-1 w-full" type="text" name="ip_address" :value="old('ip_address')" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

