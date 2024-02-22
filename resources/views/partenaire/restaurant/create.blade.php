@extends('base')
@section('title', 'Ajouter un restaurant')

@section('content')



<form action="{{ route('partenaires.restaurant.store') }}" method="POST" enctype="multipart/form-data" class="w-1/2 mx-auto">
    @csrf

    <!-- Champ pour le nom du restaurant -->
    <div class="mb-4">
        <label for="nom" class="block text-sm font-medium text-gray-700">Nom du restaurant</label>
        <input type="text" name="nom" id="nom" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <!-- Champ pour la référence -->
    <div class="mb-4">
        <label for="reference" class="block text-sm font-medium text-gray-700">Référence</label>
        <input type="text" name="reference" id="reference" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
    </div>

    <!-- Champ pour le avatar -->
    <div class="mb-4">
        <label for="avatar" class="block text-sm font-medium text-gray-700">Logo</label>
        <input type="file" name="avatar" id="avatar" accept="image/*" class="mt-1 p-2 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>

    <!-- Bouton de soumission -->
    <div class="mb-4">
        <button type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:duration-1000 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Ajouter</button>
    </div>
</form>


@endsection