@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Template')
@section('content')

<main class="z-0  pb-20  relative top-[115px] sm:top-[130px] md:top-[80px] lg:top-[78px] md:left-[160px] md:max-w-[79vw] slg:max-w-[59vw] lg:max-w-[82vw]">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès !</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497-1.32l1.15-1.348-1.15-1.348a1 1 0 1 1 1.497-1.32l1.933 2.26a1 1 0 0 1 0 1.32l-1.933 2.26a1 1 0 0 1-.638.26z"/></svg>
        </span>
    </div>
@endif
    <form method="post" action="{{ route('partenaires.template.store') }}" class="pb-20 font-black" >
        <p class="sm:text-lg font-thin">Veuillez choisir un template parmi les modèls disponibles: </p>

        <fieldset class=" py-5 border-[1px] border-black text-center rounded-xl pb-2 text-sm grid grid-cols-1 gap-5 sm:grid-cols-2 ">
            @csrf
            <legend class=" text-lg font-semibold">Templates <i class="fa fa-pencil-square-o"></i>:</legend>
                    <!--MENU 1-->
                    <label class="relative cursor-pointer font-thin space-2  flex flex-col items-center group" for="menu1">
                        <img class="h-[50vh] max-w-[250px] xl:max-w-[350px] object-cover scale-75 group-hover:scale-95 group-hover:duration-700" src="{{ asset('template/menu1.jpg') }}" alt="Menu1">
                        <input type="radio" checked value="template1" name="template" id="menu1" required class=" cursor-pointer border border-slate-300 rounded-full shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </label>
                    <!-- MENU 2-->
                    <label class="relative cursor-pointer font-thin space-2  flex flex-col items-center group" for="menu2">
                        <img class="h-[50vh] max-w-[250px] xl:max-w-[350px] object-cover scale-75 group-hover:scale-95 group-hover:duration-700" src="{{ asset('template/menu2.jpg') }}" alt="Menu2">
                        <input type="radio" value="template2" name="template"  id="menu2" required class=" cursor-pointer border border-slate-300 rounded-full shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm">
                    </label>
        </fieldset>

        <p class="flex justify-center items-center my-4">
            <button type="submit" class="w-2/3 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-check-circle-o"></i> Valider votre choix </button>
        </p>
    </form>


</main>

@endsection
