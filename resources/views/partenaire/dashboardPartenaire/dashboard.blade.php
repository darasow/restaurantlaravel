@extends('partenaire.dashboardPartenaire.base', ['restaurant' => $restaurant])
@section('title', 'Dashboard')

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


@endsection