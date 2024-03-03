@extends('Client.base', ['restaurant' => $restaurant])
@section('title', 'Client')

@section('content')

	<main class="z-0 pb-20  relative top-[247px] md:top-[275px] lg:top-[165px] md:max-w-[79vw] flg:max-w-[61vw] ">
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
		
	
		<!--Le Menu-->
			<section class="flex justify-centerh space-x-5 items-centerh min-w-full flex-col">
            @foreach($categories as $categorie)
				<h2 id="{{$categorie->libelle}}" 
				data-aos="fade-right"
				data-aos-easing="ease-in-sine"
				data-aos-duration="800" class="text-orange-500 text-bold text-xl lg:text-4xl">{{$categorie->libelle}}</h2>
				<!--ses elements ::: grille -->
				<div class="py-10 grid grid-cols-1 sm:grid-cols-3 space-y-5 sm:space-y-0 gap-y-10 place-items-center gap:5 lg:grid-cols-4">
					
                @foreach($categorie->elements as $element)
								<div class="bg-green-300 max-w-[250px] pb-2 flex flex-col justify-center items-center space-y-0 rounded-xl relative">
									<i class="cursor-pointer z-20 absolute top-1 right-2 fa fa-heart-o text-[#fff] font-black h-8 w-8 p-1 bg-red-300 hover:bg-red-600 hover:duration-700 rounded-full flex items-center justify-center "></i>
									<div
										data-aos="zoom-out-up"
										data-aos-easing="linear"
										data-aos-duration="1200" class="relative w-[180px] h-[180px]">
										<img class="z-0 w-full h-full cursor-grab object-cover rounded-full duration-700 scale-[75%] hover:scale-[85%]" src="/storage/{{ $element->image }}" alt="{{ $element->libelle }}">
										<span 
										data-aos="fade-down-left"
										data-aos-easing="linear"
										data-aos-duration="1000" class="absolute z-20 top-1/2 rounded-l-xl px-2 font-semibold text-base right-0 bg-red-500/90">{{$element->prix}} Gnf</span>
									</div>
									<h3 
									data-aos="fade-up-right"
									data-aos-easing="linear"
									data-aos-duration="1200" class="text-lg font-bold">{{$element->titre}}</h3>
									<div class="font-thin px-4 flex flex-col items-center justify-between w-[80%] px-4 relative">
										<button class="absolute top-1/2 -translate-y-1/2 left-0 decrement">
										  <i class="text-xl hover:text-red-500 fa fa-minus"></i>
										</button>

										 <span class="text-2xl font-bold quantite" id="1" date-variable-value="}">1</span>
										
										<button class="absolute top-1/2 -translate-y-1/2 right-0 increment">
										  <i class="text-xl hover:text-red-500 fa fa-plus"></i>
										</button>
									</div>
									<div id="confirmation-modal-ajout" class="modal_ajout">
										<div class="modal-content">
											<p>Voulez-vous vraiment ajouter ?</p>
											<div class="modal-buttons">
												<button class="oui">Oui</button>
												<button class="non">Non</button>
											</div>
										</div>
									</div>
									<div
										data-aos="zoom-out-down"
										data-aos-easing="linear"
										data-aos-duration="800" class="flex justify-center items-center">
										<i class="text-yellow-500 text-base p-1 fa fa-star"></i>
										<i class="text-yellow-500 text-base p-1 fa fa-star"></i>
										<i class="text-yellow-500 text-base p-1 fa fa-star"></i>
										<i class="text-yellow-500 text-base p-1 fa fa-star"></i>
										<i class="text-yellow-500 text-base p-1 fa fa-star-half-o"></i>
									</div>
									<div id="confirmation-modal" class="modal">
										<div class="modal-content">
											<p class="text-xs md:text-base text-center font-black text-orange-500">Information <i class="fa fa-info-circle"></i></p>
											<p class="min-w-[200px] flex items-center justify-center text-base md:text-lg text-gray-400 py-10">{{$element->description}}</p>
											
											<div class="modal-buttons">
												<button class="fermer py-2 px-4 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Fermer</button>
											</div>
										</div>
									</div>
									<button data-id="{{$element->id}}" data-aos="zoom-in-up" data-aos-easing="linear" data-aos-duration="1000" class=" element_info elem w-[80%] bg-red-400 rounded-xl p-2 hover:bg-red-600 hover:duration-700 hover:text-white font-thin">
										Plus d'info <i class="fa fa-info-circle"></i>
									</button>
									<button  data-id-commande="{{$element->id}}" class="ajouterPanier element_panier min-w-max w-1/4 bg-blue-300 rounded-xl p-2 hover:bg-blue-400 hover:duration-700 hover:text-white font-thin flex items-center justify-center"><span class="hidden sm:block">Ajouter au panier </span> <i class="fa fa-info-circle"></i></button>
								
									
									
									
								
									<span date-id-table="{{$restaurant->id}}"></span>
	
								

								</div>
								@endforeach

				</div>
                @endforeach
			</section>
			
		</main>

		@endsection
