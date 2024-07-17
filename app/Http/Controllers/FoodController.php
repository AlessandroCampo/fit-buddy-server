<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFoodRequest;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $searchString = $request->query('search_string', '');
        $foods = Food::where('name', 'like', '%' . $searchString . '%')->get();

        return response()->json([
            'success' => true,
            'data' => $foods
        ], 201);
    }

    public function show(Food $food)
    {
        return response()->json([
            'success' => true,
            'data' => $food
        ], 201);
    }

    public function store(StoreFoodRequest $request)
    {
        $data = $request->validated();
        $food = Food::create($data);

        return response()->json(
            [
                'success' => true,
                'data' => $food,
            ],
            201
        );
    }

    public function delete(Food $food)
    {
        $food->delete();
        return response()->json([
            'success' => true,
            'data' => $food
        ], 201);
    }
}
