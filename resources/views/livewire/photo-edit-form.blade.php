<div>
    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="title" />


        <x-atoms.label for="photo" id="photo">{{ __('Photos') }}</x-atoms.label>
        <x-molecules.filepond wire:model="photos" name="photos" multiple id="photos" />
        <div class="flex items-center space-x-2 space-y-2 flex-wrap mt-10">
        @foreach($files as $item)
        <a target="_blank" href="{{route('getPrivateFile',['model' => 'photo','collection' => 'photos','modelId' => $record->id,'filename' => basename($item)])}}">
        <img class="h-32" src="data:image/png;base64, {{ base64_encode(Storage::disk('storagebox')->get($item))}}"  />
        </a>
        @endforeach
        </div>
        <x-atoms.form-footer>

            <a href="{{ route('photos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="store">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>
</div>
