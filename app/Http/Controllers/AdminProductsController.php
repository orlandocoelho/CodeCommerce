<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{

    private $productsModel;

    public function __construct(Product $productModel)
    {
        $this->productsModel = $productModel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productsModel->orderBy('id', 'asc')->paginate('10');
        return view('admin.products.products', compact('products', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {

        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductsRequest $request)
    {
        $input = $request->all();

        $product = $this->productsModel->fill($input);
        $product->save();

        return redirect()->route('products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $product = $this->productsModel->find($id);
        $categories = $category->lists('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductsRequest $request, $id)
    {
        $this->productsModel->find($id)->update($request->all());
        return redirect()->route('products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productsModel->find($id)->delete();
        return redirect()->route('products.list');
    }

    public function images($id)
    {
        $product = $this->productsModel->find($id);
        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productsModel->find($id);
        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('local_public')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images', ['id'=>$id]);

    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension)){
            Storage::disk('local_public')->delete($image->id.'.'.$image->extension);
        }

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
    }

}
