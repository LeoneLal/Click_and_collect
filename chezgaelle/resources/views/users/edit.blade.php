<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('user.edit', $user->id) }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email (non editable) ')" />

                        <x-input readonly id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                    </div>

            

                    <div class="mt-4">
                        <x-label for="role" :value="__('Rôle')" />

                        <select name="role">
                            <option>{{ $user->role }}</option>
                            @if( $user->role === 'Administrateur')
                            <option value="Client">Client</option>
                            @elseif($user->role === 'Client')
                            <option value="Administrateur">Administrateur</option>
                            @else
                            <option value="Administrateur">Administrateur</option>
                            <option value="Client">Client</option>
                            @endif
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>