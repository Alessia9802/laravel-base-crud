<?php

namespace App\Http\Controllers\Admin;

use App\Models\Game;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $games = Game::orderBy('id', 'desc')->paginate(12);
      return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $val_data = $request->validate([
            'title' => ['required', 'max:200'],
            'cover' => ['nullable', 'max:255'],
            'desc' => ['nullable'],
        ]);

        Game::create($val_data);

        //redirect
        return redirect()->route('admin.games.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
        $valData = $request->validate(
            [
                "title" => ['required'],
                "cover" => ['required'],
                "desc" => ['nullable']
            ]
        );

        //ddd($valData);
        // update data
        $game->update($valData);
        // redirect
        return redirect()->route('admin.games.index')->with('message', "⚡ Hai modificato il Game $game->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        // delete the resource
        $game->delete();

        // redirect to a get route
        return redirect()->back()->with('message', "Game Deleted!");
    }
}
