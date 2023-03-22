<x-app-layout>
    <div class="container edit-book">
        <h2>Modification</h2>
        <div class="card">
            <form enctype="multipart/form-data" action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                <div class="bloc">
                    <label for="name">Titre : </label>
                    <input class="input-text" type="text" name="title" value="{{ $book->name }}" id="title">
                </div>
                <div class="bloc">
                    <label for="name">Auteur : </label>
                    <input class="input-text" type="text" name="author" value="{{ $book->author }}" id="author">
                </div>
                <div class="bloc">
                    <img class="actual" src="{{asset('images/books').'/'.$book->picture_path}}">
                </div>
                <div class="btns">
                    <button class="btn btn-save" type="submit">
                        Modifier
                    </button>
                    <a href="{{ route('services.index') }}">
                        <button class="btn btn-delete" type="button">
                            Annuler
                        </button>
                    </a>
                </div>
        </div>
        </form>
    </div>
    </div>
</x-app-layout>