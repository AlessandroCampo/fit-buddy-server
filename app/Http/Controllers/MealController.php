<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $meals = Meal::where('user_id', $user_id)->get();
        return response()->json([
            'success' => true,
            'data' => $meals
        ], 201);
    }

    public function store(StoreMealRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $meal = Meal::create($data);
        $foodData = collect($data['food_ids'])->mapWithKeys(function ($item) {
            return [$item['food_id'] => ['quantity' => $item['quantity']]];
        });


        if ($foodData->isNotEmpty()) {
            $meal->foods()->attach($foodData);
        }

        // Return a JSON response
        return response()->json([
            'success' => true,
            'data' => $meal->load('foods'),
        ], 201);
    }
}
