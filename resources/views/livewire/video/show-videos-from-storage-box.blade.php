<div>


<link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />


<script src="https://vjs.zencdn.net/8.6.1/video.min.js"></script>

<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full">


            <video
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="640"
            height="264"
            poster="MY_VIDEO_POSTER.jpg"
            data-setup="{}"
          >

          <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}" type="video/mp4" />


    </div>

    @endforeach

</div>







</div>

