<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full">Name</x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="musics">{{ __('Music') }}</x-atoms.label>
        <x-molecules.filepond wire:model="songs" name="songs" id="songs" maxFileSize="10MB" maxTotalFileSize="100MB">
            <x-slot name="acceptedFileTypes">'audio/mpeg','audio/wav','video/mp4','video/mpeg'</x-slot>
        </x-molecules.filepond>





        <x-atoms.form-footer>

            <a href="{{ route('musics.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="save">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>





</div>
