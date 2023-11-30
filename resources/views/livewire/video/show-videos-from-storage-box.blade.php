<div>



<div class="mt-5">

    <div wire:key="{{$item}}" class="w-full mx-auto">

            <video id="{{$id}}" preload="none" playsinline controls>
                <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" type="video/mp4" />
                    <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" type="video/webm" />

              </video>
        </div>


</div>

@push('scripts')
<script>
    const player = new Plyr(document.getElementById('{{$id}}'));
    </script>
    @endpush



</div>

