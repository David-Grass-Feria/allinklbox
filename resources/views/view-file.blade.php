<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('photos.edit',$record)}}">
            <x-atoms.buttons.secondary type="button">{{__('Back')}}</x-atoms.buttons.secondary>
            </a>
        </x-slot>


        <img src="{{ $imageUrl }}" alt="Bild" />



</x-molecules.card>

    </x-app-layout>
