<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactInformation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'email'=> $this->email,
            'phone'=> $this->phone,
            'mobile'=> $this->mobile,
        ];
    }

    public function with($request)
    {
        return [
            'status_code'=> 200,
            'status_message'=> "successful",
            'user'=> $this->fname . ' ' . $this->lname
        ];
    }
}
