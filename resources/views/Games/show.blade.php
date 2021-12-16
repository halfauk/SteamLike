@extends('layouts.app')

@section('content')
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-15 border-b border-gray-200">
    <div>
        <img src="{{ asset('images/' . $game->image_path) }}" alt="">
    </div>
    <div>
        <h2 class ="text-gray-700 font-bold text-5xl pb-4">
            {{ $game->title }}
        </h2>

        <span class =" text-gray-500">
            By <span class ="font-bold italic text-gray-800">{{$game->user->name }}

            </span>, Created on {{ date('jS M Y',strtotime($game->updated_at))}}
        </span>


    <p class= "text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $game->categorie }}

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $game->description }}
    </p>
    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Download
        </a>



</div>

@endsection