@props(['trigger'])
<div x-data="{show:false}" @click.away="show=false" class="relative">
    {{--    Trigger --}}
    <div @click="show= !show">
        {{$trigger}}
    </div>
    {{--    Links   --}}
    <div x-show="show" class="py-2 bg-gray-200 absolute font-semibold rounded-xl w-full mt-2 z-50 overflow-auto max-h-52"
         style="display: none">
        {{ $slot }}
    </div>

</div>