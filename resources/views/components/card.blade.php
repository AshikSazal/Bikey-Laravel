@props(['class'=>'', 'id'=>''])

<div class="shadow-box_shadow rounded-2xl p-10 w-1/3 {{$class}}" id={{$id}}>
    {{$slot}}
</div>