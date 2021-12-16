<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Games;
use Cviebrock\EloquentSluggable\Services\SlugService;


class GamesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Games.index')
        ->with('games', Games::orderBy('created_at', 'DESC')->get());
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
            'categorie' => 'required',
            'downloadLink' =>'required',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        SlugService::createSlug(Games::class,'slug',
        $request->title);

        Games::create([
            'title'=>$request->input('title'),
            'description' => $request->input('description'),
            'download' => $request->input('download'),
            'categorie' => $request->input('categorie'),
            'slug' => SlugService::createSlug(Games::class,'slug',
            $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id

        ]);

        return redirect('/Games')
            ->with('message','Your Game as been added !');

    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('Games.show')
            ->with('game', Games::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('Games.edit')
            ->with('game', Games::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'categorie' => 'required',
           
        ]);

        Games::where('slug', $slug)
            ->update([
            'title'=>$request->input('title'),
            'description' => $request->input('description'),
            'categorie' =>$request->input('categorie'),
            'slug' => SlugService::createSlug(Games::class,'slug',
            $request->title),
            'user_id' => auth()->user()->id

            ]);
            return redirect('/Games')
                ->with('message','Your Game has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $game = Games::where('slug', $slug);
        $game->delete();

        return redirect('/Games')
            ->with('message','Your Game has been deleted !');
    }
}




