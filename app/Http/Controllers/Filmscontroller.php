<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Models\Salles;
use App\Models\Réalisateur;
use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class Filmscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Films::with('salle')->get();
        //dd($films);
        return view(
            'Films_Crud.index',
            [
                'Films' => $films,
            ]
        );
    }

    function getall()
    {
        $cines = Films::with('salle')->with('categories')->get();
        $real = Réalisateur::all();

        return view(
            'Films',
            [
                'films' => $cines,
                'realisateurs' => $real
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $input = $request->input();

        $path = $request->file('affiche')->store('/images', 'public');
        // dd($request->file('affiche'));
        $name = $request->file('affiche')->getClientOriginalName();
        $extension = $request->file('affiche')->getClientOriginalExtension();
        if (($name) && ($extension)) {
            $request->validate([
                'title' => 'required|max:255',
                'contenu' => 'required',
                'affiche' => 'required',
                'duree' => 'required',
                'datedesortie' => 'required',
                'langue' => 'required',
                'csa' => 'required'
            ]);


            $film = new Films();
            $film->titre = $request->title;
            $film->affiche = $path;
            $film->duree = $request->duree;
            $film->synopsis = $request->contenu;
            $film->datedesortie = $request->datedesortie;
            $film->langue = $request->langue;
            $film->csa = $request->csa;
            $film->realisateurs_id = $request->realisateur;
            $film->salles_id = $request->salles_id;
            $film->save();
            return redirect()->route('Films')->with('status', 'le film a bien été ajouté !');
        } else {
            return redirect()->route('Films')->with('status', 'problème lors du chargement de l\image');
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
