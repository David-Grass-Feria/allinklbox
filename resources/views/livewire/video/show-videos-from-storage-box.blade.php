<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
        <video preload="none" controls>
            <source src="{{ Storage::disk($disk)->path($model . '/' . $collection . '/' . $modelId . '/' . $filename) }}" type="video/mp4">
            Your browser does not support HTML video.
            </video>




    </div>

    @endforeach

</div>







</div>

