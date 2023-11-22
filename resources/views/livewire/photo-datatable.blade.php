<div>












                <x-molecules.table.panel>
                    <x-slot name="tableHeader">
                        <x-atoms.input wire:model.live.debounce.600ms="search" id="search" placeholder="{{ __('Search') }}" type="search" class="w-full xl:w-1/3" />
                    </x-slot>
                        <x-atoms.table.table>
                            <thead>
                                <x-atoms.table.tr>
                                    <x-atoms.table.th>ID</x-atoms.table.th>
                                    <x-atoms.table.th>{{__('Title')}}</x-atoms.table.th>
                                    <x-atoms.table.th>{{__('Edit')}}</x-atoms.table.th>
                                   </x-atoms.table.tr>
                            </thead>
                            <x-atoms.table.tbody>
                                @foreach($records as $photo)
                                <x-atoms.table.tr>
                                    <x-atoms.table.td>{{$photo->id}}</x-atoms.table.td>
                                    <x-atoms.table.td>{{$photo->title}}</x-atoms.table.td>
                                    <x-atoms.table.td><a href="{{route('photos.edit',$photo)}}"><x-atoms.buttons.primary type="button">{{__('Edit')}}</x-atoms.buttons.primary></a></x-atoms.table.td>
                                </x-atoms.table.tr>
                                @endforeach
                                </x-atoms.table.tbody>
                        </x-atoms.table.table>
                </x-molecules.table.panel>
















</div>
