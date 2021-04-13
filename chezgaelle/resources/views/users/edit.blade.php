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
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="new_password" :value="__('New Password')" />

                        <x-input id="new_password" class="block mt-1 w-full"
                                        type="password"
                                        name="new_password"/>
                    </div>

                    <div class="mt-4">
                        <x-label for="role" :value="__('Rôle')" />

                        <select name="role">
                            <option>-- Choisir la valeur --</option>
                            <option value="Administrateur">Administrateur</option>
                            <option value="Client">Client</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>