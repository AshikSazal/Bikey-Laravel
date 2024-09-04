{{-- <button type="{{$type}}" class="relative bg-{{$class}} border-{{$class}} px-4 py-[6px] rounded-full text-white group overflow-hidden border-2" id={{$id}}>
    <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
    <span class="group-hover:text-{{$class}} relative transition-colors duration-500 ease-in-out">{{$slot}}</span>
</button> --}}
@props(['type' => 'button', 'id' => '', 'disabled' => false, 'href' => '#', 'buttonColor' => '', 'class' => '','link'=>false])
@php
    $buttonColor = $disabled ? 'gray-400' : "{$class}";
@endphp
@if ($link==true)
    <a type="{{$type}}" class="relative border-{{$buttonColor}} px-4 py-[6px] rounded-full text-white group overflow-hidden border-2 bg-{{$buttonColor}}" id={{$id}} {{ $disabled ? 'disabled' : '' }} href="{{$href}}">
        <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
        <span class="group-hover:text-{{$class}} relative transition-colors duration-500 ease-in-out">{{$slot}}</span>
    </a>
@else
    <button type="{{$type}}" class="relative border-{{$buttonColor}} px-4 py-[6px] rounded-full text-white group overflow-hidden border-2 bg-{{$buttonColor}}" id={{$id}} {{ $disabled ? 'disabled' : '' }}>
        <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
        <span class="group-hover:text-{{$class}} relative transition-colors duration-500 ease-in-out">{{$slot}}</span>
    </button>
@endif
