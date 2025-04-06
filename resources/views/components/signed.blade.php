<div class="hidden md:block">
    <div class="ml-4 flex items-center md:ml-6">
      <div class="relative inline-block text-left" x-data="{ open: false }">
        <div>
          <button 
            @click="open = !open"
            @click.away="open = false"
            type="button" 
            class="inline-flex w-full justify-center px-3 py-2 shadow-xs ring-gray-300 ring-inset" 
            :aria-expanded="open"
            aria-haspopup="true"
          >
            <img class="size-8 rounded-full" src="/storage/cat.jpg" alt="">
          </button>
        </div>
        
        <!-- Dropdown menu -->
        <div 
          x-show="open"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95"
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95"
          class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
          role="menu"
          aria-orientation="vertical"
          :class="{ 'hidden': !open }"
        >
          <div class="py-1" role="none">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Account settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Support</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">License</a>
            <form method="POST" action="#" role="none">
              <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>