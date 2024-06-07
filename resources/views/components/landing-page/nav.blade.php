@props(['text', 'href', 'flag'])

@if ($flag==1)
    <a href="{{ $href }}" class="text-2xl relative group hover:text-nav_color flex justify-center">
        {{ $text }}
        <span class="absolute bottom-0 left-1/2 bg-nav_color h-0.5 w-0 transition-width transition-left duration-500 ease-in-out group-hover:w-full group-hover:left-0"></span>
    </a>
@elseif ($flag==2)
    <a href="{{ $href }}" class="relative flex items-center justify-center text-white bg-nav_color border-2 border-nav_color px-8 py-3 rounded-full overflow-hidden group">
        <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
        <span class="relative z-10 text-lg transition-colors duration-500 ease-in-out group-hover:text-nav_color">{{ $text }}</span>
    </a>
@endif