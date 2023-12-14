<div>












                <x-molecules.table.panel>
                    <x-slot name="tableHeader">
                        <x-atoms.input wire:model.live.debounce.600ms="search" id="search" placeholder="{{ __('Search') }}" type="search" class="w-full xl:w-1/3" />
                        @if($selected)
                        <x-atoms.buttons.danger wire:click="destroyRecords" wire:confirm="{{__('Are you sure?')}}">{{__('Delete')}}<x-atoms.count>{{count($selected)}}</x-atoms.count><x-atoms.please-wait wire:loading wire:target="destroyRecords">{{__('Please wait..')}}</x-atoms.please-wait></x-atoms.buttons.danger>
                        @endif
                    </x-slot>
                        <x-atoms.table.table>
                            <thead>
                                <x-atoms.table.tr>
                                    <x-atoms.table.th></x-atoms.table.th>
                                    <x-atoms.table.th>ID</x-atoms.table.th>
                                    <x-atoms.table.th>{{__('Title')}}</x-atoms.table.th>
                                    <x-atoms.table.th>{{__('Edit')}}</x-atoms.table.th>
                                   </x-atoms.table.tr>
                            </thead>
                            <x-atoms.table.tbody>
                                @foreach($records as $record)
                                <x-atoms.table.tr>
                                    <x-atoms.table.td><x-atoms.input-checkbox wire:model.live="selected" wire:key="{{$record->id}}" value="{{ $record->id }}" type="checkbox"/></x-atoms.table.td>
                                    <x-atoms.table.td>{{$record->id}}</x-atoms.table.td>
                                    <x-atoms.table.td>{{$record->title}}</x-atoms.table.td>
                                    <x-atoms.table.td><a href="{{route('musics.edit',$record)}}"><x-atoms.buttons.primary type="button">{{__('Edit')}}</x-atoms.buttons.primary></a></x-atoms.table.td>
                                </x-atoms.table.tr>
                                @endforeach
                                </x-atoms.table.tbody>
                        </x-atoms.table.table>
                </x-molecules.table.panel>

             <x-atoms.pagination-links :records="$records"/>













</div>
