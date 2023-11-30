<div>



<div class="mt-5">

    <div class="w-full mx-auto">

            <video id="{{$id}}" preload="none" playsinline controls>
                <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => 'igo9XT1oaAcaAwY4vTY9L4mQwQsXR0-metaZmxvcmVuY2UgYnkgbWlsbHMgTWFrZXVwIFJvdXRpbmUubXA0-.mp4']) }}" type="video/mp4" />


              </video>
        </div>


</div>

@push('scripts')
<script>
    const player = new Plyr(document.getElementById('{{$id}}'));
    </script>
    @endpush



</div>

