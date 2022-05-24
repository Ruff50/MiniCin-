@extends('layouts/app')
    
@section('main')
<section class="text-black body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap -m-4">
        @foreach ($Films as $film)  
        <div class="p-4 md:w-1/3">
          <div class="h-full rounded-xl shadow-cla-blue bg-gradient-to-r from-indigo-50 to-blue-50 overflow-hidden">              
            <img class="lg:h-96 md:h-72 w-full object-cover object-center scale-110 transition-all duration-400 hover:scale-100" src="{{asset('storage/' . $film->affiche)}}" alt="blog">
            <div class="p-6">
              <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">{{$film->salle->nom}}</h2>
              <h1 class="title-font text-lg font-medium text-red-600 mb-3">{{$film->titre}}</h1>
              <p class="leading-relaxed mb-3">{{$film->synopsis}}</p>
              <div class="flex items-center flex-wrap ">
                <button class="bg-gradient-to-r from-red-700 to-gray-500 text-white hover:scale-105 drop-shadow-md  shadow-cla-blue px-4 py-1 rounded-lg">Learn more</button>
               
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>


@endsection
