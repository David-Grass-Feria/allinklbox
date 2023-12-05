<x-app-layout>


    <x-molecules.card>
        <x-slot name="header">
            <a href="{{route('mypasswords.create')}}">
            <x-atoms.buttons.primary type="button">{{__('Create')}}</x-atoms.buttons.primary>
            </a>
        </x-slot>
                <livewire:my-password.index model="\App\Models\MyPassword"/>

            </x-molecules.card>
</x-app-layout>
