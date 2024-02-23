@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Categorie')

@section('content')

<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-28  relative top-[120px] sm:top-[133px] md:top-[85px] lg:top-[82px] md:left-[160px] md:max-w-[77vw] lg:max-w-[82vw] ">
    <!--CONTAINER GLOBALE-->
    <div class="grid grid-cols-1 md:grid-cols-3">
        <!-- LISTES des CATEGORIES -->
        <section class="md:col-span-2">
            <h1 class="font-black text-orange-600 text-xl md:text-3xl py-5 px-2">Mes Catégories :</h1>
            <div class="grid grid-cols-1 place-items-center gap-5 sm:grid-cols-2 lg:grid-cols-3">

                     @forelse($categories as $categorie)

                        <div class="bg-green-300/50 hover:bg-green-300/90 hover:duration-700 max-w-[180px] flex flex-col justify-center items-center space-y-0 rounded-2xl relative">
                            <span class=" inset-x-0 text-center text-sm font-thin z-10">{{$categorie->created_at}} </span>
                            <img class="w-[180px] h-[180px] cursor-grab object-cover rounded-full duration-700 scale-[65%] hover:scale-75" src="/storage/{{$categorie->image}}">
                            <h3 class="text-lg font-bold pb-5">{{$categorie->libelle}}</h3>
                            <a href="{{ route('partenaires.categorie.edit', ['categorie' => $categorie->id]) }}"><i class="absolute top-1 left-2 text-yellow-500 font-black text-lg h-8 w-8 bg-sky-200 rounded-full cursor-pointer flex items-center justify-center hover:bg-sky-600 hover:duration-700 fa fda-spin fa-cog"></i></a>
                           
                            <form method="post" action="{{ route('partenaires.categorie.destroy', $categorie) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Est-vous sur de continuer ?')" class="text-red-500">                            <i class="absolute top-1 right-2 text-red-400 font-black text-lg h-8 w-8 p-1 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 hover:text-white hover:duration-700 fa fa-trash-o"></i>
                                </button>
                            </form>
                          
                        </div>

                        @empty

                        <h1 class="flex mt-4 items-center justify-center py-4 bg-blue-300 text-bold text-white px-2">Pas de categorie</h1>

                        @endforelse
       

            </div>
        </section>

        <!-- Formulaires d'ajout ... -->

    <form class="bg-red-100 p-2 order-first md:order-last md:fixed md:right-0 md:top-20 md:w-[26%] lg:w-[28%] xl:w-[33%] z-40" enctype="multipart/form-data" method="post" action="{{ isset($categorieedit) ? route('partenaires.categorie.update', $categorieedit) : route('partenaires.categorie.store') }}">
            @csrf
            @if(isset($categorieedit))
                @method('PUT')
            @endif
    <fieldset class="group p-2 border-2 min-h-[200px] border-black rounded-lg grid grid-cols-3 gap-2 md:grid-cols-1">
        <legend class="group-hover:bg-cyan-300/70 group-hover:rounded-lg group-hover:duration-1000 text-base font-bold text-center p-1">Ajout/Modification</legend>

        <!-- Libelle -->
        <div>
            <label for="libelle" class="block text-sm font-medium text-gray-700">Libellé</label>
            <input type="text" name="libelle" id="libelle" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ isset($categorieedit) ? $categorieedit->libelle : old('libelle') }}" required autofocus />
        </div>

        <!-- Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" accept="image/*" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>
                @if(isset($categorieedit))
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Image Actuelle</label>
                        <img class="w-[180px] h-[180px] cursor-grab object-cover rounded-full duration-700 scale-[65%] hover:scale-75" src="/storage/{{$categorieedit->image}}" alt="Image Actuelle">
                    </div>
                @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="col-span-3 text-sm text-red-400 text-center mt-1">{{ $error }}</div>
            @endforeach
        @endif

        <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-check-circle-o"></i> Valider</button>
        <button type="reset" class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"><i class="fa fa-ban"></i> Annuler</button>
    </fieldset>
</form>


           
    </div>
</main>


@endsection