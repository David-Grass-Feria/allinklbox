@push('styles')
<link href="{{ asset('vendor/filepond/filepond-master/dist/filepond.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
<script src="{{ asset('vendor/filepond/filepond-master/dist/filepond.min.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-master/dist/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('vendor/filepond/filepond-master/dist/filepond-plugin-file-validate-size.js') }}"></script>
@endpush

<div
wire:ignore
x-data="{
    initFilepond () {
        const pond = FilePond.create(this.$refs.filepond, {
            server: {
                process: (fieldname,file,metadata,load,error,progress,abort,transfer,options) => {
                    @this.upload('{{$name}}',file,load,error,progress)
                }
            }
        })
    }
}"

x-init="initFilepond"
x-cloak
>

<input x-ref="filepond" type="file" {{$attributes}} />
</div>
