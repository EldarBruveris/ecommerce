<x-layout>
    <x-slot:heading>
        Create new good
    </x-slot:heading>

    <form method="POST" action="/goods/create" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="space-y-5">
          <div class="border-b border-gray-900/10 pb-5">

            <div class="grid grid-cols-1 gap-x-6 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="name">Name</x-form-label>
                <div class="mt-2">
                  <x-form-input name="name" id="name" placeholder="Name of the good" required></x-form-input>
                  <x-form-error name='name'/>
                </div>
              </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="description">Description</x-form-label>
                  <div class="mt-2">
                    <x-form-input name="description" id="description" placeholder="Description of the good" required></x-form-input>
                    <x-form-error name='description'/>
                  </div>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                <div class="sm:col-span-4">
                  <x-form-label for="cost">Cost</x-form-label>
                  <div class="mt-2">
                    <x-form-input name="cost" type="number" id="cost" placeholder="599" required></x-form-input>
                    <x-form-error name='cost'/>
                  </div>
                </div>
            </div>

            <div class="mt-5 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
              <div class="sm:col-span-4">
                <x-form-label for="image">Image</x-form-label>
                <div class="mt-2">
                  <x-form-input name="image" type="file" id="image" ></x-form-input>
                  <x-form-error name='image'/>
                </div>
              </div>
          </div>
        
        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                
            </div>
            
            <div class="flex items-center gap-x-6">
                <a href="/goods" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <div>
                    <x-form-button>Save changes</x-form-button>
                </div>
            </div>
        </div>
    </form>
</x-layout>