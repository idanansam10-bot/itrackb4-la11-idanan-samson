<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use App\Models\Genre;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;


class VideoGameController extends Controller
{
   

public function index(Request $request): View
{
    $genre = $request->input('genre_id', 'all');
    $developer = $request->input('developer', 'all');

    $genres = Genre::all();

    DB::enableQueryLog();

   $games = Videogame::with('genre')
        ->when($genre !== 'all', function ($query) use ($genre) {
            $query->where('genre_id', $genre);
        })
        ->when($developer !== 'all', function ($query) use ($developer) {
            $query->where('developer', $developer);
        })
        ->get();

    return view('games.index', compact(
        'games',
        'genres',
        'genre',
        'developer'
    ));
}


   public function create(): View
{
    $genres = Genre::all();

    return view('games.create', compact('genres'));
}
   
public function store(Request $request): RedirectResponse
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'developer' => 'required|string|max:255',
        'genre_id' => 'required|exists:genres,id',
        'year' => 'required|integer',
    ]);

    Videogame::create($validated);

    return redirect()->route('games.index')
        ->with('success', 'Video game added successfully.');
}


    public function show(string $id)
    {
        $game = Videogame::findOrFail($id);

        return view('games.show', ['item' => $game]);
    }

    public function featured()
    {
        $item = Videogame::findOrFail(3);

        return view('games.featured', ['item' => $item]);
    }
}