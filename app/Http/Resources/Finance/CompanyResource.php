<?php

namespace App\Http\Resources\Finance;


use Illuminate\Http\Request;
use App\Http\Resources\Finance\CalenderResource;
use App\Http\Resources\Finance\CurrencyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'tin' => $this->tin,
            'logo' => $this->logo,
            'website' => $this->website,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address_line' => $this->address_line,
            'city' => $this->city,
            'sub_city' => $this->sub_city,
            'kebele' => $this->kebele,
            'woreda' => $this->woreda,
            'house_no' => $this->house_no,
            'fax' => $this->fax,
            'currency' => new CurrencyResource($this->currency),
            'calender' => new CalenderResource($this->calendar),
            'description' => $this->description,

        ];
    }
}
