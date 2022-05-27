<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen" class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-500 rounded-md dark:bg-red-600 dark:hover:bg-red-700 dark:focus:bg-red-700 hover:bg-red-600 focus:outline-none focus:bg-red-500 focus:ring focus:ring-red-300 focus:ring-opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>

        <span>Ajouter un film</span>
    </button>

    <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
            ></div>

            <div x-cloak x-show="modelOpen" 
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
<h1 class="text-3xl text-center font-bold text-gray-900 mt-20 mb-10">Créer un film</h1>
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
<form action="{{Route('Films_Crud.store')}}" method="POST" enctype="multipart/form-data">
    <br>
    @csrf

    <select name="realisateur">
        @foreach ($realisateurs as $realisateur) 
        <option value="{{$realisateur->id}}">{{$realisateur->nom}} {{$realisateur->prenom}}</option>
        @endforeach
     </select>
     <br><br>  
    <div class="mb-6">
    <label for="title">Entrez le titre de votre film svp</label>
    <input id="title" type="text" name="title" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
    border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
    >
    </div>
    <br>
    <br>
    <div class="mb-6">
        <label for="affiche">
        Affiche du film
         </label>
      <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
        <div class="space-y-1 text-center">
          <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <div class="flex text-sm text-gray-600">
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
        <label for="duree">Entrez la durée de votre film svp</label>
        <input id="duree" type="text" name="duree" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
        border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
        >
    </div>
    <div class="mb-6">
    <label for="contenu">Entrez le synopsis de votre film svp</label>
    <textarea id="contenu" name="contenu" cols="30" rows="5" class="w-full rounded p-3 text-gray-800 dark:text-gray-50
    dark:bg-slate-700 border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none
    focus:border-primary"></textarea>
    </div>
    <div class="mb-6">
        <label for="datedesortie">Entrez la date de sortie de votre film svp</label>
            <input id="date" name="datedesortie" type="date" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
     <br>
    <div>
        <div class="mb-6">
            <label for="version">Entrez la version de votre film svp</label>
            <input id="version" type="text" name="langue" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
            border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
            >
        </div> 
        <div class="mb-6">
            <label for="csa">Entrez le csa de votre film svp</label>
            <input id="version" type="text" name="csa" class="w-full rounded p-3 text-gray-800 dark:text-gray-50 dark:bg-slate-700
            border-gray-500 dark:border-slate-600 outline-none focus-visible:shadow-none focus:border-primary"
            >
        </div>
        <select name="salle">
        @foreach ($films as $film)
        <option value="{{$film->salle->id}}">{{$film->salle->nom}}</option>   
        @endforeach 
      </select>
        <select name="categorie" id="categorie">
          @foreach($films as $film)
          @foreach ($film->categories as $cat) 
          <option value="{{$cat->id}}">{{$cat->label}}</option> 
          @endforeach 
          @endforeach 
        </select>  
        
    <input type="submit" value="Créer votre film" class="w-full text-gray-100 hover:text-gray-700
    bg-yellow-400 rounded border border-primary dark:border-slate-600 p-3 transition ease-in-out
    duration-500 hover:bg-yellow-300 mt-14">
    </div>
</div>
</form>
<br>
<br>
<br>
<br>
            
        </div>
    </div>
</div>
</div>




