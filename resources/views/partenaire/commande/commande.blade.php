@extends('partenaire.dashboardPartenaire.base')
@section('title', 'Commande')

@section('content')
<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-28  relative top-[120px] sm:top-[133px] md:top-[85px] lg:top-[82px] md:left-[160px] md:max-w-[53vw] lg:max-w-[56vw] ">
    <!--CONTAINER GLOBALE-->
    <h2 class="font-bold text-orange-500 text-lg sm:text-2xl">Liste des commandes</h2>
    <div class="">
        <!--Panier-->
        <!--Accordion: chaque table avec ses commandes-->
        <div class="accordion py-8 md:px-5">
            <div class="contennBx">
                <form class="content">
                    <div class="space-y-2 pb-[2px]">
                    @forelse($elements as $element)
                                <div class="bg-gray-200 grid grid-cols-4 max-h-30 rounded-lg pb-5">
                                <div class="relative w-[180px] h-[180px]">
                            <img class="z-0 w-full h-full cursor-grab object-cover rounded-full duration-700 scale-[75%] hover:scale-[85%]" src="/storage/{{ $element->image }}" alt="{{ $element->titre }}">
                        </div>    
                                <div class="col-span-2 flex flex-col items-center">
                                        <h3 class="font-semibold text-lg text-orange-500">{{$element->titre}}</h3>
                                        <p class="font-thin">Description : {{$element->description}}</p>
                                        <p class="font-thin">Prix : {{$element->prix}}</p>
                                        <p class="font-thin">Montant {{$element->montant_panier}} Gnf</p>

                                        <!-- Btn pour valider une commande-->
                                        <div class="font-thin flex items-center justify-center space-x-3">
                                            <button title="valider" type="submit" class=" bg-blue-500 px-1 text-white font-semibold rounded-full shadow-md hover:bg-blue-700 hover:duration-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-check-circle-o text-xl"></i> </button>
                                            <button title="annuler" type="reset" class=" bg-red-500 px-1 text-white font-semibold rounded-full shadow-md hover:bg-red-700 hover:duration-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"><i class="fa fa-ban text-xl"></i> </button>

                                        </div>
                                    </div>
                                    <div class="place-self-center relative w-full h-full flex items-center justify-center">
                                        <!--  <i title="suppression" class="absolute top-1/2 -translate-y-1/2 right-[1px] text-red-400 font-black text-lg h-8 w-8 p-1 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 hover:text-white hover:duration-700 fa fa-trash-o"></i> -->
                                    </div>
                                </div>
                                @endforeach

                                <!--BTN POUR VALIDER L'ENSEMBLE DES COMMANDES D'UNE TABLE-->
                                <div class="flex items-center justify-center space-x-3">
                                     <button type="submit" class="py-2 px-4 bg-blue-500 text-xs md:text-sm text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-check-circle-o"></i> valider</button>
                                     <button type="reset" class="py-2 px-4 bg-red-500 text-xs md:text-sm text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75"><i class="fa fa-ban"></i> Annuler</button>
                                </div>

                            </div>
                        </form>
            </div>
        </div>

@endsection
