@if (session('creating'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('addfiscal_year');
            modal.classList.remove('hidden');
        });
    </script>
@endif

<div id="addfiscal_year" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 ">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
            <h5 class="text-16">Add Currency</h5>
            <button data-modal-close="addfiscal_year"
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500">
                <i data-lucide="x"  class="w-5 h-5"></i></button>
        </div>

        @if (session('creating'))
                <div class="alert alert-danger flex items-center justify-center">
                    <div class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                        <span class="font-bold">ERROR!!!</span>
                    </div>
                </div>
        @endif

        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{route('fiscal_years.store')}}" method="POST">
                @csrf
                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">

                        <div class="xl:col-span-12">
                            <label for="name" class="inline-block mb-2 text-base font-medium"> Fiscal Year Name</label>
                            <input type="text" name="name"
                            class="form-input
                                @if ($errors->has('name') && session('creating')) 
                                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @else
                                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @endif" value="{{ old('name') }}" placeholder="Fiscal Year Name">
                                @if($errors->has('name') && session('creating'))
                                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('name') }}</span> 
                                @endif
                        </div>

                        <div class="xl:col-span-12">
                            <label for="start_date" class="inline-block mb-2 text-base font-medium">Start Date</label>
                            <div class="relative">
                                <input type="date" name="start_date" class="form-input
                                    @if ($errors->has('start_date') && session('creating')) 
                                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                    @else
                                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                    @endif" 
                                    value="{{ old('start_date') }}" placeholder="YYYY-MM-DD" id="start_date_input">
                            </div>
                            @if($errors->has('start_date') && session('creating'))
                                <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('start_date') }}</span> 
                            @endif
                        </div>                        

                        <div class="xl:col-span-12">
                            <label for="description" class="inline-block mb-2 text-base font-medium"> Description</label>
                            <textarea name="description" rows="4"
                                class="form-input
                                    @if ($errors->has('description') && session('creating')) 
                                        border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                    @else
                                        border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                    @endif">{{ old('description') }}</textarea>
                            @if($errors->has('description') && session('creating'))
                                <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('description') }}</span> 
                            @endif
                        </div>                        

                    </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" data-modal-close="addfiscal_year"
                        class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                    <button type="submit"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                        Add Fiscal Year</button>
                </div>
            </form>
        </div>
    </div>
</div><!--end add Fiscal Year-->