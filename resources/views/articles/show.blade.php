<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img class="m-auto" src="{{ URL::to('/') }}/images/articles/{{ $article->picture_path }}">
                    <div class="show-details">
                        <p>{{ $article->title }}</p>
                        <div class="flex justify-between">
                            <p class="text-xs">Auteur : {{ $article->author }}</p>
                            <p class="text-xs">Mis à jour le {{ date_format($article->updated_at, "d/m/Y") }}</p>
                        </div>
                        <p>{{ $article->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>