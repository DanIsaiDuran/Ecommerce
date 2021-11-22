<div class=" bg-white shadow-xl rounded-lg p-6 mb-4">
    <p class=" text-2xl text-center font-semibold mb-2">Estado del producto</p>

    <div class=" flex">
        <label class=" mr-6">
            <input wire:model.defer="status" type="radio" name="status" value="1">
            Marcar producto como borrador
        </label>
        <label>
            <input wire:model.defer="status" type="radio" name="status" value="2">
            Marcar producto como publicado
        </label>
    </div>

    <div class=" flex justify-end">

        <x-jet-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
            Actualizar
        </x-jet-button>
    </div>


    @push('script')
   
        <script>

            Livewire.on('Actualizar', pivot => {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Estatus actualizado',
                    showConfirmButton: false,
                    timer: 1500
                })
            } )
            
        </script>

    @endpush
</div>
