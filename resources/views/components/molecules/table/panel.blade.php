@if(isset($tableHeader))
<div>
{{$tableHeader}}
</div>
@endif

<div class="px-4 sm:px-6 lg:px-8">
<div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full align-middle">
            {{$slot}}
        </div>
    </div>
</div>
</div>
