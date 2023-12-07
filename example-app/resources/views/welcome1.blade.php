<x-app-layout>
    @if ($user)
        <h1> {{$user->name}} </h1>
    @endif

    <x-slot name="header">
        My Header
    </x-slot>

    <x-slot name="slot">
        <h2> This is slot content </h2>
    </x-slot>

    <x-slot name="slot2">
        <h2> This is slot 2 content </h2>
    </x-slot>
</x-app-layout>
