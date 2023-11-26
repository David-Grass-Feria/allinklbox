<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('videos.index')}}">
            <x-atoms.buttons.secondary type="button">{{__('Back')}}</x-atoms.buttons.secondary>
            </a>
        </x-slot>


<livewire:video.edit :record="$video" />



</x-molecules.card>

    </x-app-layout>
