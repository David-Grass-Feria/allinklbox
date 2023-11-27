<div>

@push('styles')
<link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />
@endpush

    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="photos">{{ __('Video') }}</x-atoms.label>
        <x-molecules.filepond wire:model="videos" name="videos" id="videos" maxFileSize="10000MB" maxTotalFileSize="10000MB">
            <x-slot name="acceptedFileTypes">'video/x-msvideo','video/mp4','video/mpeg','video/webm',</x-slot>
        </x-molecules.filepond>


        <livewire:video.show-videos-from-storage-box lazy enableFileDelete :record="$record" model="video" collection="videos" modelId="{{$record->id}}" disk="storagebox" />






        <x-atoms.form-footer>

            <a href="{{ route('videos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<x-atoms.please-wait wire:loading wire:target="save">{{__('Please wait..')}}</x-atoms.please-wait></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>


@push('scripts')
<script src="https://vjs.zencdn.net/8.6.1/video.min.js"></script>
@endpush

</div>
