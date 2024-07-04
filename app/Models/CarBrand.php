<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    static function getCarBrand()
    {
        return CarBrand::all();
    }

    public function addCarBrandToDb($carBrand)
    {
        $Brand = CarBrand::firstOrCreate(['name' => $carBrand]);
        return $Brand->id;
    }
}
