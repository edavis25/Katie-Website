<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Get categories for select box
        $categories = Category::all()->pluck('name', 'id')->toArray();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form
        $request->validate([
          'name'         => 'required',
          'description'  => 'required',
          'category'     => 'required',
          'price'        => 'required',
          'featured-image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
          'images.*'       => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048'
        ]);

        // Save new product
        $product = new Product($request->all());
        $product->save();

        // Save featured image to storage
        $file = $request->file('featured-image');
        $this->uploadImage($file, $product, true);

        // Save additional images
        if ($request->file('images')) {
            $this->uploadImages($request->file('images'), $product);
        }

        // Set flashdata
        $request->session()->flash('status', ['type' => 'success', 'message' => 'Product created successfully!']);

        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   /**
    * Store an image into filestorage and add metadata to database
    *
    * @param  \Illuminate\Http\UploadedFile  $file
    * @param  \App\Product  $product
    * @param  boolean  $featured
    */
    private function uploadImage($file, $product, $featured = false) {
      // Store the file
      $path = $file->store('public/products');

      // Save metadata to database
      $meta = [
        'name'          => $file->hashName(),
        'original_name' => $file->getClientOriginalName(),
        'extension'     => $file->guessExtension(),
        'size'          => $file->getClientSize(),
        'full_path'     => 'storage/app/' . $path,
        'public_path'   => 'storage/products/' . $file->hashName(),
        'product_id'    => $product->id,
        'featured'      => $featured
      ];
      $productImage = new ProductImage($meta);
      $productImage->save();
    }

   /**
    * Store an array of images into filestorage and add metadata to database
    *
    * @param  array (\Illuminate\Http\UploadedFile)  $file
    * @param  \App\Product  $product
    */
    private function uploadImages($fileArray, $product) {
      foreach ($fileArray as $file) {
        $this->uploadImage($file, $product);
      }
    }

}
