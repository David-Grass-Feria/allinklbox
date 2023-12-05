<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('mypasswords.index')}}">
            <x-atoms.buttons.secondary type="button">{{__('Back')}}</x-atoms.buttons.secondary>
            </a>
        </x-slot>


<livewire:my-password.create />



</x-molecules.card>

    </x-app-layout>
