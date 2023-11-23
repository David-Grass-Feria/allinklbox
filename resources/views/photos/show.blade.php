<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('photos.index')}}">
            <x-atoms.buttons.secondary type="button">{{__('Back')}}</x-atoms.buttons.secondary>
            </a>
        </x-slot>


<livewire:photo.show :record="$photo" lazy />



</x-molecules.card>

    </x-app-layout>
