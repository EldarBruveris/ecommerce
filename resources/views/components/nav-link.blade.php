@props(['active' => false])
<a  {{ $attributes }}
    class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:text-blue-500 transition-colors duration-300'}} rounded-md px-3 py-2 font-medium" 
    aria-current="{{ $active ? 'page' : 'false' }}"
    
>{{ $slot }}</a>
