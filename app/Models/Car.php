<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'car_brands_id',
        'car_models_id',
        'year',
        'mileage',
        'color',
    ];

    public function addCarToDb($BrandId,$ModelId,$year,$mileage,$color)
    {
        $car = Car::create(['car_brands_id' => $BrandId, 'car_models_id' => $ModelId, 'year' => $year, 'mileage' => $mileage, 'color' => $color]);
        return $car;
    }

    static function getCars()
    {
        return Car::join('car_models', 'cars.car_models_id', '=', 'car_models.id')
            ->join('car_brands', 'car_models.car_brands_id', '=', 'car_brands.id')
            ->select('cars.*', 'car_models.name as model_name', 'car_brands.name as brand_name')
            ->get();
    }

    static function deleteCar($CarId)
    {
        $car = Car::find($CarId);
        if($car !== null)
        {
            $car->delete();
        }
    }

    static function EditCarToDb($id,$year,$mileage,$color)
    {
        $car = Car::find($id);
        $car->year = $year;
        $car->color = $color;
        $car->mileage = $mileage;
        $car->save();
    }

}
