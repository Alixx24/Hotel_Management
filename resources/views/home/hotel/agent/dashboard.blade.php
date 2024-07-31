<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agent Dashboard') }} Welcome {{ $agentInfo[0]->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <p>Email: {{ $agentInfo[0]->email }}</p>
                    <p>name: {{ $agentInfo[0]->name }}</p>
                    <p>Number Rooms: {{ $agentInfo[0]->number_rooms }}</p>
                    <p>Region: {{ $agentInfo[0]->region }}</p>
                    <p>Country: {{ $agentInfo[0]->country }}</p>
                    <p>City: {{ $agentInfo[0]->city }}</p>
                    <p>Star: {{ $agentInfo[0]->star }}</p>
                </div>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
