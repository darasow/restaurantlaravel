@extends('Client.base', ['restaurant' => $restaurant])
@section('title', 'Client')

@section('content')

<main class="bg-gradient-to-r from-red-100 via-red-300 to-red-100 pb-28  relative top-[120px] sm:top-[133px] md:top-[85px] md:pl-[3%] lg:top-[82px] md:max-w-[65vw] lg:max-w-[68vw] ">

  <!--CONTAINER GLOBALE-->
    <div class="flex flex-col">
        <h2 class="font-bold text-orange-500 text-lg sm:text-2xl">Contenu de mon panier</h2>
        <!--Panier-->
          <div class="space-y-2">
          @foreach($elementPanierClientTable as $elementTables)
                 @foreach($elementTables as $element)
                    
                    <div class="bg-gray-200 grid grid-cols-4  rounded-lg mt-5">
                        <img class="z-0 w-20 h-20 place-self-center cursor-grab object-cover rounded-full duration-700 scale-[75%] hover:scale-[85%]" src="/storage/{{ $element->image }}" alt="{{ $element->titre }}">
                        <div class="col-span-2 flex flex-col items-center">
                            <h3 class="font-semibold text-lg text-orange-500">{{$element->titre}}</h3>
                            <p class="font-thin">{{$element->description}}</p>
                            <p class="font-thin">Date d'ajout : {{$element->panier_client_created_at}}</p>
                            <p class="font-thin">Quantite : {{$element->quantite}}</p>
                            <p class="font-thin">Prix : {{$element->prix}} Gnf - 
                            @if($element->estCommander)

                                 <span>deja commander</span>
                            @else
                            <a onclick="return confirm('Êtes-vous sûr de vouloir continuer ?')" href="{{ route('commande.ajouterCommande.edit',  $element->panier_client_id)}}"  class="validerCmd cursor-pointer  px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-shopping-cart"></i>Commander</a>
                            @endif
                            </p>
                        </div>
                        <div class="place-self-center relative w-full h-full flex items-center justify-center">
                            <span class="font-thin text-xs mr-5">Montant a payer : {{$element->montant}} Gnf</span>
                            @if(!$element->estCommander)
                                <form method="post" action="{{ route('panierClient.ajouterPanier.destroy', $element->panier_client_id) }}" class="inline">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Êtes-vous sûr de vouloir continuer ?')" class="absolute top-1 right-2 text-red-400 font-black text-lg h-8 w-8 p-1 bg-red-100 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 hover:text-white hover:duration-700" type="submit"><i class="fa fa-trash-o"></i></button>
                                </form>
                            @endif  

                        </div>
                    </div>
                    @endforeach
                @endforeach
          </div>





        <!-- Formulaires de confirmation ... -->
        <div class="bg-red-100 p-2 order-first md:order-last max-w-[300px] my-3 mx-auto md:fixed md:right-0 md:top-20 md:w-[26%] lg:w-[28%] z-40">
            <fieldset class="p-2 border-2 min-h-[200px] border-black rounded-lg grid grid-cols-1 gap-5 relative">
                <legend class="text-base font-bold text-center p-1">Mon panier</legend>
                <p class="font-semibold text-sm text-center">{{ now()->toDateString() }} </p>
                <p class="font-semibold">Total Non commander : <span class="font-thin">{{ $sommeTotalEstCommanderFalse }} Gnf</span></p>
                <p class="font-semibold">Total commander : <span class="font-thin">{{ $sommeTotalEstCommanderTrue }} Gnf</span></p>

               
                  <!-- J'ai mis unne div pour eviter l'actualisation de la page qui vas deranger mon code js -->
                 <a onclick="return confirm('Êtes-vous sûr de vouloir continuer ?')" href="{{ route('commande.ajouterCommande.create')}}"  class="validerCmd cursor-pointer py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa fa-shopping-cart"></i> valider le panier</a>
                 <!-- nbres d'elem dispo dans le panier -->
                <div class="absolute right-0 bg-red-300 rounded-lg px-2">
                    <span class="font-semibold text-sm text-white">{{$nbAjout}} {{ ($nbAjout > 1)? 'items' : 'item' }}</span>
                    <span><i class="fa fa-shopping-cart"></i></span>
                </div>
            </fieldset>
        </div>
    </div>
</main>

@endsection