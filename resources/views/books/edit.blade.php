<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="w-full max-w-sm" enctype="multipart/form-data" action="{{ route('services.update', $book->id) }}" method="PUT">
                        @csrf
                        <div class="service flex border-b border-teal-500 py-2">
                            <div class="title">
                                <label for="name">Titre</label>
                                <input class="title-input" type="text" name="name" value="{{ $book->name }}" id="name">
                            </div>
                            <div class="picture">
                                <label for="file">Modifier la photo</label>
                                <input type="file" name="file" placeholder="{{ $book->picture_path }}" id="file">
                                @error('file')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="description">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="appearance-none bg-transparent w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" rows="5" cols="33">{{$book->description }}</textarea>
                            </div>
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 py-1 px-2 rounded" type="submit">
                                Modifier
                            </button>
                            <a href="{{ route('services.index') }}">
                                <button class=" border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                                    Annuler
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>