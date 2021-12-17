@extends('layouts.app')


@section('content')

    <div class="text-center py-15">
        <h2 class="text-4xl font-bold py-10">
            Page du Profil
        </h2>
    </div>

    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
       
        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class ="text-black  -700 font-bold text-6xl">
                {{ Auth::user()->name }}
            </h2>

            <p class="py-8 text-gray-500 text-s">
                {{ Auth::user()->email }}
            </p>

            <a 
                href="/Users/edit"
                class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl">
                Modifier le profil 
            </a>
        </div>
    </div>

    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">
            Games
        </span>

        <h2 class="text-4xl font-bold py-10">
            My games
        </h2>

        <div class="sm:grid grid-cols-2 w-4/5 m-auto">
            <div class="flex bg-yellow-700 text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                    <span class="uppercase text-xs">
                        Gaming
                    </span>

                    <h3 class="text-xl font-bold py-10">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas necessitatibus dolorum error culpa laboriosam. Enim voluptas earum repudiandae consequuntur ad? Expedita labore aspernatur facilis quasi ex? Nemo hic placeat et?
                    </h3>

                    <a 
                        href=""
                        class="uppercase bg-transparent border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                        Find Out More
                    </a>
                </div>
            </div>
        <div>
            <img src="https://cdn03.nintendo-europe.com/media/images/10_share_images/games_15/nintendo_switch_download_software_1/H2x1_NSwitchDS_ApexLegends_SeasonBanner_image1600w.jpg" alt="">
        </div>
    </div>
    
@endsection