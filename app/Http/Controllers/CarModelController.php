<?php

namespace App\Http\Controllers;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function ShowCarModelView()
    {
        $CarModel = CarModel ::getCarModel();
        return view('CarModel.CarModelPage', compact('CarModel',));
    }
}
