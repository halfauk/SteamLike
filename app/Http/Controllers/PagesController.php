<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GamesController;
use App\Models\Games;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')
        ->with('games', Games::orderBy('updated_at', 'DESC')->get());
    }
}
