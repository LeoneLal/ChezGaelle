<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Here you can add an article.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('article.create') }}">
            @csrf

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>

            <!-- Picture path -->
            <div>
                <x-label for="file" :value="__('Picture')" />
                <input type="file" name="file" placeholder="Choose file" id="file">
                @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Body -->
            <div>
                <x-label for="body" :value="__('Body')" />

                <textarea id="body" class="block mt-1 w-full" type="text" name="body" required ></textarea>
            </div>

            <!-- Author -->
            <div>
                <x-label for="author" :value="__('Author')" />

                <x-input id="author" class="block mt-1 w-full" type="text" name="author" required />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
