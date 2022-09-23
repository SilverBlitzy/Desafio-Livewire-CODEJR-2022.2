<div>
    <div class="p-5 h-screen bg-gray-100" >
        <span class="text-xl mb-2 display:inline-block">Rankings dos Times</span>
        <div>
            <div class="inline-flex mt-2">
                <button class="bg-emerald-400 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l nt" wire:click.prevent="order('punctuation')">
                    Ordernar pela pontuação
                </button>
            </div>
            <div class="inline-flex mt-4">
                <button class="bg-emerald-400 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" wire:click.prevent="order('victories')">
                    Ordernar pelas vitórias
            </div>
            <div class="inline-flex mt-4 mb-4">
                <button class="bg-emerald-400 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded-l" wire:click.prevent="order('defeats')">
                    Ordernar pelas derrotas
                </button>
            </div>
        </div>
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full cursor-pointer">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-20">Nome</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-16">País</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-16">Pontuação</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-16">Vitórias</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left w-16">Derrotas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($teams as $key => $team)
                        <tr class="bg-white border-b transition durante-300 ease-in-out hover:bg-gray-100 ">
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->name }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->country }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->punctuation }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->victories }} </td>
                            <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{ $team->defeats }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
