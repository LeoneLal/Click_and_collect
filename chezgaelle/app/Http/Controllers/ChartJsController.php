<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderLine;
use DB;
use Carbon\Carbon;

class ChartJsController extends Controller
{
    public function dashboard()
    {
        $categories_id = Category::select('id')->get();
        $categories = Category::select('name')->get();

        // Orderline by categories
        $orderlines = [];
        foreach ($categories_id as $key) {
        $orderlines[] = DB::table('order_lines')
            ->join('products', 'order_lines.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('order_lines.id')
            ->where("category_id" , $key->id)
            ->count();
        }

        // Products by categories
        $products = [];
        foreach ($categories_id as $key) {
            $products[] = Product::where("category_id" , $key->id)->count();
        }


    	return view('dashboard')
            ->with('categories',json_encode($categories),)
            ->with('orderlines',json_encode($orderlines))
            ->with('products',json_encode($products));
    }
}
