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
                    <a href="{{ url('/services/create') }}">
                        <button class="btn btn-add">
                            Ajouter un service
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 pictures">
        @foreach ($services as $service)
        <div class="services">
            <div class="infos">
                <img class="logo" src="{{ URL::to('/') }}/images/services/{{ $service->picture_path }}" alt="{{ $service->picture_path }}">
                <span>{{ $service->name }}</span>
            </div>
            <div class="buttons">
                <a href="{{ route('services.edit',  $service->id) }}">
                    <button class="btn btn-update">
                        Edit
                    </button>
                </a>
                <a href="{{ route('services.destroy',  $service->id) }}">
                <button  type="button" class="btn btn-delete">
                    Supprimer
                </button>
            </a>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>