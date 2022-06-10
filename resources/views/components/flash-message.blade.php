@props(['message'])

<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> 
        <div
            class="bg-indigo-50 text-red-600 rounded-lg shadow-md p-6 pr-10"
            style="min-width: 240px"
            >  
            @if ($message)
                <div class="flex items-center">
                    {{ $message }}
                </div>
            @endif
        </div>
    </div>
</div>