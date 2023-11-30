<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <video id="video" preload="none" playsinline controls>
                    <source src="{{ route('streamFile', ['model' => 'video', 'collection' => 'videos', 'modelId' => 8, 'filename' => 'kk6KCFfPKcQA89qvHEQaqhIWeIW7P8-metaUm9iZXJ0IEdlaXNzIGdlZ2VuIEFsZXggRmlzY2hlcl8gRGllIEVudHNjaGVpZHVuZyAoUmVpY2hlciBhbHMgZGllIEdlaXNzZW5zIEJ1Y2gpLm1wNA==-.mp4']) }}" type="video/mp4" />


                  </video>
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
