<div>

    <link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" />

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
            data-setup="{}"
          >


    </div>

    @endforeach

</div>




<script src="https://vjs.zencdn.net/8.6.1/video.min.js"></script>


</div>

