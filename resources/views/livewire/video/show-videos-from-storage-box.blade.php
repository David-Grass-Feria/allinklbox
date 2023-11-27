<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
        <video controls loop>
            <source src="data:video/mp4;base64, {{ base64_encode(Storage::disk($disk)->get($item))}}" type="video/mp4">
            Your browser does not support HTML video.
            </video>




    </div>

    @endforeach

</div>







</div>

