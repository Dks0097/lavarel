<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $foods = Food::orderBy('created_at', 'DESC')->search()->paginate(10);
        return view('web.home', [
            'title' => 'Home'
        ],compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $food = Food::find($id); //1.b
        return view('web.detail_product', array('food' => $food)); //2.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function sanphams()
    {
        //
        // $category = Category::where('id', )->first();
        $foods = Food::orderBy('created_at', 'DESC')->search()->paginate(10);
        
        return view('web.product', [
            'title' => 'products'
        ],compact('foods'));
    }
   

}
