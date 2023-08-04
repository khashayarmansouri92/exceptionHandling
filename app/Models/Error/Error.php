<?php

namespace App\Models\Error;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $guarded = ['error_number'];

    public static $rules = [
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->error_number = static::generateUniqueNumber();
        });
    }

    /**
     * @return int
     */
    public static function generateUniqueNumber()
    {
        return rand(10000, 99999);
    }

    /**
     * @param $number
     * @return mixed
     */
    public function findWithErrorNumber($number)
    {
        return $this->where('error_number', $number)->first();
    }
}
