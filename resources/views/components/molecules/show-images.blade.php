<div class="flex items-center space-x-2 space-y-2 flex-wrap mt-10">
    @foreach($files as $item)
    <div wire:key="{{$item}}" class="relative">
    <a target="_blank" href="{{route('getPrivateFile',['model' => $model,'collection' => $collection,'modelId' => $modelId,'filename' => basename($item)])}}">
    <img class="h-32 rounded-md" src="data:image/png;base64, {{ base64_encode(Storage::disk($disk)->get($item))}}"  />
    </a>
    <button wire:click="deleteMultipleSingleFile('{{ $item }}')" wire:confirm="{{__('Are you sure?')}}" type="button" class="absolute top-0 bg-white p-0.5 text-gray-900 shadow-sm">
       x
      </button>
</div>
    @endforeach
    </div>
