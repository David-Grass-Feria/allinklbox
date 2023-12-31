<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full">Name</x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="photos">{{ __('Photos') }}</x-atoms.label>
        <x-molecules.filepond wire:model="photos" name="photos" multiple id="photos" maxFileSize="10MB" maxTotalFileSize="100MB">
            <x-slot name="acceptedFileTypes">'image/jpg','image/png','image/jpeg','image/JPEG','image/JPG','image/PNG','image/svg','image/SVG','image/webp'</x-slot>
        </x-molecules.filepond>





        <x-atoms.form-footer>

            <a href="{{ route('photos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="save">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>





</div>
