<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>@yield('title')</title>
</head>
<body class="min-h-[100vh] overflow-x-hidden md:w-[100vw] font-serifs leading-normal bg-gradient-to-l from-red-100 to-bg-red-200 tracking-normal">

<header class="bg-red-200 pb-5">
			<div class=" z-20 fixed md:h-24 left-0 right-0 bg-red-100 sm:py-1 md:py-5 grid grid-cols-2 place-content-evenly place-items-center md:w-full md:grid-cols-8 gap-5 md:space-x-2 lg:gap-10">
				<!-- logo du client -->
				<a href="" class="md:col-span-2 items-center flex max-w-[100px] place-self-start">
					<img class="w-[70px] h-[70px] cursor-grab object-cover rounded-full duration-700 scale-[65%] hover:scale-75" src="/storage/{{$restaurant->avatar}}" alt="logo-restaurant">
					<span class="">{{ $restaurant->nom }}</span>
				</a>
				<x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
				<div>
					<a href="{{ route('partenaires.index') }}" class="flex">Change de restaurant</a>
				</div>
				<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
				<!-- adresse du client -->
				<div class="h-8 md:max-w-[150px] md:col-span-2 md:min-w-max md:grid md:grid-cols-2 gap-5 md:gap-2 lg:gap-10 md:order-last md:place-self-start">
                    <i class="cursor-pointer border-2 border-red-400 rounded-xl hover:bg-white hover:duration-700 min-w-max text-red-400  p-2 fa fa-envelope  your-address"> <span class="text-black " id="add-address">{{ $restaurant->user->email }}</span></i>
					<i class="cursor-pointer border-2 border-red-400 rounded-full hover:bg-white hover:duration-700 p-2 max-w-min md:min-w-max text-red-400 fa fa-user-circle"> <span class="text-black hidden md:inline-block" id="circle">{{ $restaurant->user->name }}</span></i>
                </div>

			</div>


			<aside class="z-10 bg-red-100 md:max-w-[250px] fixed bottom-0 left-0 right-0 md:top-24 md:right-auto overflow-x-auto  grouSp">
				<div class="flex justify-around items-cxenter md:flex-col cursor-pointer w-full min-w-max  uppercase font-semibold">
					<a href="" class="p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 min-w-max w-full border-black hover:bg-white hover:duration-1000"><i class="fa fa-shopping-cart"></i><span class="md:hiWdden group-hover:inline-block" >Commandes</span></a>
					<a href="{{ route('partenaires.table.index') }}" id="index" class="target:bg-black target:shadow-lg p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 border-black hover:bg-white min-w-max w-full hover:duration-1000 "> <i class="fa fa-table"></i><span class="md:hidWden group-hover:inline-block group-hover:duration-[5s]">Tables</span></a>
					<a href="{{ route('partenaires.element.index') }}" id="elements" class="target:bg-black target:shadow-lg p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 border-black hover:bg-white min-w-max w-full hover:duration-1000"><i class="fa fa-list"></i><span class="md:hiddeWn group-hover:inline-block" >Elements</span></a>
					<a href="{{ route('partenaires.categorie.index') }}" id="categories" class="target:bg-black target:shadow-lg p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 min-w-max w-full border-black hover:bg-white hover:duration-1000"><i class="fa fa-bars"></i><span class="md:hiddWen group-hover:inline-block">Categories</span></a>
					<a href="{{ route('partenaires.template.index') }}" class="p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 border-black hover:bg-white min-w-max w-full hover:duration-1000"><i class="fa fa-wpforms"></i><span class="md:hidWden group-hover:inline-block">templates</span></a>
					<a href="" id="clients" class="target:bg-black target:shadow-lg p-3 grid grid-cols-1 place-content-center place-items-center rounded-lg border-x-2 md:border-x-0 md:border-y-2 min-w-max w-full border-black hover:bg-white hover:duration-1000"><i class="fa fa-cutlery"></i><span class="md:hiddWen group-hover:inline-block">Restaurants</span></a>
				</div>
			</aside>
		</header>



        @yield('content')



</body>
</html>
