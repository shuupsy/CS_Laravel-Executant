<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>

            <!-- First Name -->
            <div class="mt-4">
                <x-input-label for="firstname" :value="__('First Name')" />

                <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="first_name"
                    :value="old('firstname')" required autofocus />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-input-label for="age" :value="__('Age')" />

                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')"
                    required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- Avatar -->
            <div class="mt-4">
                <x-input-label for="avatar" :value="__('Avatar')" />
                <div class='my-4 flex flex-wrap gap-3 justify-evenly items-center text-center'>
                    @foreach ($avatars as $avatar)
                        <label>
                            <img src="{{ asset('storage/avatars/' . $avatar->avatar_path) }}"
                            alt="{{ $avatar->avatar_name }}" class='w-24 h-24 object-cover rounded-full'>

                            <input type="radio" name="avatar" value="{{ $avatar->id }}">
                        </label>

                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
