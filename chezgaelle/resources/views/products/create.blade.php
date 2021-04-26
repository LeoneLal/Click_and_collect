<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Here you can add a product.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" enctype="multipart/form-data" action="{{ route('product.create') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
            </div>

            <!-- Picture slug -->
            <div>
                <x-label for="file" :value="__('Picture')" />
                <input type="file" name="file" placeholder="Choose file" id="file">
                @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <x-label for="price" :value="__('Price')" />

                <x-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" required />
            </div>

            <!-- Stock -->
            <div>
                <x-label for="stock" :value="__('Stock')" />

                <x-input id="stock" class="block mt-1 w-full" type="number" name="stock" required />
            </div>

            <!-- Category -->
            <div>
                <x-label for="category" :value="__('Category')" />

                <select id="category" class="block mt-1 w-full" name="category_id" required >
                    <option></option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
