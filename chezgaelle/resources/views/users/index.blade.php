<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($users as $user)
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{ $user->name }} - {{ $user->email }}</p>
                    
                    <a href="{{ route('user.edit',  $user->id) }}">
                        <button class="bg-transparent hover:bg-yellow-500 text-yellow-500 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                        Edit
                        </button>
                    </a>
                    <a href="{{ route('user.destroy',  $user->id) }}">
                    
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