<div id="editcompanyForm" class="hidden">
    <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-12">

            <div class="xl:col-span-3">
                <label for="name" class="inline-block mb-2 text-base font-medium">Company Name</label>
                <input type="text" id="name" name="name" class="form-input
                @if ($errors->has('name') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @else
                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @endif" 
                @if (session('updating') && $company->id == session('id')) 
                    value="{{ old('name') }}"
                @else
                    value="{{ $company->name }}"
                @endif>
                @if($errors->has('name') && session('updating'))
                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('name') }}</span> 
                @endif
            </div>

            <div class="xl:col-span-3">
                <label for="address" class="inline-block mb-2 text-base font-medium">Company Address</label>
                <input type="text" id="address" name="address"
                    class="form-input 
                @if ($errors->has('address') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @else
                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @endif" 
                @if (session('updating') && $company->id == session('id')) 
                    value="{{ old('address') }}"
                @else
                    value="{{ $company->address }}"
                @endif>
                @if($errors->has('address') && session('updating'))
                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('address') }}</span> 
                @endif
            </div>

            <div class="xl:col-span-3">
                <label for="tin" class="inline-block mb-2 text-base font-medium">TIN / Taxpayer Identification Number </label>
                <input type="text" id="tin" name="tin"
                    class="form-input 
                @if ($errors->has('tin') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @else
                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                @endif" 
                @if (session('updating') && $company->id == session('id')) 
                    value="{{ old('tin') }}"
                @else
                    value="{{ $company->tin }}"
                @endif>
                @if($errors->has('tin') && session('updating'))
                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('tin') }}</span> 
                @endif
            </div>

            <div class="xl:col-span-3">
                <label for="logo" class="inline-block mb-2 text-base font-medium">Company Logo</label>
                <input type="file" id="logo" name ="logo"
                    class="form-input 
                    @if ($errors->has('logo') && session('updating') && $company->id == session('id')) 
                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('logo') }}"
                    @else
                        value="{{ $company->tin }}"
                    @endif >
                    @if($errors->has('logo') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('logo') }}</span> 
                    @endif
            </div>


            <div class="xl:col-span-3">
                <label for="website" class="inline-block mb-2 text-base font-medium">Website</label>
                <input type="text" id="website" name="website"
                    class="form-input 
                    @if ($errors->has('website') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('website') }}"
                    @else
                        value="{{ $company->website }}"
                    @endif >
                    @if($errors->has('website') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('website') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="email" class="inline-block mb-2 text-base font-medium">Email</label>
                <input type="text" id="email" name="email"
                    class="form-input
                    @if ($errors->has('email') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('email') }}"
                    @else
                        value="{{ $company->email }}"
                    @endif >
                    @if($errors->has('email') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('email') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="phone_number" class="inline-block mb-2 text-base font-medium">Phone No.</label>
                <input type="text" id="phone_number" name="phone_number"
                    class="form-input
                    @if ($errors->has('phone_number') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('phone_number') }}"
                    @else
                        value="{{ $company->phone_number }}"
                    @endif >
                    @if($errors->has('phone_number') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('phone_number') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="address_line" class="inline-block mb-2 text-base font-medium">Address Line</label>
                <input type="text" id="address_line" name="address_line"
                    class="form-input 
                    @if ($errors->has('address_line') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('address_line') }}"
                    @else
                        value="{{ $company->address_line }}"
                    @endif >
                    @if($errors->has('address_line') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('address_line') }}</span> 
                    @endif
            </div>


            <div class="xl:col-span-3">
                <label for="city" class="inline-block mb-2 text-base font-medium">City</label>
                <input type="text" id="city" name="city"
                    class="form-input 
                    @if ($errors->has('city') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('city') }}"
                    @else
                        value="{{ $company->city }}"
                    @endif >
                    @if($errors->has('city') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('city') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="sub_city" class="inline-block mb-2 text-base font-medium">Sub-City</label>
                <input type="text" id="sub_city" name="sub_city"
                    class="form-input 
                    @if ($errors->has('sub_city') && session('updating') && $company->id == session('id')) 
                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('sub_city') }}"
                    @else
                        value="{{ $company->sub_city }}"
                    @endif >
                    @if($errors->has('sub_city') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('sub_city') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="kebele" class="inline-block mb-2 text-base font-medium">Kebele</label>
                <input type="text" id="kebele" name="kebele"
                    class="form-input
                    @if ($errors->has('kebele') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('kebele') }}"
                    @else
                        value="{{ $company->kebele }}"
                    @endif >
                    @if($errors->has('kebele') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('kebele') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="woreda" class="inline-block mb-2 text-base font-medium">Woreda</label>
                <input type="text" id="woreda" name="woreda"
                    class="form-input 
                    @if ($errors->has('woreda') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('woreda') }}"
                    @else
                        value="{{ $company->woreda }}"
                    @endif >
                    @if($errors->has('woreda') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('woreda') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="house_no" class="inline-block mb-2 text-base font-medium">House No.</label>
                <input type="text" id="house_no" name="house_no"
                    class="form-input
                    @if ($errors->has('house_no') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    @if (session('updating') && $company->id == session('id')) 
                        value="{{ old('house_no') }}"
                    @else
                        value="{{ $company->house_no }}"
                    @endif >
                    @if($errors->has('house_no') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('house_no') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="fax" class="inline-block mb-2 text-base font-medium">FAX / Facsimile</label>
                <input type="text" id="fax" name= "fax"
                    class="form-input 
                    @if ($errors->has('fax') && session('updating') && $company->id == session('id')) 
                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @else
                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                    @endif" 
                    value="{{ (session('updating') && $company->id == session('id')) ? old('fax') : $company->fax }}" >
                    @if($errors->has('fax') && session('updating'))
                        <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('fax') }}</span> 
                    @endif
            </div>

            <div class="xl:col-span-3">
                <label for="currency_id" class="inline-block mb-2 text-base font-medium">Calendar</label>
                <select class="form-input border-slate-200 focus:outline-none focus:border-custom-500" data-choices data-choices-search-false name="currency_id" id="currency_id">
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}" @if($currency->id == $company->currency->id) selected @endif>{{ $currency->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="xl:col-span-3">
                <label for="calendar_id" class="inline-block mb-2 text-base font-medium">Calendar</label>
                <select class="form-input border-slate-200 focus:outline-none focus:border-custom-500" data-choices data-choices-search-false name="calendar_id" id="calendar_id">
                    @foreach($calendars as $calendar)
                        <option value="{{ $calendar->id }}" @if($calendar->id == $company->calendar->id) selected @endif>{{ $calendar->name }}</option>
                    @endforeach
                </select>
            </div>                
            
            
            <div class="md:col-span-2 xl:col-span-12">
                        <label for="description" class="inline-block mb-2 text-base font-medium">Description</label>
                        <textarea class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            id="description" name="description" rows="5" >{{ $company->description }}
                        </textarea>                    
            </div>
            
        </div><!--end grid-->

        <div class="flex justify-end space-x-4 mt-6 gap-5">
            <button type="reset"
                    class="ml-4 text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-700 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">
                    <i data-lucide="x-circle" class="inline-block w-4 h-4 mr-2"></i>Cancel
            </button>
        
            <button type="submit"
                    class="mr-4 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                <i data-lucide="refresh-ccw" class="inline-block w-4 h-4 mr-2"></i> <span>Update</span>
            </button>

            
        </div>                      

    </form>
</div>