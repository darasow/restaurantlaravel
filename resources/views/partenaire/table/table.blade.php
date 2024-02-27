@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Table')

@section('content')

<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-28 relative top-[120px] sm:top-[133px] md:top-[85px] lg:top-[82px] md:left-[160px] md:max-w-[77vw] lg:max-w-[82vw]">
    <!--CONTAINER GLOBALE-->
    <div class="grid grid-cols-1 md:grid-cols-3">
        <!-- LISTES des tables -->
        <section class="md:col-span-2">
            <h1 class="font-black text-orange-600 text-xl md:text-3xl py-5 px-2">Mes Tables :</h1>
            @foreach ($tables as $table)
                <div class="bg-gray-200 grid grid-cols-4 rounded-lg">
                    <div class="col-span-2 flex flex-col items-center">
                        <p class="font-thin">Identifiant : {{ $table->id }}</p>
                        <p class="font-thin">Date d'ajout : {{ $table->created_at }}</p>
                        <p class="font-thin">Nombre de place : {{ $table->nbPlace }}</p>
                    </div>
                </div>
                <hr>
            @endforeach
        </section>

        <!-- Formulaires d'ajout ... -->
<form method="post" action="{{ isset($tableedit) ? route('partenaires.table.update', $tableedit->id) : route('partenaires.table.store') }}" class="bg-red-100 p-2 order-first md:order-last md:fixed md:right-0 md:top-20 md:w-[26%] lg:w-[28%] xl:w-[33%] z-40">
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
