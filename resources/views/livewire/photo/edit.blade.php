<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="photos">{{ __('Photos') }}</x-atoms.label>
        <x-molecules.filepond wire:model="photos" name="photos" multiple id="photos" maxFileSize="10MB" maxTotalFileSize="100MB">
            <x-slot name="acceptedFileTypes">'image/jpg','image/png','image/jpeg','image/JPEG','image/JPG','image/PNG','image/svg','image/SVG','image/webp'</x-slot>
        </x-molecules.filepond>
        <livewire:photo.image-slide-show lazy :record="$record" model="photo" collection="photos" modelId="{{$record->id}}" disk="storagebox" />
        <livewire:photo.show-images-from-storage-box lazy enableFileDelete :record="$record" model="photo" collection="photos" modelId="{{$record->id}}" />








        <x-atoms.form-footer>

            <a href="{{ route('photos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<x-atoms.please-wait wire:loading wire:target="save">{{__('Please wait..')}}</x-atoms.please-wait></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>




</div>
