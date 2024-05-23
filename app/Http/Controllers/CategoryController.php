<?php
namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function getCategory($id){
        return Category::find($id)->get();
    }

    public function products($id)
    {
        return Category::find($id)->products;
    }
}
