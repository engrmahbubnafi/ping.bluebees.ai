<x-app-layout>
    @section('title')
        {{ __('Edit Domain') }} | {{ config('app.name', 'Domain Ping Monitor') }}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Domain: ' . $domain->domain ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('domains.update', ['domain' => $domain]) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Website Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $domain->name)" required autofocus />
                        </div>

                        <!-- Domain -->
                        <div class="mt-4">
                            <x-label for="domain" :value="__('Domain')" />

                            <x-input id="domain" class="block mt-1 w-full" type="text" name="domain" :value="old('domain', $domain->domain)" required />
                        </div>

                        <!-- IP Address -->
                        <div class="mt-4">
                            <x-label for="ip_address" :value="__('IP Address')" />

                            <x-input id="ip_address" class="block mt-1 w-full" type="text" name="ip_address" :value="old('ip_address', $domain->ip_address)" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $domain->description)" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('domains.update', ['domain' => $domain]) }}">
                                <x-button type="submit" class="ml-4">
                                    {{ __('Update') }}
                                </x-button>
                            </a>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('domains.destroy', ['domain' => $domain]) }}">
                        @csrf 
                        @method('DELETE')

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('domains.destroy', ['domain' => $domain]) }}">
                                <x-button type="submit" class="ml-4">
                                    {{ __('Delete') }}
                                </x-button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>