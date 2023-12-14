<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="musics">{{ __('Music') }}</x-atoms.label>
        <x-molecules.filepond wire:model="songs" name="songs" id="songs" maxFileSize="10MB" maxTotalFileSize="100MB">
            <x-slot name="acceptedFileTypes">'audio/mpeg','audio/wav','video/mp4','video/mpeg'</x-slot>
        </x-molecules.filepond>

        <livewire:music.show-songs-from-storage-box lazy :record="$record" model="music" collection="songs" modelId="{{$record->id}}" />








        <x-atoms.form-footer>

            <a href="{{ route('musics.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<x-atoms.please-wait wire:loading wire:target="save">{{__('Please wait..')}}</x-atoms.please-wait></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>




</div>
