<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="books-creation">
        <form class="" enctype="multipart/form-data" action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-data">
                <div class="bloc author">
                    <label for="description">Auteur</label>
                    <input type="text" name="author" id="author">
                </div>
                <div class="bloc title">
                    <label for="description">Titre</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="bloc-image">
                    <label for="file">Ajouter une image</label>
                    <input type="file" name="file" placeholder="Choose file" id="file">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="bloc">
                    <button class="btn btn-add" type="submit">
                        Ajouter
                    </button>
                    <a href="{{ route('books.index') }}">
                        <button class="btn btn-back" type="button">
                            Annuler
                        </button>
                    </a>
                </div>
            </div>
        </form>

    </div>
</x-app-layout>