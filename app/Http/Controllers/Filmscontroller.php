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
        $cines = Films::with('salle')->with('categories')->get();
        $real = Réalisateur::all();

        return view(
            'Films_Crud.index',
            [
                'films' => $cines,
                'realisateurs' => $real
            ]
        );      
    }

    public function getall()
    {
        $films = Films::with('salle')->get();
        //dd($films);
        return view(
            'Films',
            [
                'Films' => $films
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();
        $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'duree' => 'required',
            'datedesortie' => 'required',
            'langue' => 'required',
            'csa' => 'required'
        ]);

        $film = new Films();
        $film->titre = $request->title;
        if (null!==($request->file('affiche'))) {
            $name = $request->file('affiche')->getClientOriginalName();
            $extension = $request->file('affiche')->getClientOriginalExtension();
                 
            if (($name) && ($extension)) {
                $path = $request->file('affiche')->store('/images', 'public');
                $film->affiche = $path;
            } else {
                return redirect()->route('Films_Crud.index')->with('status', 'problème lors du chargement de l\image');
            } 
        }else {
                return redirect()->route('Films_Crud.index')->with('status', 'veuillez sélectionner une image svp'); 

            }
        
            $film->duree = $request->duree;
            $film->synopsis = $request->contenu;
            $film->datedesortie = $request->datedesortie;
            $film->langue = $request->langue;
            $film->csa = $request->csa;
            $film->realisateurs_id = $request->realisateur;
            $film->salles_id = $request->salle;
            $film->save();
            return redirect()->route('Films_Crud.index')->with('status', 'le film a bien été ajouté !');
       
        }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Films::findOrFail($id);
        $real = Réalisateur::all();
        $sal=Salles::all();
        return view('Films_Crud.show', [
            'film' => $film,
            'realisateurs' => $real,
            'salles'=>$sal
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film= Films::find($id);
        $real = Réalisateur::all();
        $sal=Salles::all();
        return view('Films_Crud.edit', [
            'film' => $film,
            'realisateurs' => $real,
            'salles'=>$sal
        ]);
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

        $request->validate([
            'title' => 'required|max:255',
            'contenu' => 'required',
            'duree' => 'required',
            'datedesortie' => 'required',
            'langue' => 'required',
            'csa' => 'required',
            'salle' => 'required',
        ]);
        $film= Films::find($id);
        if (null!==($request->file('affiche'))) {
        $name = $request->file('affiche')->getClientOriginalName();
        $extension = $request->file('affiche')->getClientOriginalExtension();
             
        if (($name) && ($extension)) {
            $path = $request->file('affiche')->store('/images', 'public');
            $film->affiche = $path;
        } else {
            return redirect()->route('Films_Crud.index')->with('status', 'problème lors du chargement de l\image');
        } 
        }
            $film->titre = $request->title;
            
            $film->duree = $request->duree;
            $film->synopsis = $request->contenu;
            $film->datedesortie = $request->datedesortie;
            $film->langue = $request->langue;
            $film->csa = $request->csa;
            $film->realisateurs_id = $request->realisateur;
            $film->salles_id = $request->salle;
            $film->save();
            return redirect()->route('Films_Crud.index')->with('status', 'le film a bien été modifié !');
        
        }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Films::find($id)->delete();
        return  redirect()->route('Films_Crud.index')->with('status', 'le film a bien été supprimé !');
    }
}
