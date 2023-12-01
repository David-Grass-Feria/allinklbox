<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('musiclists.create')}}">
            <x-atoms.buttons.primary type="button">{{__('Create')}}</x-atoms.buttons.primary>
            </a>
        </x-slot>
                <livewire:music-list.index model="\App\Models\MusicList"/>

            </x-molecules.card>
</x-app-layout>
