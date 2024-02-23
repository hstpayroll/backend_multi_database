@if ($errors->has('code') || $errors->has('name')) 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('addTenantModal');
            modal.classList.remove('hidden');
            modal.classList.add('w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600');
        });
    </script>    
@endif
<div id="addTenantModal" modal-center
class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 ">
<div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
    <div class="flex items-center justify-between p-4 border-b dark:border-zink-500">
        <h5 class="text-16">{{ __(' Add Tenant') }}</h5>
        <button data-modal-close="addTenantModal"
            class="transition-all duration-200 ease-linear text-slate-400 hover:text-red-500"><i data-lucide="x"
                class="w-5 h-5"></i></button>
    </div>
    <div class="max-h-[calc(theme('height.screen')_-_180px)] p-4 overflow-y-auto">
        <form action="{{route('tenants.store')}}" method="POST">
            @csrf
            @php
                $Variable = 'POST';
            @endphp

            @include('landlord.tenants.form')

            <div class="flex justify-end gap-2 mt-4">
                <button type="reset" data-modal-close="addTenantModal"
                    class="text-red-500 bg-white btn hover:text-red-500 hover:bg-red-100 focus:text-red-500 focus:bg-red-100 active:text-red-500 active:bg-red-100 dark:bg-zink-600 dark:hover:bg-red-500/10 dark:focus:bg-red-500/10 dark:active:bg-red-500/10">{{ __(' Cancel') }}</button>
                <button type="submit"
                    class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">{{ __(' Add Tenant') }}</button>
            </div>
        </form>
    </div>
</div>
</div><!--end add tenants-->