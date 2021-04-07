<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">
    <input wire:model="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="Pesquisar...">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded rounded-l-none absolute right-0 top-0 mt-2 focus:outline-none">
        Pesquisar
    </button>

    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-blue-100 mt-2 rounded-lg overflow-hidden">
            @forelse ($this->results as $result)
                <li class="leading-8 text-sm cursor-pointer hover:bg-blue-400 px-5">
                    <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
                </li>
            @empty
                <li class="leading-8 text-sm italic cursor-pointer hover:bg-blue-400 px-5">
                    Não há coincidência com o termo pesquisado...<i class="fas fa-frown icons-awesome"></i>
                </li>
            @endforelse
        </ul>
    @endif
</form>
