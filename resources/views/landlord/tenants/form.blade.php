<div class="grid grid-cols-1 gap-4 xl:grid-cols-12">

    <div class="xl:col-span-12">
        <label for="name" class="inline-block mb-2 text-base font-medium">{{ __(' Tenants Name') }}</label>
    
        <input name="name" type="text" placeholder="Tenant name" class="form-input 
    
            @if ($errors->has('name')) 
                border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @else
                border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @endif"
    
            id="name"
            
            @if ($Variable == 'PUT' || $val='update') value="{{ isset($tenant) ? old('name', $tenant->name) : '' }} @endif">
        
        @error('name')
            <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="xl:col-span-12">
        <label for="email" class="inline-block mb-2 text-base font-medium">{{ __(' Tenants Email') }}</label>
    
        <input name="email" type="email" placeholder="Tenant email" class="form-input 
    
            @if ($errors->has('email')) 
                border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @else
                border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @endif"
    
            id="email" 
            
            @if ($Variable == 'PUT') value="{{ isset($tenant) ? old('email', $tenant->email) : '' }}" @endif>
        
        @error('email')
            <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    @if ($Variable == 'POST')
        <div class="xl:col-span-12">
            <label for="password" class="inline-block mb-2 text-base font-medium">{{ __(' Tenants Password') }}</label>
        
            <input name="password" type="password" placeholder="Tenant password" class="form-input 
        
                @if ($errors->has('password')) 
                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @else
                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @endif"
        
                id="password" 
                
                @if ($Variable == 'PUT') value="{{ isset($tenant) ? old('password', $tenant->password) : '' }}" @endif>
            
            @error('password')
                <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="xl:col-span-12">
            <label for="password_confirmation" class="inline-block mb-2 text-base font-medium">{{ __(' Confirm Tenants Password') }}</label>
        
            <input name="password_confirmation" type="password" placeholder="Tenant password_confirmation" class="form-input 
        
                @if ($errors->has('password_confirmation')) 
                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @else
                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @endif"
        
                id="password_confirmation" 
                
                @if ($Variable == 'PUT') value="{{ isset($tenant) ? old('password_confirmation', $tenant->password_confirmation) : '' }}" @endif>
            
            @error('password_confirmation')
                <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    @endif

    <div class="xl:col-span-12">
        <label for="domain" class="inline-block mb-2 text-base font-medium">{{ __(' Tenants domain') }}</label>
    
        <input name="domain" type="text" placeholder="Tenant domain" class="form-input 
    
            @if ($errors->has('domain')) 
                border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @else
                border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
            @endif"
    
            id="domain" 
            
            @if ($Variable == 'PUT') value="{{ isset($tenant) ? old('domain', $tenant->domain) : '' }}" @endif>
        
        @error('domain')
            <span class="text-red-500 dark:text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    
</div>