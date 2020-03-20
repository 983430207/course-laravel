<?php

namespace App\Http\Resources;

use App\Models\Resource as AppResource;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        //通过预加载决定包含哪些关联
        $data['video'] = new ResourceVideo($this->whenLoaded('video'));
        $data['doc'] = new ResourceDoc($this->whenLoaded('doc'));
        // $data['video'] = $this->when($this->type == AppResource::VIDEO,new ResourceVideo($this->video));
        // $data['doc'] = $this->when($this->type == AppResource::DOC,new ResourceDoc($this->doc));
        return $data;
    }
}
