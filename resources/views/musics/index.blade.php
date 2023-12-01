<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('musics.create')}}">
            <x-atoms.buttons.primary type="button">{{__('Create')}}</x-atoms.buttons.primary>
            </a>
        </x-slot>
                <livewire:music.index model="\App\Models\Music"/>

            </x-molecules.card>
</x-app-layout>
