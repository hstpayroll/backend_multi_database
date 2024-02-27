@extends('layouts.master')
@section('title')
    {{ __('Tenants') }}
@endsection
@section('content')
    <x-page-title title="Tenants" pagetitle="HR Management" />

    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">


        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{ route('tenants.store') }}" method="POST">
                @csrf

                @include('landlord.tenants._form')
                <div class="xl:col-span-12">
                    <x-button variant="green">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
