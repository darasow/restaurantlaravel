@extends('base')
@section('title', 'Acceuil')

@section('content')



@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès !</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497-1.32l1.15-1.348-1.15-1.348a1 1 0 1 1 1.497-1.32l1.933 2.26a1 1 0 0 1 0 1.32l-1.933 2.26a1 1 0 0 1-.638.26z"/></svg>
        </span>
    </div>
@endif

@if(session('errors'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur !</strong>
        <span class="block sm:inline">{{ session('errors') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1 1 0 0 1-1.497-1.32l1.15-1.348-1.15-1.348a1 1 0 1 1 1.497-1.32l1.933 2.26a1 1 0 0 1 0 1.32l-1.933 2.26a1 1 0 0 1-.638.26z"/></svg>
        </span>
    </div>
@endif


<form method="post" action="{{ route('partenaires.reference.store') }}" class="w-1/2 mx-auto">
  @csrf

<div class="mt-6">
 <label for="reference" class="block text-sm font-medium leading-5  text-gray-700">
Reference du restaurant
</label>
 <div class="mt-1 relative rounded-md shadow-sm">

                        <select name="id" id="reference" class="w-full">
                                   @foreach($restaurants as $valeur)
                                    <option value="{{$valeur->id}}">{{$valeur->reference}}</option>
                                   @endforeach
                        </select>
 <div class="hidden absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
         <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
             <path fill-rule="evenodd"
                 d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                 clip-rule="evenodd"></path>
         </svg>
     </div>
 </div>
</div>


<div class="mt-6">
 <span class="block w-full rounded-md shadow-sm">
<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
Acceder
</button>
</span>
</div>
</form>




@endsection
