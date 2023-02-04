<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="add_elem">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 add_element">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('/picture/create') }}">
                        <button class="btn btn-add">Ajouter une photo</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 pictures">
        @foreach ($pictures as $picture)
        <div class="picture">
            <img src="{{ URL::to('/') }}/images/pictures/{{ $picture->picture_path }}">
            <span>{{ $picture->created_at }}</span>
            <a href="{{ route('pictures.destroy',  $picture->id) }}">
                <button class="btn btn-delete">Supprimer</button>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>