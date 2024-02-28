@extends('tenants.finance.Common.Company-Management')

@section('body')


<div class="card">
    <div class="card-body">

        <div class="flex justify-between items-center">
            <div class="text-left">
                <h3 class="mb-8 text-15">Company Detail</h3>
            </div>
            <div class="text-right">
                <button id="editButton">
                    <i data-lucide="pencil" class="inline-block w-6 h-6 mr-2"></i>Edit
                </button>            
            </div>
        </div>

        @if (session('updating'))
            @if ($errors->any())
                <div class="alert alert-danger flex items-center justify-center">
                    <div class="px-4 py-3 text-sm text-red-500 border border-transparent rounded-md bg-red-50 dark:bg-red-400/20">
                        <span class="font-bold">ERROR!!!</span><br>
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span><br>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
        @include('tenants.finance.company.edit')
        @include('tenants.finance.company.show')
    </div>
</div>

{{-- <script>
document.getElementById('editButton').addEventListener('click', function() {
    var inputs = document.querySelectorAll('.form-input');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = !inputs[i].disabled;
    }
});
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var editButton = document.getElementById('editButton');
        var editModal = document.getElementById('editcompanyForm');
        var showModal = document.getElementById('showcompanyForm');

        if (editButton && editModal && showModal) {
            editButton.addEventListener('click', function() {
                if (editModal.classList.contains('hidden')) {
                    editModal.classList.remove('hidden');
                    showModal.classList.add('hidden');
                } else {
                    editModal.classList.add('hidden');
                    showModal.classList.remove('hidden');
                }
            });
        }
    });
</script>

@endsection