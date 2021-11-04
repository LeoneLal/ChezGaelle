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
                    <a href="{{ url('/service/create') }}">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Ajouter un service
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 pictures">
        @foreach ($services as $service)
        <div class="picture">
            <img src="{{ URL::to('/') }}/images/pictures/{{ $service->picture_path }}">
            <span>{{ $service->name }}</span>
            <a href="{{ route('article.edit',  $article->id) }}">
                <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                    Edit
                </button>
            </a>
            <a href="{{ route('services.destroy',  $service->id) }}">
                <button  type="button" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                    Supprimer
                </button>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>