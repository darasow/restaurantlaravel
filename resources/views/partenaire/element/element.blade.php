@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Element')

@section('content')

<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-20  relative top-[115.5px] sm:top-[130.5px] md:top-[85px] lg:top-[82px] md:left-[160px] md:max-w-[77vw] lg:max-w-[82vw] ">
    <!--CONTAINER GLOBALE-->
    <div class="grid grid-cols-1 md:grid-cols-3 z-30">
        <!-- LISTES des CATEGORIES -->
       
         
        <section class="md:col-span-2 bg-red-200">
    @foreach($categories as $categorie)
        <div class="mb-5">
            <h2 class="font-black text-orange-600 text-xl md:text-3xl py-5 px-2 text-center">{{ $categorie->libelle }}</h2>
            <div class="grid grid-cols-1 place-items-center gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($categorie->elements as $element)
                    <div class="bg-green-300/50 pb-5 hover:bg-green-300/90 hover:duration-700 max-w-[180px] flex flex-col justify-center items-center space-y-0 rounded-2xl relative">
                        <div class="relative w-[180px] h-[180px]">
                            <img class="z-0 w-full h-full cursor-grab object-cover rounded-full duration-700 scale-[75%] hover:scale-[85%]" src="/storage/{{ $element->image }}" alt="{{ $element->titre }}">
                            <span class="absolute top-0 inset-x-0 text-center text-sm font-thin z-10">today</span>
                        </div>
                        <h3 class="text-lg font-bold">{{ $element->titre }}</h3>
                        <p class="py-3 text-thin text-sm text-slate-500 text-center">{{ $element->description }}</p>
                        <span class="rounded-xl px-2 font-semibold text-base bg-red-500/90">{{ $element->prix }} Gnf</span>
                        <a href="{{ route('partenaires.element.edit', ['element' => $element->id]) }}" class="absolute top-1 left-2 text-yellow-500 font-black text-lg h-8 w-8 bg-sky-200 rounded-full cursor-pointer flex items-center justify-center hover:bg-sky-600 hover:duration-700 "><i class="fa fda-spin fa-cog"></i></a>
                        <a href="" onclick="return confirm('Êtes-vous sûr de continuer ?')" class="absolute top-1 right-2 text-red-400 font-black text-lg h-8 w-8 p-1 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 hover:text-white hover:duration-700 "><i class="fa fa-trash-o"></i></a>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</section>





        <!-- Formulaires d'ajout ... -->
    <form class="bg-red-100    p-2 order-first md:order-last md:fixed md:right-0 md:top-20 md:w-[26%] lg:w-[28%] xl:w-[33%] z-40" enctype="multipart/form-data" method="post" action="{{ isset($elementedit) ? route('partenaires.element.update', $elementedit->id) : route('partenaires.element.store') }}">
            @csrf
            @if(isset($elementedit))
                @method('PUT')
            @endif
    <fieldset class="group p-2 border-2 h-[500px] border-black overflow-y-scroll rounded-lg grid grid-cols-3 gap-2 md:grid-cols-1">
        <legend class="group-hover:bg-cyan-300/70  group-hover:rounded-lg group-hover:duration-1000 text-base font-bold text-center p-1">Ajout/Modification</legend>
        <!-- Titre -->
        <div>
            <label for="titre" class="block text-sm font-medium text-gray-700">Titre</label>
            <input type="text" name="titre" id="titre" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ isset($elementedit) ? $elementedit->titre : old('titre') }}" required autofocus />
        </div>
        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <input type="text" name="description" id="description" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ isset($elementedit) ? $elementedit->description : old('description') }}" required />
        </div>

        <!-- Prix -->
        <div>
            <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
            <input type="number" name="prix" id="prix" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ isset($elementedit) ? $elementedit->prix : old('prix') }}" required />
        </div>
        <!-- Catégorie -->
        <div>
                <label for="categorie_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <select name="categorie_id" id="categorie_id" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}" {{ (isset($elementedit) && $elementedit->categorie_id == $categorie->id) || old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                            {{$categorie->libelle}}
                        </option>
                    @endforeach
                </select>
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>

        @if(isset($elementedit))
            <div>
                <label class="block text-sm font-medium text-gray-700">Image Actuelle</label>
                <img class="w-[180px] h-[180px] cursor-grab object-cover rounded-full duration-700 scale-[65%] hover:scale-75" src="/storage/{{ $elementedit->image }}" alt="Image Actuelle">
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="col-span-1 text-sm text-red-400 text-center mt-1">{{ $error }}</div>
            @endforeach
        @endif

        <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-check-circle-o"></i> Valider</button>
        <button type="reset" class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"><i class="fa fa-ban"></i> Annuler</button>
    </fieldset>
</form>

    </div>
</main>

@endsection