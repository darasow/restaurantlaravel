<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css',  'resources/js/script.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 

    <title>@yield('title')</title>
</head>
<body class="min-h-[100vh] overflow-x-hidden md:w-[100vw] font-serifs leading-normal bg-gradient-to-l from-red-100 to-bg-red-200 tracking-normal">

<header class="z-20 fixed left-0 right-0 bg-red-100 py-2 sm:py-3 md:py-5 w-full ">
				<div class="flex w-full flex-col-2 items-center justify-around min-w-max space-x-2">
					<!-- logo du client -->
					<a href="" class="w-20 h-20 md:w-24 md:h-24 place-self-start ">
						<img class="w-full h-full animate-pulse rounded-full" src="/storage/{{ $restaurant->avatar }}" alt="{{ $restaurant->nom }}">
					</a>
					<!-- adresse du client -->
					
					<a href="">
						<i class="cursor-pointer border-[1px] border-red-400 rounded-xl hover:bg-white hover:duration-700 min-w-max text-red-400  p-2 fa fa-map-marker your-address">
							<span class="text-black text-sm sm:text-base " id="add-address">Restaurant: {{ $restaurant->nom }}</span>
						</i>
					</a>
                     
					<a href="{{route('panierClient.ajouterPanier.index')}}" class="panierUser">
						<i class="cursor-pointer sm:border-2 sm:border-red-400 rounded-full hover:bg-white hover:duration-700 py-2 px-3 text-xl font-semibold fa fa-cart-plus"> <span class="text-black text-lg hidden sm:inline-block px-2 nbElement" id="cart-plus">{{$nbAjout}}</span> <span class=" text-black">{{ ($nbAjout > 1)? 'items' : 'item' }}</span></i>

					</a>
					
					<div class="text-red-500">
						<i class="cursor-pointer border-[1px] border-red-400 rounded-full hover:bg-white hover:duration-700 py-2 px-3 text-xl font-bold fa fa-commenting-o md:order-first">
							<span class="text-black text-xs sm:text-base" id="add-address">Email: {{ $restaurant->user->email }}</span>
						</i>
					</div>
				</div>

</header>



        @yield('content')


  <script>

	document.addEventListener("DOMContentLoaded", function() {
				AOS.init();
	});




	(function(){
	
	
		var listeincrement = Array.from(document.querySelectorAll(".increment"))
		var listedecrement = Array.from(document.querySelectorAll(".decrement"))
		var quantite = 1
		listeincrement.forEach(element => {
					element.addEventListener("click", ()=>{
						let span  = element.parentNode.querySelector(".quantite")
						let contenu = parseInt(span.textContent)
						if(contenu == 10) return
						quantite  = span.textContent = ++contenu
					})
	
				});

		listedecrement.forEach(element => {
		element.addEventListener("click", ()=>{
			let span  = element.parentNode.querySelector(".quantite")
			let contenu = parseInt(span.textContent)
			if(contenu == 1) return
			quantite = span.textContent = --contenu
		})
	});







listeElement = Array.from(document.querySelectorAll(".ajouterPanier"))
listeElement.forEach(element =>{ 
element.addEventListener("click", (e)=>{
					let hiddenQuantite =  element.parentNode.querySelector(".hiddenQuantite")
					hiddenQuantite.value = quantite

	})  
});





listeElement = Array.from(document.querySelectorAll(".element_info"))
listeElement.forEach(element =>{
element.addEventListener("click", (e)=>{
		let oui = element.parentNode.querySelector(".fermer");
		let modal = element.parentNode.querySelector(".modal");
		modal.style.display = 'flex';
		modal.style.zIndex = 50
		oui.addEventListener('click', ()=>{
		modal.style.display = 'none';

		})
})  
});

})()



  </script>
</body>
</html>

