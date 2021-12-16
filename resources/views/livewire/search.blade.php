<div>
    <div class = "inline-bloc">
        <input class = "bg-grAy-200 text-gray-700 border:2 focus:outline-none px-2 py-1 rounded-full" placeholder="recherchez un jeu" wire:model="query">
    </div>

    @if (strlen($query) > 2)
    <div>
        @if (count($games) > 0)
            @foreach($games as $Game)
                <p>{{$Game->title }} </p>
            @endforeach
        @endif
    </div>
    @else
    <span>0 resultat pour "{{ $query }}"</span>
    @endif
</div>
