<div>


    @push('styles')
    <link href="{{asset('vendor/select2/select2/select2.min.css')}}" rel="stylesheet" />
    @endpush

    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full">Name</x-atoms.input>
        <x-atoms.error for="title" />

        <div wire:ignore>
        <x-atoms.label for="songs">{{ __('Songs') }}</x-atoms.label>
        <x-atoms.select wire:model="songs" multiple id="songs">
            @foreach($songs as $song)
            <option wire:key="option-{{$song->id}}" value="{{$song->id}}">{{$song->title}}</option>
            @endforeach
        </x-atoms.select>
        <x-atoms.error for="songs" />
    </div>






        <x-atoms.form-footer>

            <a href="{{ route('musiclists.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="save">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>


    @push('scripts')
    <script src="{{asset('vendor/select2/jquery-3.6.3/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2/select2.min.js')}}"></script>

    <script>

    $(document).ready(function() {


    $('#songs').select2({
            placeholder: "{{__('Choose songs for this playlist')}}",
             allowClear: true,
             tags: false
    });


    });
    </script>
    @endpush


</div>
