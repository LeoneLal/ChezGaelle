<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="add_elem">
        <a href="{{ url('/books/create') }}">
            <button class="btn btn-add">
                Ajouter un livre
            </button>
        </a>
    </div>
    <div class="admin-books">
        @foreach ($books as $book)
        <div class="admin-book">
            <img src="{{ URL::to('/') }}/images/books/{{ $book->picture_path }}">
            <span>{{ $book->name }} - {{ $book->author }}</span>
            <a href="{{ route('books.destroy',  $book->id) }}">
                <button type="button" class="btn btn-delete">
                    Supprimer
                </button>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>