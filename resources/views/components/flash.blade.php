

@if(session()->has('success'))
    <div
        x-data="{ show:true }"
        x-init="setTimeout(() => show =false, 3000 )"
        x-show="show"
        class="fixed rounded-xl bottom-3 right-3 text-center uppercase bg-blue-600 text-sm text-white py-2 px-6"
    >
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif

@if(session()->has('adminErrorMessage'))
    <div
        x-data="{ show:true }"
        x-init="setTimeout(() => show =false, 3000 )"
        x-show="show"
        class="fixed rounded-xl bottom-3 right-3 text-center bg-red-600 text-sm text-white py-2 px-6"
    >
        <p>
            {{ session('adminErrorMessage') }}
        </p>
    </div>
@endif
