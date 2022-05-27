@extends('layouts/app')

@section('main')

@if ($errors->any())
<div class="text-red-600 text-2xl text-left font-semibold">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif
<div class="bg-gray-100 dark:bg-slate-800 relative rounded-lg p-8 sm:p-12 shadow-lg">
    <form action="{{Route('Films_Crud.update', $film->id)}}" method="POST" enctype="multipart/form-data">
        <br>
        @csrf
        @method('PATCH')
    
        <select name="realisateur">
            @foreach ($realisateurs as $realisateur) 
            <option
            @if ($film->realisateurs_id===$realisateur->id) selected @endif
            value="{{$realisateur->id}}">{{$realisateur->nom}} {{$realisateur->prenom}}</option>
           @endforeach
         </select>
         <br><br>  
        <div class="mb-6">
        <label for="title">titre:</label>
        <input id="title" type="text" name="title" value="{{$film->titre}}" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
        border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
        >
        </div>
        <br>
        <br>
        <div class="mb-6">
            <label for="affiche">
            Affiche du film:
             </label>
          <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
              <img class="lg:h-96 md:h-72 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="{{asset('storage/' . $film->affiche)}}" alt="image">
              <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <div class="flex text-sm text-gray-600 mt-10">
                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                  <span class="">Upload a file</span>
                  <input id="file-upload" name="affiche" type="file" class="sr-only">
                </label>
                <p class="pl-1 text-black">or drag and drop</p>
              </div>
              <p class="text-xs text-black">
                PNG, JPG, GIF up to 10MB
              </p>
            
            
            
            </div>
          </div>
        </div>
        <div class="mb-6">
            <label for="duree">durée:</label>
            <input id="duree" type="text" name="duree" value="{{$film->duree}}" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
            border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
            >
        </div>
        <div class="mb-6">
        <label for="contenu">Synopsis:</label>
        <textarea id="contenu" name="contenu" cols="30" rows="5" class="w-full rounded p-3 text-gray-800 dark:text-gray-50
        dark:bg-slate-700 border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none
        focus:border-primary" >{{$film->synopsis}}</textarea>
        </div>
        <div class="mb-6">
            <label for="datedesortie">date de sortie:</label>
                <input id="date" name="datedesortie" type="text" value="{{$film->datedesortie}}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring" ">
         <br>
        <div>
            <div class="mb-6">
                <label for="version">version:</label>
                <input id="version" type="text" name="langue" value="{{$film->langue}}" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
                border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
                >
            </div> 
            <div class="mb-6">
                <label for="csa">csa:</label>
                <input id="version" type="text" name="csa" value="{{$film->csa}}" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
                border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
                >
            </div>
            <select name="salle">
              @foreach ($salles as $salle)
              <option
              @if ($film->salles_id===$salle->id) selected @endif
              value="{{$salle->id}}">{{$salle->nom}}</option>   
              @endforeach 
            </select>
        </div>
        <input type="submit" value="Modifier le film" class="w-full text-gray-100 hover:text-gray-700
    bg-yellow-400 rounded border border-primary dark:border-slate-600 p-3 transition ease-in-out
    duration-500 hover:bg-yellow-300 mt-14">


    </form>
    <br>
    <br>
    <br>
    <br>
                
            </div>
@endsection