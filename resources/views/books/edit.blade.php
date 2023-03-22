<x-app-layout>
    <div class="container">
        <h2 class="subtitle">Modification</h2>
        <div class="card">
            <form enctype="multipart/form-data" action="{{ route('services.update', $book->id) }}" method="PUT">
                @csrf
                <div class="bloc">
                    <label for="name">Titre : </label>
                    <input class="input-text" type="text" name="name" value="{{ $book->name }}" id="name">
                </div>
                <div class="bloc">
                    <label for="name">Auteur : </label>
                    <input class="input-text" type="text" name="name" value="{{ $book->author }}" id="name">
                </div>
                <div class="bloc">
                    <label for="file">Modifier la photo : </label>
                    <input type="file" name="file" placeholder="{{ $book->picture_path }}" id="file">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="bloc">
                    <img class="" src="{{ URL::to('/') }}/images/books/{{ $book->picture_path }}">
                </div>
                <button class="btn btn-save" type="submit">
                    Modifier
                </button>
                <a href="{{ route('services.index') }}">
                    <button class="btn btn-delete" type="button">
                        Annuler
                    </button>
                </a>
        </div>
        </form>
    </div>
    </div>
</x-app-layout>