<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'car_brands_id'
    ];

    static function getCarModel()
    {
        return CarModel::all();
    }

    public function addCarModelToDb($carModel, $BrandId)
    {
        $Model = CarModel::firstOrCreate(['name' => $carModel, 'car_brands_id' => $BrandId]);
        return $Model->id;
    }
}
