<x-layout>
    <x-slot:heading>
      {{ $good->name }}
    </x-slot:heading>
    
    <div class="mx-auto max-w-7xl px-6 py-10 bg-gray-200 rounded-lg">
      <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
        <div class="">
            <p class="text-lg/8 text-black-600">{{ $good->description }}</p>
            <dl class="mt-10 max-w-xl space-y-8 text-base/7 text-gray-600 lg:max-w-none">
              <div class="relative pl-9">
                <input type="checkbox" name="additions" id="deliver" value="deliver">
                <dd class="inline">Доставка(10$)</dd>
              </div>
              <div class="relative pl-9">
                <input type="checkbox" name="additions" id="consult" value="consult">
                <dd class="inline">Консультация по использования(15$)</dd>
              </div>
              
            </dl>
        </div>
        <img src="{{ $good->img_url }}" alt="Product screenshot" class="rounded-xl ring-1 shadow-xl ring-gray-400/10" width="500" height="300">
      </div>
      <div class="flex flex-row items-center justify-between mt-5">
        <h1 class="text-3xl mt-6">Финальная стоимость: <b id="cost">{{ $good->cost }}$</b></h1>
        <button class="mt-3 px-8 py-3 text-white bg-green-500 font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">Buy Now</button>
      </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const baseCost = parseFloat({{ $good->cost }});
    
        const additionsCost = {
            deliver: 10,
            consult: 15
        };

        const deliverCheckbox = document.getElementById('deliver');
        const consultCheckbox = document.getElementById('consult');
        const costElement = document.getElementById('cost');

        function calculateTotalCost() {
            let total = baseCost;

            if (deliverCheckbox.checked) {
                total += additionsCost.deliver;
            }
            if (consultCheckbox.checked) {
                total += additionsCost.consult;
            }

            costElement.textContent = total + '$';
        }

        deliverCheckbox.addEventListener('change', calculateTotalCost);
        consultCheckbox.addEventListener('change', calculateTotalCost);

        calculateTotalCost();
        });
    </script>
      
</x-layout>