<?php

namespace App\Http\Controllers;

use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    public function ShowCarBrandView()
    {
        $CarBrand = CarBrand ::getCarBrand();
        return view('CarBrand.CarBrandPage', compact('CarBrand',));
    }

    public function CallModelToAddDataDb(Request $request)
    {
        // Получаем данные из запроса
        $name = $request->input('name');

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $carBrand = new CarBrand();
        $carBrand->addCarBrandToDb($name);

        return response()->json([
            'message' => 'CarBrand added successfully',
        ], 201);
    }
}
