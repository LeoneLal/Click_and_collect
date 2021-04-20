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
                    <a href="{{ url('/gallery/create') }}">
                        <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                            Add a picture
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8 gallery">
        @foreach ($gallery as $picture)
        <div class="picture">
            <img src="{{ URL::to('/') }}/images/gallery/{{ $picture->picture_slug }}">
            <span>{{ $picture->created_at }}</span>
        </div>
        @endforeach
    </div>
</x-app-layout>