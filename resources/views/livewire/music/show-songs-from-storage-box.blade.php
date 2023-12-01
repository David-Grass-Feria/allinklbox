<div>



<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-1 mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="relative">

        <audio id="{{$id}}" loop controls>
            <source src="data:image/png;base64, {{ base64_encode(Storage::get($item))}}" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>

    </div>

    @endforeach

</div>







</div>

