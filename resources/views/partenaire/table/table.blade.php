@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Table')

@section('content')

<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-28 relative top-[120px] sm:top-[133px] md:top-[85px] lg:top-[82px] md:left-[160px] md:max-w-[77vw] lg:max-w-[82vw]">
    <!--CONTAINER GLOBALE-->
    <div class="grid grid-cols-1 md:grid-cols-3">
        <!-- LISTES des tables -->
        <section class="md:col-span-2">



        
            <h1 class="font-black text-orange-600 text-xl md:text-3xl py-5 px-2">Mes Tables :</h1>
        

        <div class="mb-5">
            <div class="grid grid-cols-1 place-items-center gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($tables as $table)
                    <div class="bg-green-300/50 pb-5 hover:bg-green-300/90 hover:duration-700 px-4 flex flex-col justify-center items-center space-y-0 rounded-2xl relative">
                        <h3 class="text-lg font-bold">Identifiant : {{ $table->id }}</h3>
                        <p class="py-3 text-thin text-sm text-slate-500 text-center">Date d'ajout : {{ $table->created_at }}</p>
                        <p class="py-3 text-thin text-sm text-slate-500 text-center">Nombre de place : {{ $table->nbPlace }}</p>
                        <a href="{{ route('partenaires.table.edit', ['table' => $table->id]) }}" class="absolute top-1 left-2 text-yellow-500 font-black text-lg h-8 w-8 bg-sky-200 rounded-full cursor-pointer flex items-center justify-center hover:bg-sky-600 hover:duration-700 "><i class="fa fda-spin fa-edit"></i></a>
                        <form method="post" action="{{ route('partenaires.table.destroy', $table) }}" class="inline">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Est-vous sur de continuer ?')" class="absolute top-1 right-2 text-red-400 font-black text-lg h-8 w-8 p-1 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 hover:text-white hover:duration-700 "><i class=" fa fa-trash-o"></i>
                                </button>
                        </form>
                            
                    </div>
                @endforeach
            </div>
        </div>

        </section>

        <!-- Formulaires d'ajout ... -->
<form method="post" action="{{ isset($tableedit) ? route('partenaires.table.update', $tableedit) : route('partenaires.table.store') }}" class="bg-red-100 p-2 order-first md:order-last md:fixed md:right-0 md:top-20 md:w-[26%] lg:w-[28%] xl:w-[33%] z-40">
    @csrf
    @isset($tableedit)
        @method('PUT')
    @endisset
    <fieldset class="group p-2 border-2 min-h-[200px] border-black rounded-lg grid grid-cols-2 gap-2 md:grid-cols-1">
        <legend class="group-hover:bg-cyan-300/70 group-hover:rounded-lg group-hover:duration-1000 text-base font-bold text-center p-1">Ajout/Modification</legend>
        <div>
            <label for="nbPlace" class="block text-sm font-medium text-gray-700">Nombre de place</label>
            <input type="number" name="nbPlace" id="nbPlace" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ isset($tableedit) ? $tableedit->nbPlace : old('nbPlace') }}" required />
        </div>
        <div class="grid grid-cols-2 col-span-2 md:col-span-1 gap-5 w-full">
            <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                <i class="fa fa-check-circle-o"></i> Valider
            </button>
            <button type="reset" class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                <i class="fa fa-ban"></i> Annuler
            </button>
        </div>
    </fieldset>

</form>

    </div>
</main>

@endsection
