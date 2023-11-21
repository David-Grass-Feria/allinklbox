<x-app-layout>

    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('photos.index')}}">
            <x-atoms.buttons.primary type="button">{{__('Back')}}</x-atoms.buttons.primary>
            </a>
        </x-slot>

<livewire:photo-create-form />
    </x-molecules.card>

    </x-app-layout>
