<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

           
            <a href="{{route('downloadFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
                <button type="button">
                 <x-atoms.svg.download />
                 </button>
              </a>
        </div>
    @endforeach

</div>

@push('scripts')
<script>
    const player = new Plyr(document.getElementById('{{$id}}'));
    </script>
    @endpush



</div>

