<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full" />
        <x-atoms.error for="title" />


        <x-atoms.label for="videos">{{ __('Videos') }}</x-atoms.label>
        <x-molecules.filepond multiple wire:model="videos" name="videos" id="videos" maxFileSize="4000000MB" maxTotalFileSize="400000MB">
            <x-slot name="acceptedFileTypes"></x-slot>
        </x-molecules.filepond>





        <x-atoms.form-footer>

            <a href="{{ route('photos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="save">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>





</div>
