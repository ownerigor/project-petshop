<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breeds = Breed::all();

        return view('breeds.index')->with('breeds', $breeds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('breeds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $breed = new Breed();
        $breed->name = $request->input('name');

        $breed->save();

        $breeds = Breed::all();
        return view('breeds.index')->with('breeds', $breeds)
            ->with('msg', 'Raça cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breed = Breed::find($id);

        if ($breed) {
            return view('breeds.show')->with('breed', $breed);
        } else {
            return view('breeds.show')->with('msg', 'Raça não encontrada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breed = Breed::find($id);

        if ($breed) {
            return view('breeds.edit')->with('breed', $breed);
        } else {
            $breeds = Breed::all();
            return view('breeds.index')->with('breeds', $breeds)
                ->with('msg', 'Raça não encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $breed = Breed::find($id);

        $breed->name = $request->input('name');

        $breed->save();

        $breeds = Breed::all();
        return view('breeds.index')->with('breeds', $breeds)
            ->with('msg', 'Raça atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $breed = Breed::find($id);

        $breed->delete();

        $breeds = Breed::all();
        return view('breeds.index')->with('breeds', $breeds)
            ->with('msg', "Raça excluída com sucesso!");
    }

    public static function getBreeds(){
        $breeds = Breed::all();
        return $breeds;
    }
}
