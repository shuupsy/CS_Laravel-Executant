<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class='flex flex-col justify-center items-center'>
                        {{-- Avatar --}}
                        <img src="{{ asset('storage/avatars/' . $user->avatar->avatar_path) }}" alt=""
                            class='w-28 h-28 object-cover rounded-full'>
                        {{-- Prénom / Role --}}
                        <h3 class='text-lg'>{{ $user->name . ' ' . $user->first_name }}</h3>
                        <h4 class='text-slate-400 capitalize'>{{ $user->role->role }}</h4>
                    </div>

                    <div class='my-3'>
                        <h5>Informations personnelles:</h5>
                        <p>{{ $user->email }}</p>
                        <p>{{ $user->age }} ans</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
