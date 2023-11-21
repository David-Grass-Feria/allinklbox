<x-app-layout>

<x-molecules.card>
    <x-slot name="header">
        <a href="{{route('photos.create')}}">
        <x-atoms.buttons.primary type="button">{{__('Create')}}</x-atoms.buttons.primary>
        </a>
    </x-slot>
                <livewire:photo-datatable />

</x-molecules.card>

</x-app-layout>
