<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

            <video id="player" playsinline controls>
                <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" type="video/mp4" />


              </video>
        </div>
    @endforeach

</div>






</div>

