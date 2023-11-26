<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('videos.create')}}">
            <x-atoms.buttons.primary type="button">{{__('Create')}}</x-atoms.buttons.primary>
            </a>
        </x-slot>
                <livewire:video.index model="\App\Models\Video"/>

            </x-molecules.card>
</x-app-layout>
