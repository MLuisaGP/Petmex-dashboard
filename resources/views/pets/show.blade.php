<x-layout>
    <x-slot:heading>
        {{ $pet->name }}
    </x-slot:heading>
    {{ $pet->history }}
</x-layout>
