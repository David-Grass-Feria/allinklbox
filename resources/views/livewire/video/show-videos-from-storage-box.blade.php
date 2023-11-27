<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">
       <a href="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}">watch</a>




    </div>

    @endforeach

</div>







</div>

