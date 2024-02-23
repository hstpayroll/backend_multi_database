@if ($errors->has('code') || $errors->has('name')) 
    <div class="alert alert-danger flex items-center justify-center">

        <div
            class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
            <span class="font-bold">ERROR!!!</span> {{ session('error') }}
        </div>
        
    </div>
@endif

<div class="grid grid-cols-1 gap-4 xl:grid-cols-12">
    
    <div class="xl:col-span-12">
        <label for="code" class="inline-block mb-2 text-base font-medium">Currency Code</label>
    
        <input name="code" type="text" class="form-input
    
            @if ($errors->has('code')) 
                border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @else
                border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @endif"
    
            id="code" placeholder="Currency Code. Not more than 3 letter" {{old('code')}} 

            @if ($Variable == 'PUT') value="{{ isset($currency) ? old('code', $currency->code) : '' }}@endif">
        
        @error('code')
            <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="xl:col-span-12">
        <label for="name" class="inline-block mb-2 text-base font-medium">Currency Name</label>
    
        <input name="name" type="text" class="form-input
    
        @if ($errors->has('name')) 
                border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @else
                border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @endif"
    
            id="name" placeholder="Currency Name" {{old('name')}} 

            @if ($Variable == 'PUT') value="{{ isset($currency) ? old('name', $currency->name) : '' }} @endif">
        
        @error('name')
            <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    
</div>
