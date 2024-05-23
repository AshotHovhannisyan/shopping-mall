<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with('category')->get();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'sku' => 'required|unique:products|size:8',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param $id
     */
    public function show($id)
    {
        return Product::with('category')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|required',
            'description' => 'nullable',
            'sku' => 'sometimes|required|unique:products,sku,' . $product->id . '|size:8',
            'price' => 'sometimes|required|numeric',
            'category_id' => 'sometimes|required|exists:categories,id',
        ]);

        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->noContent();
    }
}
