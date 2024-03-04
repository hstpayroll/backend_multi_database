<?php

namespace App\Http\Requests;

use App\Http\Resources\Finance\OverTimeTypeResource;
use Illuminate\Foundation\Http\FormRequest;

class StoreOverTimeCalculationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'over_time_type' => new OverTimeTypeResource($this->overTimeType),
            'ot_date' => $this->ot_date,
            'ot_hour' => $this->ot_hour,
            'ot_value' => $this->ot_value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
