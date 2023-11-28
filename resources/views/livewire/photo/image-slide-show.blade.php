<div>

    <x-atoms.buttons.primary wire:click="openModal" type="button">{{__('Open slideshow')}}</x-atoms.buttons.primary>
    @if($modal)
    <div>
        <x-dialog-modal>
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <div>
                    <div class="flex items-center space-x-3 mb-10">
                        <x-atoms.buttons.primary type="button" wire:click="prevImage">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square h-10" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                              </svg>
                        </x-atoms.buttons.primary>
                        <x-atoms.buttons.primary type="button" wire:click="nextImage">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-square h-10" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                              </svg>
                        </x-atoms.buttons.primary>
                        <x-atoms.please-wait wire:loading wire:target="prevImage">{{__('Wait for storagebox..')}}</x-atoms.please-wait>
                        <x-atoms.please-wait wire:loading wire:target="nextImage">{{__('Wait for storagebox..')}}</x-atoms.please-wait>
                    </div>

                    @foreach($files as $index => $item)
                        <div wire:key="imgModal-{{$item}}" class="relative" style="{{ $activeImage == $index ? '' : 'display:none;' }}">
                            <img id="imgModal-{{$item}}" class="rounded-md" src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" />
                        </div>
                    @endforeach
                </div>


            </x-slot>
            <x-slot name="footer">
                <x-atoms.buttons.secondary type="button" wire:click="closeModal">
                   {{__('Back')}}
                </x-atoms.buttons.secondary>
            </x-slot>
        </x-dialog-modal>
    </div>
    @endif




</div>
