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
    {{-- password --}}
    <div class="xl:col-span-12">
        <x-label for="password" :value="__('Password')" />
        <x-input type="password" name="password" id="password" :value="old('password')" placeholder="Password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

    </div>
    {{-- conirm Password --}}
    <div class="xl:col-span-12">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-input type="password" name="password_confirmation" id="password_confirmation" :value="old('password_confirmation')"
            placeholder="Confirm Password" />
    </div>
