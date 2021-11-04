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
                    <a href="{{ url('/articles/create') }}">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Ajouter un article
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="product-card products-block bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($articles as $article)
                <div class="product-card  p-6 bg-white border-b border-gray-200 flex">
                    <a href="{{ route('article.show',  $article->id) }}">
                        <img class="img-list-article mr-9" src="{{ URL::to('/') }}/images/articles/{{ $article->picture_path }}">
                    </a>
                    <div>
                        <p>{{ $article->title }}</p>
                        <p class="text-xs">Auteur : {{ $article->author }}</p>
                        <a href="{{ route('article.edit',  $article->id) }}">
                            <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                                Edit
                            </button>
                        </a>
                        <a href="{{ route('article.destroy',  $article->id) }}">
                            <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Delete
                            </button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>