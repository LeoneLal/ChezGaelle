<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('pictures.index') }}">
                    <div class=" canvas-div p-6 bg-white border-b border-gray-200">Photos</div>
                </a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('articles.index') }}">
                    <div class=" canvas-div p-6 bg-white border-b border-gray-200">Articles</div>
                </a>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{ route('services.index') }}">
                    <div class=" canvas-div p-6 bg-white border-b border-gray-200">Autres informations</div>
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 change-values">
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg description-admin">
                <form class="w-full max-w-sm" action="{{ route('dashboard.update', $description->id) }}" method="POST">
                    @csrf
                    <label for="description">Description - Page d'accueil : </label>
                    <textarea name="description" id="" cols="30" rows="10" value="{{ $description->value }}">{{ $description->value }}</textarea>
                    <button type="submit" class="save-button">Enregistrer</button>
                </form>
            </div>
        </div>
        <div class="max-w-7xl sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg horaires-admin">
                <label for="horaires">Horaires d'ouverture - Page d'accueil : </label>
                @foreach( $horaires as $horaire)
                <div class="per-day">
                    <span>Ouverture</span>
                    <input type="time" name="open" id="" value="{{ $horaire->value[0] }}">
                    <span>Fermeture</span>
                    <input type="time" name="close" id="" value="{{ $horaire->value[1] }}">
                </div>
                @endforeach
                <button type="submit" class="save-button">Enregistrer</button>
            </div>
        </div>
    </div>
</x-app-layout>