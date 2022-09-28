<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">

            {{-- Validation --}}
            @if ($message = Session::get('success'))
                <div class='bg-white px-6 py-1 rounded-md text-sm'>
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">

                {{-- AJOUT --}}
                <form action='/categories' method='post' class="p-6 bg-white border-b border-gray-200 flex items-center justify-center gap-2">
                    @csrf

                    <x-text-input class="block mt-1 w-full" type="text" name="category_name" placeholder='example: Cats'
                    :value="old('category_name')" required autofocus />

                    <button class='p-2 border-2 border-slate-400 hover:border-slate-800 rounded-md'>ADD</button>
                </form>

                {{-- Liste de catégories --}}
                @foreach ($categories as $category)
                    <div class="p-6 bg-white border-b border-gray-200 flex items-center gap-2">
                        <form action='/categories/{{ $category->id }}' method='post' class='flex items-center'>
                            @csrf
                            @method('patch')

                            <x-text-input class="block mt-1 w-full" type="text" name="category_name"
                                :value="$category->category_name" required autofocus />

                            <a href="/categories/{{ $category->id }}">
                                <button class='bg-slate-600 p-2 text-white rounded-md hover:bg-slate-800'>EDIT</button>
                            </a>
                        </form>

                        <form action="/categories/{{ $category->id }}" method='post'>
                            @csrf
                            @method('delete')
                            <button class='bg-red-600 p-2 text-white rounded-md hover:bg-red-800'>DELETE</button>
                        </form>

                    </div>
                @endforeach

            </div>
        </div>
    </div>


</x-app-layout>
