<x-app-layout>
    @section('title')
        {{ __('Edit Recipient') }} | {{ config('app.name', 'Domain Ping Monitor') }}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Recipient: ' . $recipient->name ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('recipients.update', ['recipient' => $recipient]) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="mt-4">
                            <x-label for="name" :value="__('Recipient Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $recipient->name)" required autofocus />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Recipient Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $recipient->email)" required />
                        </div>

                        <!-- Mobile -->
                        <div class="mt-4">
                            <x-label for="mobile" :value="__('Recipient Mobile')" />

                            <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile', $recipient->mobile)" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('recipients.update', ['recipient' => $recipient]) }}">
                                <x-button type="submit" class="ml-4">
                                    {{ __('Update') }}
                                </x-button>
                            </a>
                        </div>
                    </form>
                    <form method="POST" action="{{ route('recipients.destroy', ['recipient' => $recipient]) }}">
                        @csrf 
                        @method('DELETE')

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('recipients.destroy', ['recipient' => $recipient]) }}">
                                <x-button type="submit" class="ml-4">
                                    {{ __('Delete') }}
                                </x-button>
                            </a>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('recipients.change_status', ['recipient' => $recipient]) }}">
                        @csrf 
                        @method('PATCH')

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('recipients.change_status', ['recipient' => $recipient]) }}">
                                <x-button type="submit" class="ml-4">
                                    {{ __('Change Status') }}
                                </x-button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

