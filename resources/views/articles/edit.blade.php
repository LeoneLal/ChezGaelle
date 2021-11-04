<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form class="w-full max-w-sm" action="{{ route('article.edit',  $article->id) }}" method="POST">
                    @csrf
                    <div class="items-center border-b border-teal-500 py-2">
                        <label for="title">Title</label>
                        <input name="title" id="title" type="text" value="{{$article->title}}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" >
                    </div>
                    <div class="items-center border-b border-teal-500 py-2">
                        <label for="body">Body</label>
                        <textarea name="body" id="body" type="number" value="{{$article->body}}" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" >{{$article->body}}</textarea>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('article.update',  $article->id) }}">
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 py-1 px-2 rounded" type="submit">
                                Apply
                            </button>
                        </a>
                        <a href="{{ route('articles.index') }}">
                            <button class="border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                                Cancel
                            </button>
                        </a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>