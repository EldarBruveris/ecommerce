<x-layout>
    <x-slot:heading>
        Edit "{{ $good->name }}"
    </x-slot:heading>

    <form method="POST" action="/goods/{{ $good->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-5">
          <div class="border-b border-gray-900/10 pb-5">

            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                  <x-form-input name="name" id="name" placeholder="Шруповерт" value="{{ $good->name }}" required></x-form-input>
                  <x-form-error name='name'/>
                </div>
              </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="description">Description</x-form-label>
                  <div class="mt-2">
                    <x-form-input name="description" id="description" placeholder="blablabla" value="{{ $good->description }}" required></x-form-input>
                    <x-form-error name='description'/>
                  </div>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="image">Image</x-form-label>
                <div class="mt-2">
                  <x-form-input name="image" type="file" id="image" value=""></x-form-input>
                  <x-form-error name='image'/>
                </div>
              </div>
          </div>
        
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <button form='delete-form' class="text-white rounded-lg px-3 py-2 bg-red-600 hover:bg-red-800 transition-colors duration-300">
                    Delete
                </button>
            </div>
            
            <div class="flex items-center gap-x-6">
                <a href="/goods" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div>
                    <x-form-button>Save changes</x-form-button>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" id="delete-form" class="hidden" action="/goods/{{ $good->id }}">
        @csrf
        @method('DELETE')
    </form>
</x-layout>