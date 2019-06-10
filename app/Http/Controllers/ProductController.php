<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductImages;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('products.*', 'product_images.image')
            ->paginate(5);
        return view('index', compact('data'))
                ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        

        $form_data = array(
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category
        );

        $data = Product::create($form_data);

        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalName();
        $path = $request->file('image')->storeAs('/images', $new_name);
        $productImage = array(
            'image' => $new_name,
            'product_id' => $data->id
        );
        ProductImages::create($productImage);

        return redirect('product')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('products.*', 'product_images.image')
            ->where('products.id', '=', $id)
            ->get();

        return view('show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('edit', compact('data'));
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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        $form_data = array(
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category
        );

        Product::whereId($id)->update($form_data);

        return redirect('product')->with('success', 'Data is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect('product')->with('success', 'Data is successfully deleted.');                
    }
}
