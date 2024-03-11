<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Branch extends Model
{
    use HasFactory;


    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = ['name', 'bank_id'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
