<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="py-3 px-4 mx-auto max-w-screen-xl md:px-6">
        <div class="flex items-center">
            <ul class="flex flex-row mt-0 mr-6 space-x-8 text-sm font-medium">
                <li>
                    <a href="/players" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Jogadores</a>
                </li>
                <li>
                    <a href="/teams" class="text-gray-900 dark:text-white hover:underline">Times</a>
                </li>
                <li>
                    <a href="/" class="text-gray-900 dark:text-white hover:underline">Ranking</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="p-5 h-screen bg-gray-100">
    <span class="text-xl mb-2 display:inline-block font-bold">Times</span>

    <div x-data="{open:false}" x-on:close-modal.window="open=false">
        <button x-on:click="open=!open" class="mb-4 bg-blue-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" type="button" data-modal-toggle="createTeamModal">
            Adicionar Novo Time
        </button>

        @if($edit)
          @include('livewire.teams.edit-team')
        @else
          @include('livewire.teams.create-team')
        @endif

        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full cursor-pointer">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-35">País</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-15">Pontuação</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-15">Opções</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($teams as $key => $team)
                        <tr class="bg-white border-b transition durante-300 ease-in-out hover:bg-gray-100 ">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->name }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->country }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->punctuation }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                                <div class="inline-flex">
                                    <button class="bg-emerald-400 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" wire:click.prevent="read({{ $team->id }})">
                                        Detalhes
                                    </button>
                                    <button  data-modal-toggle="editTeamModal" x-on:click="open=!open" class="ml-2 bg-blue-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-r" wire:click.prevent="edit({{ $team->id }})">
                                        Editar
                                    </button>
                                    <button class="ml-2 bg-red-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-r" wire:click.prevent="delete({{ $team->id }})">
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
