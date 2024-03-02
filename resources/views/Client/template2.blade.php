@extends('Client.base', ['restaurant' => $restaurant])
@section('title', 'Client')

@section('content')

<main class="z-0 pb-20  relative top-[236px] md:top-[275px] lg:top-[165px] xmd:max-w-[85vw] lg:max-w-[75vw] ">
    <!--CATEGORIES-->
    <section class="z-50 bg-gradient-to-r from-red-100 via-red-300 to-bg-red-200 fixed top-[95px] md:top-[135px] p-1 left-0 right-0   lg:left-auto lg:right-[20vw]s lg:bottom-0 lg:right-0 overflow-x-auto grouSp">
				<h1 class="text-2xl text-center font-black py-3 hover:text-red-900 hidden lg:block">Catégories</h1>
				<hr class="hidden lg:block w-full h-[3px]  bg-black">
				<div class=" py-2 flex items-center md: space-x-5 lg:flex-col lg:justify-center lg:space-y-2 lg:space-x-0  min-w-max font-semibold">
					
                @foreach($categories as $categorie)
					<div class="relative max-h-28 max-w-[100px] cursor-pointer grid grid-rows-1 lg:grid-cols-2 lg:place-content-center hover:bg-gradient-to-r from-red-200 to-red-400 hover:duration-700    lg:min-w-[20vw] rounded-lg">
						<a href="#{{$categorie->libelle}}" class="absolute inset-0 z-20 peer"></a>
						<img class="w-24 h-24 object-contain rounded-full scale-75 peer-hover:scale-100 peer-hover:duration-700" src="/storage/{{ $categorie->image }}" alt="{{ $categorie->libelle }}">
						<h3 class="text-center text-sm md:text-base lg:flex lg:items-center  peer-hover:text-white ">{{$categorie->libelle}}</h3>
					</div>
                    @endforeach
					
				</div>
			</section>
		


		    <!--LE MENU!-->
            <section class="">
                <!--Categorie 1-->
                @foreach($categories as $categorie)
                <h2 id="{{$categorie->libelle}}" class="text-orange-500 text-bold text-xl lg:text-4xl py-4 font-['mono']">{{$categorie->libelle}} :</h2>
                <div class="bg-gray-200 grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 group relative">
                    <img class="place-self-center w-[180px] h-[180px] object-contain rounded-full scale-75 group-hover:scale-90 animate-pulse group-hover:duration-700"  src="/storage/{{ $categorie->image }}" alt="{{ $categorie->libelle }}">

                    <!-- Les Elements -->
                    <!--CARDS -->
                    <div class="font-['serif'] border-l-2 border-black col-span-2 md:col-span-3 lg:col-span-4 bg-blue-200 rounded-lg grid grid-cols-1 gap-5 p-2">
                    @foreach($categorie->elements as $element)
                            <div class="flex justify-around max-h-10 w-full items-center">
                                <h2 class="font-semibold text-lg w-1/3 ">{{$element->titre}}</h2>
                                <p class="font-bold w-1/3">{{$element->prix}} Gnf</p>
								<button  data-id="{{$element->id}}" class="element elem min-w-max w-1/4 bg-red-400 rounded-xl p-2 hover:bg-red-600 hover:duration-700 hover:text-white font-thin flex items-center justify-center"><span class="hidden sm:block">Plus d'info </span> <i class="fa fa-info-circle"></i></button>
                                <!--Boite modale-->
								<div id="confirmation-modal" class="modal">
										<div class="modal-content">
											<p class="text-xs md:text-base text-center font-black text-orange-500">Information du plat<i class="fa fa-info-circle"></i></p>
											<h3 class="text-orange-200 text-center text-2xl">{{$element->titre}}</h3>
                                            <p class="min-w-[200px] flex items-center justify-center text-base md:text-lg text-gray-400 py-10">{{$element->description}}</p>
											
											<div class="modal-buttons">
												<button class="oui py-2 px-4 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Fermer</button>
											</div>
										</div>
								</div>
                            </div>
                            @endforeach
                    </div>
                </div>
                @endforeach

            </section>

		</main>

@endsection
