<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();

        return view('store.index', compact('pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        return view('store.category', compact('category'));
    }

}
