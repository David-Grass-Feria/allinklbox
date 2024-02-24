<div>



<div class="mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="w-full mx-auto">

           
            <a href="{{route('downloadFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
              
                    <div class="flex items-center space-x-1 mt-1">
                        <x-atoms.buttons.primary type="button">Download</x-atoms.buttons.primary>
                 <span class="ml-2">{{basename($item)}}</span>
                    </div>
             
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

