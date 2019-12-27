<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JD\Cloudder\Facades\Cloudder;
use Session;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::orderby('id', 'desc')->paginate(5);
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$originalImage = $request->file('image');
        //$path = $request->file('image')->store('images');

        //return $path;

            //$orignalPath = public_path() . '/images/products';
            //$img_name = time() . $originalImage->getClientOriginalName();
            //return $img_name;
        //return 'Good Herer';
        
        $this->validate($request, [
            'name' => 'required|max:100',
            'price' => 'required'
        ]);
        //$new_product = new Product();
        //$new_product->name = $request['name'];
       // $new_product->price = $request['price'];
        //$new_product->rating = 0;
        //$new_product->user_id = Auth::id();
        $data = $request->all();
        
        if ($request->hasFile('image')) {
            //return 'Good From Here';
            Cloudder::upload($request->file('image'));
            $cloundary_upload = Cloudder::getResult();
            $new_product = new Product();
            $new_product->name = $data['name'] ;
            $new_product->price = $data['price'];
            $new_product->user_id = Auth::id();
            $new_product->rating = 0;
            $new_product->image_url = $cloundary_upload['url'];
            $new_product->save(); 
            //$originalImage = $request->file('image');
            //$orignalPath = public_path() . '/images/products';
            //$img_name = time() . $originalImage->getClientOriginalName();
           // $new_product->image_url = $img_name;
        }
        //$new_product->save();
        return redirect()->route('product.index')->with('flash_message', 'Product add Successfully');
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
}
