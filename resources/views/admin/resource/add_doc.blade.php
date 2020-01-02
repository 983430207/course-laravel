<div class="form-group row">
    <label class="col-2 col-form-label">正文</label>
    <div class="col-10">
        <textarea class="form-control" id='content' name='content'>{{old("content",$resource->doc->content??"")}}</textarea>
        @error('content')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
@section("css")
<link rel="stylesheet" href="{{asset('static/simditor2328/styles/simditor.css')}}">
@endsection

@section("js")
<script src="{{asset('static/simditor2328/scripts/module.js')}}"></script>
<script src="{{asset('static/simditor2328/scripts/hotkeys.js')}}"></script>
<script src="{{asset('static/simditor2328/scripts/uploader.js')}}"></script>
<script src="{{asset('static/simditor2328/scripts/simditor.js')}}"></script>
<script>
$(document).ready(function(){
    var editor = new Simditor({
        textarea: $('#content'),
        upload:{
            url:'{{route("admin.resource.up")}}',
            params:{
                _token:'{{ csrf_token() }}'
            },
            fileKey:'image_file'
        },
        pasteImage:true,
    });
});

</script>

@endsection