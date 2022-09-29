<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- Validation --}}
            @if ($message = Session::get('success'))
                <div class='w-3/12 my-2 bg-white px-6 py-1 rounded-md text-sm'>
                    <p>{{ $message }}</p>
                </div>
            @endif


            {{-- Nouvelle photo --}}
            <form action="/gallery" method="post" enctype="multipart/form-data"
                class='w-2/4 p-6 bg-white border-b border-gray-200 flex flex-col items-center justify-center gap-3'>
                @csrf
                {{-- Ajout photo --}}
                <label
                    class='w-28 h-28 border-2 my-3 border-slate-500 hover:text-sky-600 rounded-full flex justify-center items-center cursor-pointer'
                    for="image_gallery">
                    <input type="file" name="image_gallery" id="image_gallery" class='hidden'>
                    <span class='text-6xl'>+</span>
                </label>

                <!-- Catégorie -->
                <div class='flex items-center gap-3'>
                    <x-input-label for="category" :value="__('Categories : ')" class='w-9/12 mx-auto' />

                    <select name="category" id="category"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 capitalize">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" class='capitalize'>{{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- User --}}
                <div class='flex items-center gap-3'>
                    <x-input-label for="sender" :value="__('Photo envoyée par: ')" class='w-9/12 mx-auto' />

                    <select name="sender" id="sender"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 capitalize text-sm">
                        <option value="{{ auth()->user()->id }}" class='capitalize'>
                            {{ auth()->user()->name . ' ' . auth()->user()->first_name }}</option>
                    </select>
                </div>

                <button class='p-2 border-2 border-slate-500 hover:border-slate-800 my-3 rounded-sm'>ADD</button>
            </form>

            <div class='grid grid-cols-3 gap-2 my-5'>
                @foreach ($categories as $category)
                    <div class='p-6 bg-white border-b border-gray-200'>
                        <h3 class='capitalize text-2xl font-bold'>{{ $category->category_name }}</h3>
                        {{-- Prévisualisation photos --}}
                        <div class='flex flex-wrap justify-center gap-2 my-3'>

                            {{-- S'il y a des images --}}
                            @if (count($images->where('category_id', $category->id)) > 0)
                                @foreach ($images->where('category_id', $category->id) as $img)
                                    <img src="{{ asset('storage/gallery/' . $img->image_path) }}" alt=""
                                        class='w-20 h-20 object-cover border border-black'>
                                @endforeach

                                @if (count($images->where('category_id', $category->id)) < 7)
                                    @for ($i = count($images->where('category_id', $category->id)); $i < 6; $i++)
                                        <div
                                            class='w-20 h-20 object-cover bg-slate-300 border border-black flex justify-center items-center'>
                                            <p>empty</p>
                                        </div>
                                    @endfor
                                @endif

                            {{-- Si y a pas d'images dans la catégorie --}}
                            @else
                                @for ($i = 0; $i < 6; $i++)
                                    <div
                                        class='w-20 h-20 object-cover border border-black flex justify-center items-center bg-slate-300'>
                                        <p>empty</p>
                                    </div>
                                @endfor
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>


        </div>
    </div>


</x-app-layout>
