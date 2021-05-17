<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="little-card bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('/categories/create') }}">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Add a category
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="little-card column-card bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($categories as $category)
                <div class="center-card p-6 bg-white border-b border-gray-200">
                    <p>{{ $category->name }}</p>
                    
                    <a href="{{ route('category.edit',  $category->id) }}">
                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                        Edit
                        </button>
                    </a>
                    <a href="{{ route('category.destroy',  $category->id) }}">
                    
                        <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                        Delete
                        </button>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
