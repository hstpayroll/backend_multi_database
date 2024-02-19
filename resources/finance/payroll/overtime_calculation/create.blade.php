<x-app-layout>
    <x-slot name="header">
        {{ __('Over Time Type') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-blue-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                    </path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Info</span>
                    <p class="text-sm text-gray-600">Sample table page</p>
                    <a href="{{ route('over-time-calculation.create') }}" class="text-blue-500 hover:underline">Create
                        Overtime Calcluation </a>
                </div>
            </div>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input type="text" id="name" name="name" class="block w-full"
                        value="{{ old('name') }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input name="email" type="email" class="block w-full" value="{{ old('email') }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input type="password" name="password" class="block w-full" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label id="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input type="password" name="password_confirmation" class="block w-full" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-primary-button class="block w-full">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
        <script>
            new DataTable('#overtime_calculations');
        </script>
    </div>
</x-app-layout>
