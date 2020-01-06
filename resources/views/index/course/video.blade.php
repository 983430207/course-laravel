<div class="prism-player" id="player-con"></div>


@section('css')
<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.8.6/skins/default/aliplayer-min.css" />
@endsection

@section('js')
<script type="text/javascript" charset="utf-8" src="https://g.alicdn.com/de/prismplayer/2.8.6/aliplayer-min.js"></script>
<script>
var player = new Aliplayer({
  "id": "player-con",
  "vid": "{{$resource->video->ali_id}}",
  "playauth": "{{$resource->video->playauth->PlayAuth}}",
  "qualitySort": "asc",
  "format": "mp4",
  "mediaType": "video",
  "width": "100%",
  "height": "500px",
  "autoplay": true,
  "isLive": false,
  "rePlay": false,
  "playsinline": true,
  "preload": true,
  "controlBarVisibility": "hover",
  "useH5Prism": true
}, function (player) {
    console.log("The player is created");
  }
);
</script>
@endsection