<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-between">

                    <div>
                        <img src="{{ asset('storage/avatars/' . $user->avatar->avatar_path) }}" alt=""
                            class='w-24 h-24 my-3 object-cover rounded-full'>


                        @if (request()->is('dashboard/*'))
                            <form action='/dashboard/{{ $user->id }}' method='post'>
                        @else
                            <form action='/users/{{ $user->id }}' method='post'>
                        @endif
                 {{--        <form action='/users/{{ $user->id }}' method='post'> --}}
                            @csrf
                            @method('patch')

                            {{-- Form input --}}
                            <div class='flex flex-wrap gap-3 items-center'>
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />

                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="$user->name" required autofocus />
                                </div>

                                <!-- First Name -->
                                <div>
                                    <x-input-label for="firstname" :value="__('First Name')" />

                                    <x-text-input id="firstname" class="block mt-1 w-full" type="text"
                                        name="first_name" :value="$user->first_name" required autofocus />
                                </div>

                                <!-- Age -->
                                <div>
                                    <x-input-label for="age" :value="__('Age')" />

                                    <x-text-input id="age" class="block mt-1 w-full" type="number" name="age"
                                        :value="$user->age" required autofocus />
                                </div>

                                <!-- Email Address -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />

                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                        :value="$user->email" required />
                                </div>

                                <!-- Role -->
                                <div>
                                    <x-input-label for="role" :value="__('Role')" />

                                    <select name="role" id="role"
                                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 capitalize">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>

                            <!-- Form Avatar -->
                            <div class="mt-4">
                                <x-input-label for="avatar" :value="__('Avatar')" />
                                <div class='my-4 flex flex-wrap gap-3 items-center text-center'>
                                    @foreach ($avatars as $avatar)
                                        <label>
                                            <img src="{{ asset('storage/avatars/' . $avatar->avatar_path) }}"
                                                alt="{{ $avatar->avatar_name }}"
                                                class='w-16 h-16 object-cover rounded-full'>

                                            <input type="radio" name="avatar" value="{{ $avatar->id }}"
                                                {{ $user->avatar->id == $avatar->id ? 'checked' : '' }}>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Button --}}
                            <button
                                class='bg-green-600 p-2 my-3 text-white rounded-md hover:bg-green-800'>UPDATE</button>
                        </form>

                    </div>


                </div>


            </div>
        </div>
    </div>

</x-app-layout>
