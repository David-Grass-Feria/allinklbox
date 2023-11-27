<div>



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







</div>

