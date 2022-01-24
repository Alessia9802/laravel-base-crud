<?php

namespace App\Http\Controllers\Admin;

use App\Models\Character;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $characters = Character::orderBy('id', 'desc')->paginate(12);
      return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.characters.create');
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

        Character::create($val_data);

        //redirect
        return redirect()->route('admin.characters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        //
         return view('characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Character $character)
    {
        //
        return view('admin.characters.edit', compact('character'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Character $character)
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
        $character->update($valData);
        // redirect
        return redirect()->route('admin.characters.index')->with('message', "⚡ Hai modificato il personaggio $character->title");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function destroy(Character $character)
    {
        //
        $character->delete();

        // redirect to a get route
        return redirect()->back()->with('message', "Personaggio cancellato!");
    }
}
