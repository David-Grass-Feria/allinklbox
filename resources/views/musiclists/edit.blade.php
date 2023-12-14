<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('musiclists.index')}}">
            <x-atoms.buttons.secondary type="button">{{__('Back')}}</x-atoms.buttons.secondary>
            </a>
        </x-slot>


<livewire:music-list.edit :record="$musicList" />



</x-molecules.card>

    </x-app-layout>
