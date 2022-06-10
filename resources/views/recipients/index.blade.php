<x-app-layout>
    @section('title')
        {{ __('Recipient List') }} | {{ config('app.name', 'Domain Ping Monitor') }}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipient List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-hidden">
                        <table class="border-collapse border border-slate-400 min-w-full text-center">                            
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        #
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Name
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Email
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Phone
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Status
                                    </th>

                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($recipients as $key => $recipient)
                                    <tr class="border-b">
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            {{ ++$key }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            {{ $recipient->name }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            {{ $recipient->email }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            {{ $recipient->mobile }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            {{ $recipient->status ? 'Active' : 'Inactive' }}
                                        </td>

                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                            <a href="{{ route('recipients.edit', ['recipient' => $recipient]) }}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>                            
                                @empty
                                    <tr class="border-b">
                                        <td colspan="6" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border-r">No Data Found</td>
                                    </tr>                                
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

