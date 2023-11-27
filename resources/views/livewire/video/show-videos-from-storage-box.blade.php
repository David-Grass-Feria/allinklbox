<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
        <video src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}" type="video/mp4" controls>

            </video>




    </div>

    @endforeach

</div>







</div>

