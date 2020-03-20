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
        // $data['video'] = $this->when($this->type == AppResource::VIDEO,new ResourceVideo($this->video));
        if($this->type == AppResource::VIDEO){
            $data['video'] = $this->whenLoaded('video');
        }
        if($this->type == AppResource::DOC){
            $data['video'] = $this->whenLoaded('video');
        }
        
        // $data['doc'] = $this->whenLoaded('doc');
        // $data['doc'] = $this->when($this->type == AppResource::DOC,new ResourceDoc($this->doc));
        return $data;
    }
}
