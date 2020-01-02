<div class="form-group row">
    <label class="col-2 col-form-label">视频 ID</label>
    <div class="col-10">
        <input type="text" class="form-control" name='ali_id' value='{{old("ali_id",$resource->video->ali_id??"")}}'>
        @error('ali_id')
        <small class="form-text text-danger">{{$message}}</small>
        @else
        <small class="form-text text-muted">请填写阿里云视频点播功能的视频ID</small>
        @enderror
    </div>
</div>