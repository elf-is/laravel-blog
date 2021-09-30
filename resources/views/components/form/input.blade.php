@props(['name','type'=>'text'])
<div class="my-5">
    <label for="{{$name}}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{ucwords($name)}}
    </label>
    <input class="border border-gray-400 p-2 w-full rounded"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           value="{{old($name)}}"
           required>
    @error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>