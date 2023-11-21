<div>












                <x-molecules.table.panel>
                    <x-slot name="tableHeader">
                        <x-atoms.input id="search" placeholder="{{ __('Search') }}" type="search" class="w-full xl:w-1/3" />
                    </x-slot>
                        <x-atoms.table.table>
                            <thead>
                                <x-atoms.table.tr>
                                    <x-atoms.table.th>Name</x-atoms.table.th>
                                    <x-atoms.table.th>Title</x-atoms.table.th>
                                    <x-atoms.table.th>Email</x-atoms.table.th>
                                    <x-atoms.table.th>Role</x-atoms.table.th>
                                </x-atoms.table.tr>
                            </thead>
                            <x-atoms.table.tbody>
                                <x-atoms.table.tr>
                                    <x-atoms.table.td>Linda</x-atoms.table.td>
                                    <x-atoms.table.td>Developer</x-atoms.table.td>
                                    <x-atoms.table.td>Row</x-atoms.table.td>
                                    <x-atoms.table.td>Admin</x-atoms.table.td>
                                </x-atoms.table.tr>

                                <!-- More people... -->
                            </x-atoms.table.tbody>
                        </x-atoms.table.table>
                </x-molecules.table.panel>
















</div>
