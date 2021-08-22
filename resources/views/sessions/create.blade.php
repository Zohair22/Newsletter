
<x-layouts>
    <section class="p-8">
        <x-panel class="max-w-lg m-auto mt-10 bg-gray-100 rounded-3xl shadow-2xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <x-form.input name="email" type="email" autocomplete="username"></x-form.input>
                <x-form.input name="password" type="password" autocomplete="password"></x-form.input>
                <x-form.button>login</x-form.button>
            </form>
        </x-panel>
    </section>
</x-layouts>
