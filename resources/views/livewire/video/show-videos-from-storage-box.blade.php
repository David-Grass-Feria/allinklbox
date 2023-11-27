<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">
        <video class="video-js my-video" data-setup='{}' preload="none" width="640" height="264" controls>
            <source src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item),'disk' => $disk]) }}" type="video/mp4">
            Your browser does not support HTML video.
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                  >supports HTML5 video</a
                >
              </p>
            </video>
        </div>
    @endforeach

</div>






</div>

