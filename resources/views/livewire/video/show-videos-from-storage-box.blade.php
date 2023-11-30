<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

            <video id="{{$id}}" playsinline controls>
                <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" type="video/mp4" />


              </video>
        </div>
    @endforeach

</div>


<script>
    const player = new Plyr(document.getElementById('{{$id}}'));
    </script>




</div>

