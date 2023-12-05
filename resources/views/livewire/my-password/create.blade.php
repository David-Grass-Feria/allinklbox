<div>



    <form wire:submit="save">
        <x-atoms.label for="title" id="title">{{ __('Title') }}</x-atoms.label>
        <x-atoms.input wire:model="title" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="title" />

        <x-atoms.label for="username" id="username">{{ __('Username') }}</x-atoms.label>
        <x-atoms.input wire:model="username" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="username" />

        <x-atoms.label for="url" id="url">{{ __('Url') }}</x-atoms.label>
        <x-atoms.input wire:model="url" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="url" />

        <x-atoms.label for="password" id="password">{{ __('Password') }}</x-atoms.label>
        <x-atoms.input wire:model="password" type="text" class="w-full"></x-atoms.input>
        <x-atoms.error for="password" />

        <div class="mt-2">
        <x-atoms.buttons.primary wire:click="generatePassword" type="button">{{__('Generate password')}}</x-atoms.buttons.primary>
        </div>

        <x-atoms.label for="notes" id="notes">{{ __('Notes') }}</x-atoms.label>
        <x-atoms.textarea wire:model="notes" rows="5" class="w-full"></x-atoms.textarea>
        <x-atoms.error for="notes" />




        <x-atoms.form-footer>

            <a href="{{ route('photos.index') }}">
                <x-atoms.buttons.secondary type="button">{{ __('Cancel') }}</x-atoms.buttons.secondary>
            </a>
            <x-atoms.buttons.primary type="submit">{{ __('Save') }}<span class="ml-5" wire:loading wire:target="save">{{__('Please wait..')}}</span></x-atoms.buttons.primary>

        </x-atoms.form-footer>
    </form>





</div>
