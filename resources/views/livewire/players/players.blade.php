
{{-- @include('livewire.jogador.jogador-update')
@include('livewire.jogador.jogador-info') --}}
<div class="p-5 h-screen bg-gray-100">
    <span class="text-xl mb-2 display:inline-block font-bold">Jogadores</span>

    <div x-data="{open:false}" x-on:close-modal.window="open=false">
        <button x-on:click="open=!open" class="mb-4 bg-blue-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" type="button" data-modal-toggle="createPlayerModal">
            Adicionar Jogador
        </button>

        @if($edit)
          @include('livewire.players.edit-player')
        @else
          @include('livewire.players.create-player')
        @endif

        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full cursor-pointer">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-35">Idade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-15">Nacionalidade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-15">Opções</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($players as $key => $player)
                        <tr class="bg-white border-b transition durante-300 ease-in-out hover:bg-gray-100 ">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $player->name }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $player->age }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $player->nationality }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <div class="inline-flex">
                                    <button class="bg-emerald-400 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" wire:click.prevent="read({{ $player->id }})">
                                        Detalhes
                                    </button>
                                    <button  data-modal-toggle="editPlayerModal" x-on:click="open=!open" class="ml-2 bg-blue-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-r" wire:click.prevent="edit({{ $player->id }})">
                                        Editar
                                    </button>
                                    <button class="ml-2 bg-red-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-r" wire:click.prevent="delete({{ $player->id }})">
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>