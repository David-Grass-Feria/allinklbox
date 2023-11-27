<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
        <a href="{{route('displayFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item),'disk' => $disk])}}">
        <video preload="none" controls>
            <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}" type="video/mp4">
            Your browser does not support HTML video.
            </video>
        </a>



    </div>

    @endforeach

</div>







</div>

