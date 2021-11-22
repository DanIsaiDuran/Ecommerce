<div>
    <div class=" my-12 bg-white shadow-lg rounded-lg p-6">
        
        {{-- Color --}}
        <div class=" mb-6">
            <x-jet-label>
                Color
            </x-jet-label>

           <div class=" grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" name="color_id"
                                wire:model.defer="color_id" 
                                value="{{ $color->id }}">
                        <span class=" ml-2 text-gray-700 capitalize">
                            {{ __($color->name) }}
                        </span>
                    </label>
                @endforeach
           </div>

           <x-jet-input-error for="color_id" />
        </div>

        {{-- Cantidad --}}
        <div>
            <x-jet-label>
                Cantidad
            </x-jet-label>

            <x-jet-input type="number"
                        wire:model.defer="quantity" 
                        placeholder="Ingrese una cantidad"
                        class=" w-full"/>

            <x-jet-input-error for="quantity" />
        </div>

        <div class=" flex justify-end items-center mt-4">

            <x-jet-action-message class=" mr-3" on="saved">
                Agregado
            </x-jet-action-message>

            <x-jet-button 
                wire:loading.attr="disabled"
                wire:target="save"
                wire:click="save">
                Agregar
            </x-jet-button>
        </div>
    </div>

    @if ($product_colors->count())
    <div class="bg-white shadow-lg rounded-lg p-6">
        <table>
            <thead>
                <tr>
                    <th class=" px-4 py-2 w-1/3">
                        Color
                    </th>
                    <th class=" px-4 py-2 w-1/3">
                        Cantidad
                    </th>
                    <th>

                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($product_colors as $product_color)
                    <tr wire:key="product_color-{{ $product_color->pivot->color_id }}">
                        <td class=" capitalize px-4 py-2">
                            {{ __($colors->find($product_color->pivot->color_id)->name) }}
                        </td>
                        <td class=" px-4 py-2">
                            {{ $product_color->pivot->quantity }} Unidades
                        </td>
                        <td class=" px-4 py-2 flex">
                            <x-jet-secondary-button class=" ml-auto mr-2"
                                                    wire:click="edit({{ $product_color->pivot->id }})"
                                                    wire:loading.attr="disabled"
                                                    wire:target="edit({{ $product_color->pivot->id }})">
                                Actualizar
                            </x-jet-secondary-button>

                            <x-jet-danger-button
                                wire:click="$emit('deletePivot', {{ $product_color->pivot->id }} )">
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            Editar colores
        </x-slot>

        <x-slot name="content">
            <div class=" mb-4">
                <x-jet-label>
                    Color
                </x-jet-label>

                <select class=" font-control w-full"
                        wire:model="pivot_color_id">
                    <option value="">Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ ucfirst(__($color->name)) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-jet-label>
                    Cantidad
                </x-jet-label>

                <x-jet-input class=" w-full" wire:model="pivot_quantity" type="number" placeholder="Ingrese una cantidad" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button
                    wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-button
                wire:click="update"
                wire:loading.attr="disabled"
                wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>

    @push('script')
        <script>

            Livewire.on('deletePivot', pivot => {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podras deshacer esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, Eliminar!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emit('delete', pivot);

                        Swal.fire(
                        '¡Eliminado!',
                        'Tu archivo se ha eliminado.',
                        'success'
                        )
                    }
                })
            } )
            
        </script>
    @endpush
</div>
