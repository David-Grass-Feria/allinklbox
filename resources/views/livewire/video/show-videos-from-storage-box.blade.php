<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

            <video id="{{$id}}" preload="none" playsinline controls>
                <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" type="video/mp4" />


              </video>
        </div>
    @endforeach

</div>

@push('scripts')
<script>
    const player = new Plyr(document.getElementById('{{$id}}'));
    </script>
    @endpush



</div>

