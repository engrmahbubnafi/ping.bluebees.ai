<x-app-layout>
    @section('title')
        {{ __('Domain List') }} | {{ config('app.name', 'Domain Ping Monitor') }}
    @endsection
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domain List') }}
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
                                        Website Name
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Domain
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        IP Address
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Status
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Updated At
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border border-slate-300">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($domains as $key => $domain)
                                    @php
                                        // $ip = gethostbyname($domain->domain);
                                        $pin = exec("ping -c 2 $domain->domain", $output, $status);
                                    @endphp
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                {{ ++$key }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                {{ $domain->name }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                {{ $domain->domain }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                {{ $domain->ip_address }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 border border-slate-300">
                                                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-{{ $status ? 'red' : 'green' }}-600 bg-{{ $status ? 'gray' : 'green' }}-100 rounded-full">
                                                    {{ $status ? 'Offline' : 'Online' }}
                                                </span>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                {{ now() }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap border border-slate-300">
                                                <a href="{{ route('domains.edit', ['domain' => $domain]) }}">
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

