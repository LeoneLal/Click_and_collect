<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('/products/create') }}">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Add a product
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($products as $product)
                <div class="p-6 bg-white border-b border-gray-200">
                    <img href="" />
                    <p>{{ $product->name }}</p>
                    <p>{{ $product->price }} €</p>
                    @if($product->stock > 0)
                        <p class="text-green-400">In stock, only {{ $product->stock }} left</p>
                    @else
                        <p class="text-red-500">Sold out</p>
                    @endif
                    <a href="{{ route('product.edit',  $product->id) }}">
                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                            Edit
                        </button>
                    </a>
                    <a href="{{ route('product.destroy',  $product->id) }}">
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