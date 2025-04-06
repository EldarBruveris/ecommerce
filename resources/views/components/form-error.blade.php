@props(['name'])

@error($name)
    <p class="text-red-300 italic">{{ $message }}</p>
@enderror