<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="space-y-5">
          <div class="border-b border-gray-900/10 pb-5">

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="email">Email</x-form-label>
                  <div class="mt-2">
                    <x-form-input name="email" id="email" placeholder="blabla@gmail.com" :value="old('email')" required></x-form-input>
                    <x-form-error name='email'/>
                  </div>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="password">Password</x-form-label>
                  <div class="mt-2">
                    <x-form-input name="password" id="password" placeholder="qW12erty" type='password' required></x-form-input>
                    <x-form-error name='password'/>
                  </div>
                </div>
            </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
          <x-form-button>Login</x-form-button>
        </div>
      </form>
</x-layout>