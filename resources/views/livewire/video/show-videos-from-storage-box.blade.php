<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

            <video predload="metadata" src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}" id="{{$id}}" playsinline controls>

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

