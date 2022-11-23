<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::with('breed')->paginate(10);

        //..return the view with the retrieved data
        return view('animal.index')->with('animals', $animals);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeds = BreedController::getBreeds();

        //..return the form to create a new vehicle
        return view('animal.create')->with('breeds', $breeds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getRules());
        
        //dd($request);
        $animal = new Animal();
        $animal->name = $request->input('name');
        $animal->size = $request->input('size');
        $animal->color = $request->input('color');
        $animal->age = $request->input('age');
        $animal->breed_id = $request->input('breed');
        $animal->save();
        return redirect(route('animals.index'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a = Animal::find($id);
        //..if the return exists, then...
        if($a){
            //..return a the view, with the data;
            return view('animal.show')->with('animal', $a);
        } else {
            //else return the page 404.
            return abort(404);
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
        $a = Animal::find($id);

        $breeds = BreedController::getBreeds();

        return view('animal.edit')
            ->with('animal', $a)
            ->with('breeds', $breeds);        
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
        $request->validate($this->getRules());
        
        $a = Animal::find($id);

        $a->name = $request->input('name');
        $a->size = $request->input('size');
        $a->color = $request->input('color');
        $a->age = $request->input('age');
        $a->breed_id = $request->input('breed');
        //..persist
        $a->save();
        //..redirect to 'index' route
        return redirect(route('animals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //..find the resource to delete
        $a = Animal::find($id);
        //..delete it!
        $a->delete();
        //..redirect to index
        return redirect(route('animals.index'));
    }

    //..get the validation rules
    public function getRules(){
        $rules = [
            'name' => 'required|max:50',
            'size' => 'required|max:30',
            'color' => 'required|max:30',
            'age' => 'required'
        ];
        return $rules;
    }

    //..get the validation error messages
    public function getRulesMessages(){
        $msg = [
            'name.*' => 'Digite um nome com até 50 caracteres.',
            'size.*' => 'Digite o porte do animal com até 30 caracteres.',
            'color.*' => 'Digite uma cor com até 30 caracteres.',
            'age.*' => 'Digite uma idade.'
        ];
        return $msg;
    }

}
