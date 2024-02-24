<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

           
            <a href="{{route('downloadFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
                <button type="button">
                    <div class="flex items-center space-x-1">
                 <x-atoms.svg.download />
                 <span class="ml-2 text-blue-600">{{basename($item)}}</span>
                    </div>
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

