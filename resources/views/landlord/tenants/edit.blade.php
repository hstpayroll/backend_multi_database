@extends('layouts.master')
@section('title')
    {{ __('Tenants') }}
@endsection
@section('content')
    <x-page-title title="Tenants" pagetitle="HR Management" />

    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">


        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{ route('tenants.update', $tenant) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="xl:col-span-12">
                    <x-label for="name" :value="__('Company Name')" />
                    <x-input type="text" name="name" id="name" :value="old('name') ?? $tenant->name" placeholder="Company Name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="xl:col-span-12">
                    <x-label for="email" :value="__('Email')" />
                    <x-input type="email" id="email" name="email" :value="old('email') ?? $tenant->email" placeholder="Email " />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- domain --}}
                <div class="xl:col-span-12">
                    <label for="domain" class="inline-block mb-2 text-base font-medium">{{ __('Domain') }}
                    </label>
                    <x-label for="domain" :value="__('Domain')" />
                    <x-input type="text" name="domain" id="domain" :value="old('domain') ?? $tenant->domain" placeholder="Domain" />
                    <x-input-error :messages="$errors->get('domain')" class="mt-2" />
                </div>
                <div class="xl:col-span-12">
                    <x-button variant="green">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
