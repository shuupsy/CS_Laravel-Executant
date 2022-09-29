<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Avatars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-5">

            {{-- Validation --}}
            @if ($message = Session::get('success'))
                <div class='w-3/12 bg-white px-6 py-1 rounded-md text-sm'>
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form action='/avatars' method="post" enctype="multipart/form-data"
                class="w-1/4 mx-auto p-6 bg-white border-b border-gray-200 flex flex-col items-center justify-center gap-3">
                @csrf

                <label
                    class='w-28 h-28 border-2 border-slate-500 hover:text-sky-600 rounded-full flex justify-center items-center cursor-pointer'
                    for="avatar">
                    <input type="file" name="avatar" id="avatar" class='hidden'>
                    <span class='text-6xl'>+</span>
                </label>

                <!-- Avatar name -->
                <div>
                    <x-input-label for="name" :value="__('Avatar title :')" class='w-9/12 mx-auto' />

                    <x-text-input id="name" class="block mt-1 w-9/12 mx-auto" type="text" name="name" placeholder='ex: cat avatar'
                        :value="old('name')" required autofocus />
                </div>

                <button class='p-2 border-2 border-slate-500 hover:border-slate-800 my-3 rounded-sm'>ADD</button>
            </form>

            <div class='grid grid-cols-5 gap-5'>
                {{-- Liste d'avatars --}}
                @foreach ($avatars as $avatar)
                    <div class="p-6 bg-white border-b border-gray-200 flex flex-col items-center justify-center">
                        <img src="{{ asset('storage/avatars/' . $avatar->avatar_path) }}"
                            alt="{{ $avatar->avatar_name }}" class='w-28 h-28 object-cover rounded-full'>

                        <form action="/avatars/{{ $avatar->id }}" method='post'>
                            @csrf
                            @method('delete')
                            <button
                                class='bg-red-600 p-2 text-white rounded-md hover:bg-red-800 text-sm my-3'>DELETE</button>
                        </form>
                    </div>
                @endforeach
            </div>



        </div>
    </div>
    </div>

</x-app-layout>
