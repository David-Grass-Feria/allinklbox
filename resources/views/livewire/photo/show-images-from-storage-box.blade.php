<div>



<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-1 mt-5">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="relative">
    <a href="{{route('displayFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
    <img id="img-{{$item}}" class="h-32 rounded-md" src="{{ route('streamFile', ['model' => $model, 'collection' => $collection, 'modelId' => $modelId, 'filename' => basename($item)]) }}"  />
    </a>

    @if($enableFileDelete)
    <button wire:click="deleteMultipleSingleFile('{{ $item }}')" wire:confirm="{{__('Are you sure?')}}" type="button" class="absolute bottom-0 left-5 bg-white p-0.5 text-gray-900 shadow-sm">
        <x-atoms.svg.trash />
      </button>
      @endif

      <a href="{{route('downloadFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
      <button type="button" class="absolute bottom-0 bg-white p-0.5 text-gray-900 shadow-sm">
       <x-atoms.svg.download />
       </button>
    </a>


    </div>

    @endforeach

</div>







</div>

