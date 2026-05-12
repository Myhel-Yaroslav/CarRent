<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $classes = CarModel::distinct()->pluck('Class');
        $categories = $classes->map(function ($className, $index) {
            return [
                'id' => $index + 1,
                'name' => $className
            ];
        });

        return response()->json($categories);
    }
}