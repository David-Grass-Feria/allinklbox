<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
        <video src="{{ route('displayFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}" preload="none" controls>

            Your browser does not support HTML video.
            </video>





    </div>

    @endforeach

</div>







</div>

