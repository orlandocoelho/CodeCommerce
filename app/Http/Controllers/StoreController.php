<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Tag;
use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;

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

    public function product($id)
    {
        $product = Product::find($id);
        return view('store.product', compact('product'));
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        return view('store.tag', compact('tag'));
    }

}
