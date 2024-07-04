<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function ShowCarsView()
    {
        $cars = Car ::getCars();
        return view('welcome', compact('cars',));
    }

    public function ShowEditCarView()
    {
        $cars = Car ::getCars();
        return view('Cars.EditCarPage', compact('cars',));
    }

    public function CallModelToEditDataDb(Request $request,$id)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'model_name' => 'required|string|max:255',
            'year' => 'required|integer',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer',
        ]);

        $year = $request->input('year');
        $mileage = $request->input('mileage');
        $color = $request->input('color');

        $car = new Car();
        $car = Car::EditCarToDb($id,$year,$mileage,$color);

        return redirect()->route('car.index');
    }

    public function CallModelToDeleteDataDb(Request $request)
    {
        $CarId=$request->input('id');
        $DeleteCar= Car::deleteCar($CarId);
        return response()->json([
            'message' => 'Car added successfully',
            'redirect' => route('car.index'),
        ], 201);
    }


    public function CallModelToAddDataDb(Request $request)
    {
        // Получаем данные из запроса
        $carBrand = $request->input('brand');
        $carModel = $request->input('model');
        $year = $request->input('year');
        $mileage = $request->input('mileage');
        $color = $request->input('color');



        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:2023',
            'mileage' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
        ]);

        $Brand=new CarBrand();
        $BrandId = $Brand->addCarBrandToDb($carBrand);

        $Model = new CarModel();
        $ModelId=$Model->addCarModelToDb($carModel, $BrandId);

        $Сar = new Car();
        $Сar->addCarToDb($BrandId,$ModelId,$year,$mileage,$color);

        $response = [
            'message' => 'Car added successfully',
            'redirect' => route('car.index'),
        ];
        return response()->json($response, 201);
    }
}
