<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @foreach ($users as $user)
                    <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-between">

                        <div class='flex items-center gap-5'>
                            <img src="{{ asset('storage/avatars/' . $user->avatar->avatar_path) }}" alt=""
                                class='w-28 h-28 object-cover rounded-full'>

                            <div>
                                <h3 class='text-lg'>{{ $user->name . ' ' . $user->first_name }}</h3>

                                <h4 class='text-slate-400 capitalize'>{{ $user->role->role }}</h4>
                            </div>

                        </div>

                        <div class='flex gap-1'>

                            {{-- Bouton EDIT --}}
                            @can('admin')
                                <a href="/users/{{ $user->id }}/edit">
                                    <button class='bg-slate-600 p-2 text-white rounded-md hover:bg-slate-800'>EDIT</button>
                                </a>
                            @endcan

                            {{-- Bouton DELETE --}}
                            @can('admin')
                                <form action="/users/{{ $user->id }}" method='post'>
                                    @csrf
                                    @method('delete')
                                    <button class='bg-red-600 p-2 text-white rounded-md hover:bg-red-800'>DELETE</button>
                                </form>
                            @endcan


                        </div>

                    </div>
                    @endforeach
                    <div>{{ $users ->links() }} </div>

            </div>
        </div>
    </div>

</x-app-layout>
