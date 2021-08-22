
<x-layouts>
    <section class="p-8">

        <x-panel class="bg-gray-100 rounded-3xl shadow-2xl max-w-lg m-auto mt-10">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-form.input name="name" type="text" autocomplete="name"></x-form.input>
                <x-form.input name="username" type="text" autocomplete="username"></x-form.input>
                <x-form.input name="email" type="email" autocomplete="email"></x-form.input>
                <x-form.input name="password" type="password" autocomplete="password"></x-form.input>

                <x-form.button>Register</x-form.button>

            </form>
        </x-panel>
    </section>
</x-layouts>
