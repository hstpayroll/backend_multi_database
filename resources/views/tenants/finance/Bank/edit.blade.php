@if (session('updating'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalId = 'EditBank{{ session('id') }}';
            var modal = document.getElementById(modalId);
                modal.classList.remove('hidden')
        });
    </script>
@endif

<div id="EditBank{{$bank->id}}" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
            <h5 class="text-16">Edit Bank {{$bank->id}}</h5>
            <button data-modal-close="EditBank{{$bank->id}}"
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500">
                <i data-lucide="x" class="w-5 h-5"></i></button>
        </div>

        @if (session('updating') && $bank->id == session('id')) 
            <div class="alert alert-danger flex items-center justify-center">

                <div
                    class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                    <span class="font-bold">ERROR!!!</span>
                </div>
                
            </div>
        @endif

        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{route('banks.update', $bank->id)}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">

                        <div class="xl:col-span-12">
                            <label for="name" class="inline-block mb-2 text-base font-medium"> Bank Name</label>
                            <input type="text" name="name"
                            class="form-input
                            @if ($errors->has('name') && session('updating') && $bank->id == session('id'))
                                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @else
                                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @endif" 

                                @if (session('updating') && $bank->id == session('id')) 
                                value="{{ old('name') }}" placeholder="Bank Name"
                                @else
                                value="{{ $bank->name }}" placeholder="Bank Name"
                                @endif
                                >
                                @if ($errors->has('name') && session('updating') && $bank->id == session('id'))
                                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('name') }}</span> 
                                @endif
                        </div>
                        
                        <div class="xl:col-span-12">
                            <label for="swift" class="inline-block mb-2 text-base font-medium">Bank Swift</label>
                            <input type="text" name="swift"
                                class="form-input 
                                @if ($errors->has('swift') && session('updating') && $bank->id == session('id'))
                                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @else
                                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @endif"

                                @if (session('updating') && $bank->id == session('id')) 
                                value="{{ old('swift') }}" placeholder="Bank Name"
                                @else
                                value="{{ $bank->swift }}" placeholder="Bank Name"
                                @endif
                                >
                                @if ($errors->has('swift') && session('updating') && $bank->id == session('id'))
                                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('swift') }}</span> 
                                @endif
                        </div>

                    </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" data-modal-close="EditBank{{$bank->id}}"
                        class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                    <button type="submit"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Update
                        Bank</button>
                </div>
            </form>
        </div>
    </div>
</div><!--end edit Bank-->