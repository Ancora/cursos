<section>
    {{-- <x-slot name="course">
        {{$course->slug}}
    </x-slot> --}}

    <h1 class="text-2xl text-center font-bold uppercase">Público Alvo</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->audiences as $item)
        <article class="card mb-4">
            <div class="card-body">
                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="audience.name" class="form-input w-full p-1 rounded-md" placeholder="Informe o Público Alvo...">
                        @error('audience.name')
                            <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong class="text-blue-200">Público Alvo: </strong>{{$item->name}}</h1>

                        <div>
                            <i class="fas fa-edit text-blue-900 cursor-pointer" wire:click="edit({{$item}})"></i>
                            <i class="fas fa-trash-alt text-red-900 cursor-pointer" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex cursor-pointer items-center">
            <i class="fas fa-user-tag text-2xl text-yellow-500 mr-2"></i>
            <p class="text-yellow-500">Adicionar Público Alvo</p>
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-2">Adicionar Público Alvo</h1>
                <div>
                    <input wire:model="name" class="form-input w-full p-1 rounded-md" placeholder="Informe o Público Alvo...">
                    @error('name')
                        <span class="text-red-600 text-xs bg-red-200 rounded-md p-0.5">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button class="btn btn-danger mr-2" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary" wire:click="store">Adicionar</button>
                </div>
            </div>
        </article>
    </div>
</section>
