@if (session('creating'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('addDepartment');
            modal.classList.remove('hidden');
        });
    </script>
@endif

<div id="addDepartment" modal-center class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 ">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
            <h5 class="text-16">Add Department</h5>
            <button data-modal-close="addDepartment"
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                    class="w-5 h-5"></i></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
            <form action="{{route('departments.store')}}" method="POST">
                @csrf
                    <div class="grid grid-cols-1 gap-4 xl:grid-cols-12">

                        <div class="xl:col-span-12">
                            <label for="name" class="inline-block mb-2 text-base font-medium"> Department Name</label>
                            <input type="text" name="name"
                            class="form-input
                                @if ($errors->has('name') && session('creating')) 
                                    border-red-500 dark:border-red-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-red-500 dark:disabled:border-red-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @else
                                    border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200
                                @endif" value="{{ old('name') }}" placeholder="Department Name">
                                @if($errors->has('name') && session('creating'))
                                    <span class="text-red-500 dark:text-red-500 text-sm">{{ $errors->first('name') }}</span> 
                                @endif
                        </div>

                    </div>
                <div class="flex justify-end gap-2 mt-4">
                    <button type="reset" data-modal-close="addDepartment"
                        class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">Cancel</button>
                    <button type="submit"
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                        Department</button>
                </div>
            </form>
        </div>
    </div>
</div><!--end add Department-->